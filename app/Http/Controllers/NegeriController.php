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

<<<<<<< HEAD
    public function ajaxAll(){
        $negeri = Negeri::all();
        // dd($negeri);
        return response()->json([
            'negeri'=>$negeri,
        ]);
    }

    
=======
    public function indexanas()
    {
        $negeri = Negeri::all();
        return view("pentadbiran.negeri.index2",compact('negeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
>>>>>>> 13694bf14bb27e710aa1ec672e6b95b119518201
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
