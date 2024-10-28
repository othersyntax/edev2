<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fasiliti;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Daerah;


class FasilitiController extends Controller
{

    public function index()
    {
        $fasiliti = Fasiliti::all();

        return view("pentadbiran.fasiliti.index", compact('fasiliti'));
    }

    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            $query = DB::table('tblfasiliti')
                            ->join('ddsa_kod_negeri', 'tblfasiliti.fas_negeri_id', '=', 'ddsa_kod_negeri.neg_negeri_id')
                            ->join('ddsa_kod_daerah', 'tblfasiliti.fas_daerah_id', '=', 'ddsa_kod_daerah.dae_daerah_id')
                            ->select('tblfasiliti.*', 'ddsa_kod_negeri.neg_nama_negeri','ddsa_kod_daerah.dae_nama_daerah')
                            ->where(function($q) use ($carian_type, $carian_text){
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('fas_ptj_code', $carian_text);
                                    }
                                    elseif($carian_type=='kodkate'){
                                        $q->where('fas_jenis', $carian_text);
                                    }

                                    else{
                                        $q->where('neg_nama_negeri','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $fasiliti = $query->get();
        }
        else{
            $fasiliti = DB::table('tblfasiliti')
            ->join('ddsa_kod_negeri', 'tblfasiliti.fas_negeri_id', '=', 'ddsa_kod_negeri.neg_negeri_id')
            ->join('ddsa_kod_daerah', 'tblfasiliti.fas_daerah_id', '=', 'ddsa_kod_daerah.dae_daerah_id')
            ->select('tblfasiliti.*', 'ddsa_kod_negeri.neg_nama_negeri','ddsa_kod_daerah.dae_nama_daerah')
                        ->get();
        }
        return response()->json([
            'fasiliti'=>$fasiliti,

        ]);

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fas_ptj_code'=> 'required',
            'fas_name'=> 'required',
            'fas_negeri_id'=> 'required',
            'fas_daerah_id'=> 'required',
            // 'fas_jenis'=> 'required',
        ],
        [
            'fas_ptj_code.required'=> 'Sila masukkan Kod PTJ',
            'fas_name.required'=> 'Sila masukkan nama fasiliti',
            'fas_negeri_id.required'=> 'Sila masukkan Negeri',
            'fas_daerah_id.required'=> 'Sila masukkan Daerah',
            
            // 'fas_jenis.required'=> 'Sila masukkan Kod Kategori Fasiliti',
            
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
            $fas = new Fasiliti;
            $fas->fas_ptj_code = $request->input('fas_ptj_code');
            $fas->fas_name = $request->input('fas_name');
            $fas->fas_negeri_id = $request->input('fas_negeri_id');
            $fas->fas_daerah_id = $request->input('fas_daerah_id');
            $fas->fas_created_by = auth()->user()->id;
            $fas->fas_udated_by = auth()->user()->id;
            $fas->save();
            return response()->json([
                'status'=>200,
                'message'=>'Negeri berjaya ditambah'
         ]);
        }
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {


        $fasiliti = Fasiliti::find($id);
        if($fasiliti)
        {
            return response()->json([
                'status'=>200,
                'fasiliti'=> $fasiliti,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat negeri tidak dijumpai.'
         ]);
        }
    }


    public function update(Request $req )
    {
        $validator = Validator::make($req->all(), [
            'fas_ptj_code'=> 'required',
            'fas_name'=> 'required',
            // 'fas_jenis'=> 'required',
            'fas_daerah_id'=> 'required',
            'fas_negeri_id'=> 'required',
        ],
        [
            'fas_ptj_code.required'=> 'Sila masukkan Kod PTJ',
            'fas_name.required'=> 'Sila masukkan Nama Fasiliti',
            // 'fas_jenis.required'=> 'Sila masukkan Kod Kategori',
            'fas_daerah_id.required'=> 'Sila masukkan Daerah',
            'fas_negeri_id.required'=> 'Sila masukkan Negeri',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $fas= Fasiliti::find($req->input('fasiliti_id'));
            if($fas){
                $fas->fasiliti_id = $req->input('fasiliti_id');
                $fas->fas_ptj_code = $req->input('fas_ptj_code');
                $fas->fas_name = $req->input('fas_name');
                
                $fas->fas_negeri_id = $req->input('fas_negeri_id');
                $fas->fas_negeri_id = $req->input('fas_negeri_id');
                $fas->fas_ptj_level = $req->input('fas_ptj_level');
                $fas->update();

                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat fasiliti berjaya dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Fasiliti Tidak Wujud.'
                ]);
            }

        }
    }


    public function destroy(string $id)
    {
        $fas = Fasiliti::find($id);
        if($fas)
        {
            $fas->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Negeri Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Negeri Tidak Wujud'
            ]);
        }
    }
}
