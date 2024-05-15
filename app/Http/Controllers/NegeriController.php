<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Negeri;

class NegeriController extends Controller
{

    public function index()
    {
        return view("pentadbiran.negeri.index");
    }

    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            if(!empty($carian_type)){
                $query = \DB::table('ddsa_kod_negeri')                            
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('neg_kod_negeri', $carian_text);
                                    }
                                    else{
                                        $q->where('neg_nama_negeri','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $negeri = $query->get();
            }
            else{
                $negeri =  Negeri::all();             
            }
        }
        else{
            $negeri =  Negeri::all();
        }
        return response()->json([
            'negeri'=>$negeri,
        ]);
    }

    
    public function create()
    {
        //
    }


    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'neg_kod_negeri'=> 'required',
            'neg_nama_negeri'=> 'required',
        ],
        [
            'neg_kod_negeri.required'=> 'Sila masukkan Kod Negeri',
            'neg_nama_negeri.required'=> 'Sila masukkan Negeri',
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
            $neg = new Negeri;
            $neg->neg_kod_negeri = $req->input('neg_kod_negeri');
            $neg->neg_nama_negeri = $req->input('neg_nama_negeri');
            $neg->neg_updby = 1000;
            $neg->neg_crtby = 1000;
            $neg->neg_log = \Carbon\Carbon::now();
            $neg->save();
            return response()->json([
                'status'=>200,
                'message'=>'Negeri berjaya ditambah'
            ]);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $negeri = Negeri::find($id);
        if($negeri)
        {
            return response()->json([
                'status'=>200,
                'negeri'=> $negeri,
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


    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'neg_kod_negeri'=> 'required',
            'neg_nama_negeri'=> 'required',
        ],
        [
            'neg_kod_negeri.required'=> 'Sila masukkan Kod Negeri',
            'neg_nama_negeri.required'=> 'Sila masukkan Negeri',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $neg= Negeri::find($req->input('neg_negeri_id'));
            if($neg){
                $neg->neg_negeri_id = $req->input('neg_negeri_id');
                $neg->neg_kod_negeri = $req->input('neg_kod_negeri');
                $neg->neg_nama_negeri = $req->input('neg_nama_negeri');
                $neg->neg_status = $req->input('neg_status');
                $neg->neg_updby = 1000;
                $neg->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Negeri berjaya dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Negeri Tidak Wujud.'
                ]);
            }
        }
    }


    public function destroy(string $id)
    {
        $neg = Negeri::find($id);
        if($neg)
        {
            $neg->delete();
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
