<?php

namespace App\Http\Controllers\Mohon;

use App\Http\Controllers\Controller;
use App\Models\Siling;
use App\Models\Mohon\Peruntukan;
use App\Models\Pentadbiran\Program;
use App\Models\User;
use App\Notifications\SilingDitetapkanNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SilingController extends Controller
{
    public function index()
    {
        $senarai = Siling::with('peruntukan')->where('sil_tahun', '2026')->orderBy('sil_tahun', 'desc')->get();
        return view('app.siling.index', compact('senarai'));
    }

    public function create()
    {
        $program = Program::where('prog_status', 1)->orderBy('prog_kategori', 'asc')->get();
        $peruntukan = Peruntukan::where('status', 'Aktif')->get();
        return view('app.siling.create', compact('peruntukan', 'program'));
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'sil_peruntukan_id' => 'required',
            'sil_fasiliti_id' => 'required',
            'sil_tahun' => 'required',
            'sil_amount' => 'required|numeric',
            'sil_sdate' => 'required|date',
            'sil_edate' => 'required|date|after_or_equal:sil_sdate',
        ]);
        // dd("Lepas");

        $simpan = Siling::create([
            'sil_peruntukan_id' => $request->sil_peruntukan_id,
            'sil_fasiliti_id' => $request->sil_fasiliti_id,
            'sil_tahun' => $request->sil_tahun,
            'sil_amount' => $request->sil_amount,
            'sil_balance' => $request->sil_amount,
            'sil_sdate' => $request->sil_sdate,
            'sil_edate' => $request->sil_edate,
            'sil_status' => $request->sil_status ?? '1',
            'sil_created_by' => auth()->user()->id,
        ]);
        // dd($simpan);

        return redirect()->route('siling.index')->with('success', 'Rekod siling berjaya ditambah.');
    }

    public function edit($id)
    {
        $data = Siling::findOrFail($id);
        $data->sil_sdate = \Carbon\Carbon::parse($data->sil_sdate)->format('Y-m-d');
        $data->sil_edate = \Carbon\Carbon::parse($data->sil_edate)->format('Y-m-d');
        $program = Program::where('prog_status', 1)->orderBy('prog_kategori', 'asc')->get();
        $peruntukan = Peruntukan::where('status', 'Aktif')->get();$peruntukan = Peruntukan::all();
        return view('app.siling.edit', compact('data', 'peruntukan','program'));
    }

    public function update(Request $request, $id)
    {
        $data = Siling::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('app.siling.index')->with('success', 'Rekod siling berjaya dikemaskini.');
    }

    public function destroy($id)
    {
        $data = Siling::findOrFail($id);
        $data->delete();
        return redirect()->route('app.siling.index')->with('success', 'Rekod siling dipadam.');
    }
}
