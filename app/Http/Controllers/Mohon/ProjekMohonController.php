<?php

namespace App\Http\Controllers\Mohon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mohon\ProjekMohon;
use App\Models\Pentadbiran\StatusMohon;
use App\Models\Siling;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ProjekMohonController extends Controller
{
    // Display all permohonan
    public function index(Request $request) {
        $query = ProjekMohon::with('siling');

        // Search by project name or program name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('proj_nama', 'like', "%$search%")
                ->orWhereHas('siling', function($sub) use ($search) {
                    $sub->where('program_nama', 'like', "%$search%");
                });
            });
        }

        //Summary counts
        $summary = [
            'baru'       => ProjekMohon::where('proj_status', 'Baru')->count(),
            'disahkan'   => ProjekMohon::where('proj_status', 'Disahkan')->count(),
            'diperaku'   => ProjekMohon::where('proj_status', 'Diperaku')->count(),
            'jumlah'     => ProjekMohon::count(),
        ];

        // Paginate data
        $permohonan = $query->orderByDesc('proj_sort')->paginate(10);

        return view('mohon.index', compact('permohonan', 'summary'))
            ->with('search', $request->search)
            ->with('status', $request->status);
    }

    // Create form (only Penyedia)
    public function create() {
        $silingList = Siling::with('peruntukan')->where('sil_tahun', '2026')->where('sil_status', 1)->where('sil_fasiliti_id', auth()->user()->program_id)->orderBy('sil_tahun', 'desc')->get();
        return view('mohon.create', compact('silingList'));
    }

    // Store new permohonan
    public function store(Request $request) {
        $data = $request->validate([
            'proj_pemilik_id' => 'required|exists:tblsiling,program_id',
            'proj_nama' => 'required|string|max:255',
            'proj_amaun' => 'required|numeric|min:1',
        ]);

        $data['penyedia_id'] = auth()->id();
        $data['status'] = 'Baru';

        $permohonan = ProjekMohon::create($data);

        // Notify Pengesah
        $this->notifyNextRole($permohonan, 'pengesah');

        return redirect()->route('mohon.index')->with('success', 'Permohonan berjaya dihantar kepada Pengesah.');
    }

    // Pengesah or Peraku submit
    public function submit($id) {
        $permohonan = ProjekMohon::findOrFail($id);

        if ($permohonan->status == 'Baru') {
            $permohonan->status = 'Disahkan';
            $permohonan->pengesah_id = auth()->id();
            $this->notifyNextRole($permohonan, 'peraku');
        } elseif ($permohonan->status == 'Disahkan') {
            $permohonan->status = 'Diperaku';
            $permohonan->peraku_id = auth()->id();

            // Deduct from tblsiling baki
            $siling = Siling::where('program_id', $permohonan->proj_pemilik_id)->first();
            if ($siling) {
                $siling->baki -= $permohonan->proj_amaun;
                $siling->save();
            }

            // Notify Pentadbir Projek
            $this->notifyNextRole($permohonan, 'pentadbir');
        }

        $permohonan->save();

        return back()->with('success', 'Permohonan telah dikemaskini.');
    }

    // Helper for email notification
    private function notifyNextRole($permohonan, $role)
    {
        $users = User::where('role', $role)
            ->where('program_id', $permohonan->proj_pemilik_id)
            ->get();

        foreach ($users as $user) {
            Mail::to($user->email)->queue(new \App\Mail\PermohonanNotification($permohonan, $role));
        }
    }

    public function show($id)
    {
        $permohonan = ProjekMohon::with(['siling', 'penyedia', 'pengesah', 'peraku'])
            ->findOrFail($id);

        return view('mohon.show', compact('permohonan'));
    }

    public function getPeruntukan($id)
    {
        $siling = Siling::with('peruntukan')
            ->where('siling_id', $id)
            ->first();
        if (! $siling) {
            return response()->json([
                'success' => false,
                'message' => 'Siling not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'siling' => $siling,
            'peruntukan' => $siling->peruntukan,
        ]);
    }
}
