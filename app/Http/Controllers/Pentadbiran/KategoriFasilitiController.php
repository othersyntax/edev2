<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pentadbiran\KategoriFasiliti;

class KategoriFasilitiController extends Controller
{
    
    public function index()
    {
        $kategorifasiliti = KategoriFasiliti::all();
        return view("pentadbiran.kategoriFasiliti.index", compact('kategorifasiliti'));
    }

    
    // public function indexwan()
    // {
    //     // $kategori-fasiliti = Kategori Fasiliti::all();
    //     return view("pentadbiran.kategori-fasiliti.index");
    // }

    public function ajaxAll1(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            // dd($req);
            if(!empty($carian_type)){
                $query = \DB::table('tblfasiliti_kategori')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('faskat_kod', $carian_text);
                                    }
                                    else{
                                        $q->where('faskat_desc','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $kategorifasiliti = $query->get();
            }
            else{
                $kategorifasiliti =  KategoriFasiliti::all();             
            }
        }
        else{
            $kategorifasiliti =  KategoriFasiliti::all();
        }
        return response()->json([
            'kategoriFasiliti'=>$kategorifasiliti,
        ]);



    }

    public function ajaxAll(){
        $kategorifasiliti = KategoriFasiliti::all();
        // dd($kategorifasiliti);
        return response()->json([
            'kategoriFasiliti'=>$kategorifasiliti,
        ]);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faskat_kod'=> 'required',
            'faskat_desc'=> 'required',
        ],
        [
            'faskat_kod.required'=> 'Sila masukkan Kod Kategori Fasiliti',
            'faskat_desc.required'=> 'Sila masukkan Deskripsi Fasiliti',
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
            $kate = new KategoriFasiliti;
            $kate->faskat_kod = $request->input('faskat_kod');
            $kate->faskat_desc = $request->input('faskat_desc');
            $kate->faskat_created = \Carbon\Carbon::now();
            $kate->save();
            return response()->json([
                'status'=>200,
                'message'=>'Kategori Fasiliti berjaya ditambah'
            ]);
        }
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $kategorifasiliti = KategoriFasiliti::find($id);
        if($kategorifasiliti)
        {
            return response()->json([
                'status'=>200,
                'kategoriFasiliti'=> $kategorifasiliti,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat kategori fasiliti tidak dijumpai.'
            ]);
        }
    }

   
    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'faskat_kod'=> 'required',
            'faskat_desc'=> 'required',
        ],
        [
            'faskat_kod.required'=> 'Sila masukkan Kategori Fasiliti',
            'faskat_desc.required'=> 'Sila masukkan Deskripsi Kategori Fasiliti',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $kate= KategoriFasiliti::find($req->input('faskat_id'));
            if($kate){
                $kate->faskat_id = $req->input('faskat_id');
                $kate->faskat_kod = $req->input('faskat_kod');
                $kate->faskat_desc = $req->input('faskat_desc');
                $kate->faskat_status = $req->input('faskat_status');
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
        {
            $kate = KategoriFasiliti::find($id);
            if($kate)
            {
                $kate->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Kategori Fasiliti Berjaya Dipadam.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Kategori Fasiliti Tidak Wujud'
                ]);
            }
        }
    }
}
