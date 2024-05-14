<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negeri;

class NegeriController extends Controller
{

    public function index()
    {
        $negeri = Negeri::all();
        // dd($negeri);
        return view("pentadbiran.negeri.index", compact('negeri'));
    }

    public function ajaxAll(){
        $negeri = Negeri::all();
        // dd($negeri);
        return response()->json([
            'negeri'=>$negeri,
        ]);
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
