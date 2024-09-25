<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projek\ProjekUtilities;
use Carbon\Carbon;


class UtilitiController extends Controller
{
    public function index(string $id){
        $utiliti = ProjekUtilities::where('projuti_projek_id', $id)->get();
        if($utiliti)
        {
            return response()->json([
                'status'=>200,
                'utiliti'=> $utiliti,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Tiada Rekod'
            ]);
        }
    }

    public function edit(string $id)
    {
        $utiliti = ProjekUtilities::find($id);
        if($utiliti)
        {
            return response()->json([
                'status'=>200,
                'utiliti'=> $utiliti,
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

    public function delete(string $id){
        $porju = ProjekUtilities::find($id);
        if($porju)
        {
            $porju->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Aktiviti Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Aktiviti Tidak Wujud'
            ]);
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'projuti_perihal'=> 'required',
            'projuti_ref_no'=> 'required',
            'projuti_date'=> 'required',
        ],
        [
            'projuti_perihal.required'=> 'Sila pilih perihal',
            'projuti_ref_no.required'=> 'Sila masukkan No Rujukan',
            'projuti_date.required'=> 'Sila pilih tarikh',
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
           $porju = ProjekUtilities::find($req->input('projek_uti_id'));
           $porju->projuti_perihal = $req->input('projuti_perihal');
           $porju->projuti_ref_no = $req->input('projuti_ref_no');
           $porju->projuti_date = Carbon::createFromFormat('d/m/Y', $req->input('projuti_date'))->format('Y-m-d');
           $porju->projuti_catatan = $req->input('projuti_catatan');
           $porju->projuti_updated_by = auth()->user()->id;

            // dd($dae);
           $porju->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dikemakini'
            ]);
        }
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'projuti_perihal'=> 'required',
            'projuti_ref_no'=> 'required',
            'projuti_date'=> 'required',
        ],
        [
            'projuti_perihal.required'=> 'Sila pilih perihal',
            'projuti_ref_no.required'=> 'Sila masukkan No Rujukan',
            'projuti_date.required'=> 'Sila pilih tarikh',
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
           $porju = new ProjekUtilities();
           $porju->projuti_projek_id = $req->input('projek_id');
           $porju->projuti_perihal = $req->input('projuti_perihal');
           $porju->projuti_ref_no = $req->input('projuti_ref_no');
           $porju->projuti_date = Carbon::createFromFormat('d/m/Y', $req->input('projuti_date'))->format('Y-m-d');
           $porju->projuti_catatan = $req->input('projuti_catatan');
           $porju->projuti_created_by = auth()->user()->id;
           $porju->projuti_updated_by = auth()->user()->id;

            // dd($dae);
           $porju->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dikemakini'
            ]);
        }
    }
}
