<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use App\Models\Pentadbiran\StatusMohon;
use Illuminate\Http\Request;

class StatusMohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatusMohon::all();
        return view('pentadbiran.statusMohon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        StatusMohon::create([
            'status' => $request->status]);

            return response()->json(['success' => 'Status added successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $status = StatusMohon::findOrFail($id);
        $status->update([
            'status' => $request->status
        ]);

        return response()->json(['success' => 'Status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StatusMohon::findOrFail($id)->delete();
        return response()->json(['success' => 'Status deleted successfully']);
    }
}
