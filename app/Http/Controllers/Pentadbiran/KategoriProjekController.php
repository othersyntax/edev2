<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use App\Models\Pentadbiran\KategoriProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KategoriProjekController extends Controller
{
    
    public function index()
    {
        $kategoriprojek = KategoriProjek::all();
        
        return view("pentadbiran.kategoriprojek.index", compact('kategoriprojek'));
    }

   

    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            // dd($req);
            if(!empty($carian_type)){
                $query = DB::table('tblprojek_kategori')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('pro_kat_nama', $carian_text);
                                    }
                                    else{
                                        $q->where('proj_kategori_id','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $kategoriprojek = $query->get();
            }
            else{
                $kategoriprojek =  KategoriProjek::all();             
            }
        }
        else{
            $kategoriprojek =  KategoriProjek::all();
        }
        return response()->json([
            'KategoriProjek'=>$kategoriprojek,
        ]);



    }





    public function create()
    {
        //
    }

    

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'pro_kat_nama'=> 'required',
            
        ],
        [
            'pro_kat_nama.required'=> 'Sila masukkan nama projek',
           
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
            $fas = new KategoriProjek();
            $fas->pro_kat_nama = $req->input('pro_kat_nama');
            $fas->pro_kat_created_by = 1000;
            $fas->pro_kat_updated_by = 1000;
            $fas->save();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat berjaya ditambah'
         ]);
        }   
    }

    public function show(string $id)
    {
    
    }

    public function edit(string $id)
    {
        $kategoriprojek = KategoriProjek::find($id);
        if($kategoriprojek)
        {
            return response()->json([
                'status'=>200,
                'kategoriprojek'=> $kategoriprojek,
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
    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'pro_kat_nama'=> 'required',
            
        ],
        [
            'pro_kat_nama.required'=> 'Sila masukkan Nama Kategori Projek',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $kate= KategoriProjek::find($req->input('proj_kategori_id'));
            if($kate){
                $kate->proj_kategori_id = $req->input('proj_kategori_id');
                $kate->pro_kat_nama = $req->input('faskat_kod');
                $kate->pro_kat_status = $req->input('pro_kat_status');
                $kate->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat kategori fasiliti berjaya dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Kategori Fasiliti Tidak Wujud.'
                ]);
            }

        }
    }

    public function destroy(string $id)
    {
        $kapro = KategoriProjek::find($id);
        if($kapro)
        {
            $kapro->delete();
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
