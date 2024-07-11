<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjekUtilities;

class UtilitiController extends Controller
{
    public function edit(string $id)
    {
        $utiliti = ProjekUtilities::find($id);
        if($utiliti)
        {
            return response()->json([
                'status'=>200,
                'utiliti'=> $utiliti,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }
}
