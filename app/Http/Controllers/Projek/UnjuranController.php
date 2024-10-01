<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projek\ProjekBaruUnjuran;

class UnjuranController extends Controller
{
    public function index(string $id){
        $unjuran = ProjekBaruUnjuran::where('proj_unjur_projek_id', $id)->get();
        return response()->json([
            'status'=>200,
            'unjuran'=>$unjuran,
        ]);
    }

    public function simpanUnjuran(Request $req){
        $validator = Validator::make($req->all(), [
            'proj_unjur_tahun'=> 'required',
            'proj_unjur_siling'=> 'required',
        ],
        [
            'proj_unjur_tahun.required'=> 'Sila masukkan tahun unjuran',
            'proj_unjur_siling.required'=> 'Sila masukkan siling tahunan',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $unjuran_id = $req->proj_unjuran_id;
            if ($unjuran_id) {
                $unjuran = ProjekBaruUnjuran::updateOrCreate(
                    ['proj_unjuran_id' => $unjuran_id],
                    [
                        'proj_unjur_projek_id' => $req->proj_unjur_projek_id,
                        'proj_unjur_tahun' => $req->proj_unjur_tahun,
                        'proj_unjur_siling' => $req->proj_unjur_siling
                    ]
                );

                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya dikemaskini'
                ]);
            }
            else {
                $unjuran = ProjekBaruUnjuran::updateOrCreate(
                    ['proj_unjuran_id' => $unjuran_id],
                    [
                        'proj_unjur_projek_id' => $req->proj_unjur_projek_id,
                        'proj_unjur_tahun' => $req->proj_unjur_tahun,
                        'proj_unjur_siling' => $req->proj_unjur_siling
                    ]
                );
                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya ditambah'
                ]);
            }
        }
    }


    public function edit(string $id){
        $unjuran = ProjekBaruUnjuran::find($id);
        return response()->json([
            'status'=>200,
            'unjuran'=>$unjuran,
        ]);
    }

    public function padamUnjuran(string $id){
        $unjuran = ProjekBaruUnjuran::find($id);
        if($unjuran)
        {
            $unjuran->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Unjuran Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Unjuran Tidak Wujud'
            ]);
        }
    }
}
