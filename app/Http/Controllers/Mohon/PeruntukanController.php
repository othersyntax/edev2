<?php

namespace App\Http\Controllers\Mohon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mohon\Peruntukan;
use App\Models\Pentadbiran\Butiran;

class PeruntukanController extends Controller
{
    public function index()
    {
        $peruntukans = Peruntukan::orderBy('tahun', 'desc')->get();
        return view('peruntukan.index', compact('peruntukans'));
    }

    public function create()
    {
        $butirans = Butiran::orderBy('kod_full')->get();
        return view('peruntukan.create', compact('butirans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'butiran_id' => 'required|exists:tblbutiran,butiran_id',
            'kod_agensi' => 'required',
            'kod_projek' => 'required',
            'kod_setia' => 'required',
            'kod_subsetia' => 'required',
            'tahun' => 'required|numeric',
            'amaun' => 'required|numeric',
            'inisiatif' => 'required',
        ]);

        Peruntukan::create($request->all());
        return redirect()->route('peruntukan.index')->with('success', 'Rekod berjaya ditambah!');
    }

    public function edit($id)
    {
        $peruntukan = Peruntukan::findOrFail($id);
        $butirans = Butiran::orderBy('kod_full')->get();
        return view('peruntukan.edit', compact('peruntukan', 'butirans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'butiran_id' => 'required|exists:tblbutiran,butiran_id',
            'kod_agensi' => 'required',
            'kod_projek' => 'required',
            'kod_setia' => 'required',
            'kod_subsetia' => 'required',
            'tahun' => 'required|numeric',
            'amaun' => 'required|numeric',
            'inisiatif' => 'required',
        ]);

        $peruntukan = Peruntukan::findOrFail($id);
        $peruntukan->update($request->all());

        return redirect()->route('peruntukan.index')->with('success', 'Rekod berjaya dikemaskini!');
    }

    public function destroy($id)
    {
        $peruntukan = Peruntukan::findOrFail($id);
        $peruntukan->delete();

        return redirect()->route('peruntukan.index')->with('success', 'Rekod berjaya dipadam!');
    }
}
