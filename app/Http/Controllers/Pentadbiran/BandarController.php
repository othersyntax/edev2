<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Pentadbiran\Bandar;

class BandarController extends Controller
{
    public function index()
    {
        return view("pentadbiran.bandar.index");
    }

    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $neg_negeri_id = $req->neg_negeri_id;
            $dae_daerah_id = $req->dae_daerah_id;
            // $ban_nama_bandar_sch = $req->ban_nama_bandar_sch;
            // $ban_kod_bandar_sch = $req->ban_kod_bandar_sch;
            // if(!empty($carian_type)){
            $query = \DB::table('ddsa_kod_bandar')
                        ->join('ddsa_kod_daerah', 'ddsa_kod_bandar.ban_kod_daerah', '=', 'ddsa_kod_daerah.dae_daerah_id')
                        ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                        ->select('ddsa_kod_bandar.*', 'ddsa_kod_daerah.dae_nama_daerah', 'ddsa_kod_negeri.neg_nama_negeri')
                        ->orderBy('ban_nama_bandar')
                        ->where(function($q) use ($neg_negeri_id, $dae_daerah_id){ 
                            // if(!empty($ban_kod_bandar_sch)){
                            //     $q->where('ddsa_kod_bandar.ban_kod_bandar', $ban_kod_bandar_sch);
                            // }
                            // if(!empty($ban_nama_bandar_sch)){
                            //     $q->where('ddsa_kod_bandar.ban_nama_bandar', 'like', "%{$ban_nama_bandar_sch}%");
                            // }
                            if(!empty($dae_daerah_id)){
                                $q->where('ddsa_kod_daerah.dae_daerah_id', $dae_daerah_id);
                            }
                            if(!empty($neg_negeri_id)){
                                $q->where('ddsa_kod_negeri.neg_negeri_id', $neg_negeri_id);
                            }
                        });
            $bandar = $query->get();
        }
        else{
            $bandar = \DB::table('ddsa_kod_bandar')
                        ->join('ddsa_kod_daerah', 'ddsa_kod_bandar.ban_kod_daerah', '=', 'ddsa_kod_daerah.dae_daerah_id')
                        ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                        ->select('ddsa_kod_bandar.*', 'ddsa_kod_daerah.dae_nama_daerah', 'ddsa_kod_negeri.neg_nama_negeri')
                        ->orderBy('ban_nama_bandar')
                        ->get();  
        }
        return response()->json([
            'bandar'=>$bandar,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'ban_kod_bandar'=> 'required',
            'ban_nama_bandar'=> 'required',
            'ban_kod_daerah'=> 'required',
        ],
        [
            'ban_kod_bandar.required'=> 'Sila masukkan Kod Bandar',
            'ban_nama_bandar.required'=> 'Sila masukkan Bandar',
            'ban_kod_daerah.required'=> 'Sila pilih Daerah',
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
           $ban = new Bandar;
           $ban->ban_kod_bandar = $req->input('ban_kod_bandar');
           $ban->ban_nama_bandar = $req->input('ban_nama_bandar');
           $ban->ban_kod_daerah = $req->input('ban_kod_daerah');
           $ban->ban_updby = 1000;
           $ban->ban_crtby = 1000;
           $ban->ban_log = \Carbon\Carbon::now();

            // dd($dae);            
           $ban->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $bandar = \DB::table('ddsa_kod_bandar')
                    ->join('ddsa_kod_daerah', 'ddsa_kod_bandar.ban_kod_daerah', '=', 'ddsa_kod_daerah.dae_daerah_id')
                    ->join('ddsa_kod_negeri', 'ddsa_kod_daerah.dae_kod_negeri', '=', 'ddsa_kod_negeri.neg_negeri_id')
                    ->select('ddsa_kod_bandar.*', 'ddsa_kod_negeri.neg_negeri_id')
                    ->where('ddsa_kod_bandar.ban_bandar_id', $id)
                    ->first();
        if($bandar)
        {
            return response()->json([
                'status'=>200,
                'bandar'=> $bandar,
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

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'ban_kod_bandar'=> 'required',
            'ban_nama_bandar'=> 'required',
            'ban_kod_daerah'=> 'required',
        ],
        [
            'ban_kod_bandar.required'=> 'Sila masukkan Kod Bandar',
            'ban_nama_bandar.required'=> 'Sila masukkan Bandar',
            'ban_kod_daerah.required'=> 'Sila pilih Daerah',
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
           $ban = Bandar::find($req->input('ban_bandar_id'));
           $ban->ban_kod_bandar = $req->input('ban_kod_bandar');
           $ban->ban_nama_bandar = $req->input('ban_nama_bandar');
           $ban->ban_kod_daerah = $req->input('ban_kod_daerah');
           $ban->ban_status = $req->input('ban_status');
           $ban->ban_updby = 1000;

            // dd($dae);            
           $ban->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dikemakini'
            ]);
        }
    }

    public function destroy(string $id)
    {
        $dae = Bandar::find($id);
        if($dae)
        {
            $dae->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Bandar Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Bandar Tidak Wujud'
            ]);
        }
    }
}
