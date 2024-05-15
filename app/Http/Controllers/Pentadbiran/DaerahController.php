<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daerah;

class DaerahController extends Controller
{
    public function index()
    {
        return view("pentadbiran.daerah.index");
    }


    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            if(!empty($carian_type)){
                $query = \DB::table('ddsa_kod_daerah')
                            ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                            ->select('ddsa_kod_daerah.*', 'ddsa_kod_negeri.neg_nama_negeri')
                            ->orderBy('dae_nama_daerah')->orderBy('neg_nama_negeri')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('dae_kod_daerah', $carian_text);
                                    }
                                    else if($carian_type=='Negeri'){
                                        $q->where('dae_kod_negeri', $carian_text);
                                    }
                                    else{
                                        $q->where('dae_nama_daerah','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $daerah = $query->get();
            }
            else{
                $daerah =  \DB::table('ddsa_kod_daerah')
                            ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                            ->select('ddsa_kod_daerah.*', 'ddsa_kod_negeri.neg_nama_negeri')
                            ->orderBy('neg_nama_negeri', 'ASC')
                            ->get();          
            }
        }
        else{
            \DB::table('ddsa_kod_daerah')
                ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                ->select('ddsa_kod_daerah.*', 'ddsa_kod_negeri.neg_nama_negeri')
                ->orderBy('neg_nama_negeri', 'ASC')
                ->get(); 
        }
        return response()->json([
            'daerah'=>$daerah,
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
