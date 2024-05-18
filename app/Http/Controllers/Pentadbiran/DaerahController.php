<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
                                        $q->where('neg_nama_negeri', 'like', "%{$carian_text}%");
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

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'dae_kod_daerah'=> 'required',
            'dae_nama_daerah'=> 'required',
            'dae_kod_negeri'=> 'required',
        ],
        [
            'dae_kod_daerah.required'=> 'Sila masukkan Kod Daerah',
            'dae_nama_daerah.required'=> 'Sila masukkan Daerah',
            'dae_kod_negeri.required'=> 'Sila pilih Negeri',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $dae = new Daerah;
            $dae->dae_kod_daerah = $req->input('dae_kod_daerah');
            $dae->dae_nama_daerah = $req->input('dae_nama_daerah');
            $dae->dae_kod_negeri = $req->input('dae_kod_negeri');
            $dae->dae_updby = 1000;
            $dae->dae_crtby = 1000;
            $dae->dae_log = date('Y-m-d H:i:s');

            // dd($dae);            
            $dae->save();
            return response()->json([
                'status'=>200,
                'message'=>'Daerah berjaya ditambah'
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $daerah = Daerah::find($id);
        if($daerah)
        {
            return response()->json([
                'status'=>200,
                'daerah'=> $daerah,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat daerah tidak dijumpai.'
            ]);
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'dae_kod_daerah'=> 'required',
            'dae_nama_daerah'=> 'required',
            'dae_kod_negeri'=> 'required',
        ],
        [
            'dae_kod_daerah.required'=> 'Sila masukkan Kod Daerah',
            'dae_nama_daerah.required'=> 'Sila masukkan Daerah',
            'dae_kod_negeri.required'=> 'Sila pilih Negeri',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $dae= Daerah::find($req->input('dae_daerah_id'));
            if($dae){
                $dae->dae_kod_daerah = $req->input('dae_kod_daerah');
                $dae->dae_nama_daerah = $req->input('dae_nama_daerah');
                $dae->dae_kod_negeri = $req->input('dae_kod_negeri');
                $dae->dae_status = $req->input('dae_status');
                $dae->dae_updby = 1000;
                $dae->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Daerah berjaya dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Daerah Tidak Wujud.'
                ]);
            }
        }
    }

    public function destroy(string $id)
    {
        $dae = Daerah::find($id);
        if($dae)
        {
            $dae->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Daerah Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Daerah Tidak Wujud'
            ]);
        }
    }
}
