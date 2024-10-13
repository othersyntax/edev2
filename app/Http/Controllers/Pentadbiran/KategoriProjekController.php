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

        return view("pentadbiran.kategori-projek.index", compact('kategoriprojek'));
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
                                    if($carian_type=='proj_kategori_id'){
                                        $q->where('proj_kategori_id', "%{$carian_text}%");
                                    }
                                    elseif($carian_type=='pro_kat_nama'){
                                        $q->where('pro_kat_nama','like', "%{$carian_text}%");
                                    }
                                    else{
                                        $q->where('pro_siling', $carian_text);
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
            'pro_kat_short_nama'=> 'required',
            'pro_kat_nama'=> 'required',
            'pro_siling'=> 'required',
        ],
        [
            'pro_kat_short_nama.required'=> 'Sila Masukkan Kod Projek',
            'pro_kat_nama.required'=> 'Sila masukkan Nama Projek',
            'pro_siling.required'=> 'Sila pilih Kategori Siling',
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
           $katepro = new KategoriProjek();
           $katepro->pro_kat_short_nama = $req->input('pro_kat_short_nama');
           $katepro->pro_kat_nama = $req->input('pro_kat_nama');
           $katepro->pro_siling = $req->input('pro_siling');
           $katepro->pro_kat_sort = 9;
           $katepro->pro_kat_created_by = auth()->user()->id;
           $katepro->pro_kat_updated_by = auth()->user()->id;


            // dd($dae);
           $katepro->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
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
                'KategoriProjek'=> $kategoriprojek,
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
    public function update(Request $req )
    {
        $validator = Validator::make($req->all(), [

            'pro_kat_short_nama'=> 'required',
            'pro_kat_nama'=> 'required',
            'pro_siling'=> 'required',
            'pro_kat_sort'=> 'required',
        ],
        [
            'pro_kat_short_nama.required'=> 'Sila Masukkan Nama Ringkas Projek',
            'pro_kat_nama.required'=> 'Sila Masukkan Nama Projek',
            'pro_siling.required'=> 'Sila Pilih Kategori Siling',
            'pro_kat_sort.required'=> 'Sila masukkan keutamaan',

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $katepro= KategoriProjek::find($req->input('proj_kategori_id'));
             if($katepro){
                $katepro->pro_kat_short_nama = $req->input('pro_kat_short_nama');
                $katepro->pro_kat_nama = $req->input('pro_kat_nama');
                $katepro->pro_siling = $req->input('pro_siling');
                $katepro->pro_kat_sort = $req->input('pro_kat_sort');
                $katepro->pro_kat_status = $req->input('pro_kat_status');
                $katepro->update();

                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Kategori Projek berjaya Dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Kategori Projek Tidak Wujud.'
                ]);
            }

        }
    }

    public function destroy(string $id)
    {
        $fas = KategoriProjek::find($id);
        if($fas)
        {
            $fas->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Tidak Wujud'
            ]);
        }


    }

}
