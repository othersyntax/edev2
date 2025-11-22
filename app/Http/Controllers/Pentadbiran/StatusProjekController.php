<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use App\Models\Pentadbiran\StatusProjek;
use Illuminate\Http\Request;

class StatusProjekController extends Controller
{
    public function index()
    {
        $statuses = StatusProjek::all();
        return view('pentadbiran.statusProjek.index', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        StatusProjekController::create([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        $status = StatusProjekController::findOrFail($id);
        $status->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $status = StatusProjekController::findOrFail($id);
        $status->delete();

        return redirect()->back()->with('success', 'Status deleted successfully.');
    }
}
