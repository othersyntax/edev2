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

    public function getJimatList(){
        $query = \DB::table('tblbakul_jimat')
                ->where('bj_program_id', auth()->user()->program_id)
                ->whereIn('bj_kategori', [1,2])
                ->where('bj_status', 1);
        return $query;
    }

    public function totalJimat(){
        $jimat = \DB::table('tblbakul_jimat')
                ->where('bj_program_id', auth()->user()->program_id)
                ->whereIn('bj_kategori', [1,2])
                ->where('bj_status', 1)
                ->sum('bj_amount_jimat');
        return $jimat;
    }
}
