<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use App\Models\Pentadbiran\JenisKerja;
use Illuminate\Http\Request;

class JenisKerjaController extends Controller
{
public function index()
{
$data = JenisKerja::all();
return view('pentadbiran.jeniskerja.index', compact('data'));
}


public function store(Request $request)
{
$request->validate([
'jenis_kerja' => 'required|string|max:255',
'status' => 'required'
]);


JenisKerja::create($request->all());
return redirect()->back()->with('success', 'Created successfully');
}


public function update(Request $request, $id)
{
$request->validate([
'jenis_kerja' => 'required|string|max:255',
'status' => 'required'
]);


$row = JenisKerja::findOrFail($id);
$row->update($request->all());
return redirect()->back()->with('success', 'Updated successfully');
}


public function destroy($id)
{
JenisKerja::destroy($id);
return redirect()->back()->with('success', 'Deleted successfully');
}
}
