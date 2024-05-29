<?php

namespace App\Http\Controllers\pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fasiliti;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class FasilitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasiliti = Fasiliti::all();
        
        return view("pentadbiran.fasiliti.index", compact('fasiliti'));
    }

    public function ajaxAll(Request $req){

        // $negeri = Negeri::all();
        // return response()->json ([
        //     'negeri' => $negeri,

        // ]);

        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
           
            if(!empty($carian_type)){
                $query = DB::table('tblfasiliti')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('fas_ptj_code', $carian_text);
                                    }
                                    elseif($carian_type=='kodkate'){
                                        $q->where('fas_kat_kod', $carian_text);
                                    }
                                    
                                    else{
                                        $q->where('fas_name','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $fasiliti = $query->get();
            }
            else{
                $fasiliti =  Fasiliti::all();             
            }

            



        }
        else{
            $fasiliti =  Fasiliti::all();
        }
        return response()->json([
            'fasiliti'=>$fasiliti,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fas_ptj_code'=> 'required',
            'fas_name'=> 'required',
            'faskat_kod'=> 'required',
            'neg_nama_negeri'=> 'required',
           
        ],
        [
            'fas_ptj_code.required'=> 'Sila masukkan Kod PTJ',
            'fas_name.required'=> 'Sila masukkan nama fasiliti',
            'faskat_kod.required'=> 'Sila pilih Kod Kategori',
            'neg_nama_negeri.required'=> 'Sila pilih masukkan nama fasiliti',
           
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
            $fas->faskat_kod = $request->input('faskat_kod');
            $fas->neg_nama_negeri = $request->input('neg_nama_negeri');
           
            $fas->fas_created_by = 1000;
            $fas->fas_udated_by = 1000;
            $fas->save();
            return response()->json([
                'status'=>200,
                'message'=>'Negeri berjaya ditambah'
         ]);
}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req )
    {
        $validator = Validator::make($req->all(), [
            'fas_ptj_code'=> 'required',
            'fas_name'=> 'required',
            'fas_kat_kod'=> 'required',
            'fas_negeri_id'=> 'required',
        ],
        [
            'fas_ptj_code.required'=> 'Sila masukkan Kod PTJ Fasiliti',
            'fas_name.required'=> 'Sila masukkan Nama Fasiliti',
            'fas_kat_kod.required'=> 'Sila masukkan Kod Kategori',
            'fas_negeri_id.required'=> 'Sila masukkan ID Negeri',
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
                $fas->fas_kat_kod = $req->input('fas_kat_kod');
                $fas->fas_negeri_id = $req->input('fas_negeri_id');
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

    /**
     * Remove the specified resource from storage.
     */
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
