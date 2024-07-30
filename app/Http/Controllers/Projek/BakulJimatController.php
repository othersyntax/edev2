<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BakulJimatController extends Controller
{
    public function index(){
        $bakul = BakulJimat::where('bj_program_id', auth()->user()->program_id)
                    ->where('bj_status', 1)
                    ->get();
        return $bakul;
    }
}
