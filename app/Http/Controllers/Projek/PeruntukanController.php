<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projek\Peruntukan;
use Carbon\Carbon;

class PeruntukanController extends Controller
{
    public function index(string $id){
        $peruntukan = Peruntukan::where('peru_projek_id', $id)->get();
        return response()->json([
            'status'=>200,
            'peruntukan'=>$peruntukan,
        ]);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'peru_date'=> 'required',
            'peru_amaun'=> 'required',
        ],
        [
            'peru_date.required'=> 'Sila masukkan tarikh',
            'peru_amaun.required'=> 'Sila masukkan amaun',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $peruntukan_id = $req->peruntukan_id;
            if ($peruntukan_id) {
                $peruntukan = Peruntukan::updateOrCreate(
                    ['peruntukan_id' => $peruntukan_id],
                    [
                        'peru_projek_id' => $req->peru_projek_id,
                        'peru_date' => Carbon::createFromFormat('d/m/Y', $req->peru_date)->format('Y-m-d'),
                        'peru_jenis_peruntukan' => $req->peru_jenis_peruntukan,
                        'peru_amaun' => $req->peru_amaun
                    ]
                );

                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya dikemaskini'
                ]);
            }
            else {
                $peruntukan = Peruntukan::updateOrCreate(
                    ['peruntukan_id' => $peruntukan_id],
                    [
                        'peru_projek_id' => $req->peru_projek_id,
                        'peru_date' => Carbon::createFromFormat('d/m/Y', $req->peru_date)->format('Y-m-d'),
                        'peru_jenis_peruntukan' => $req->peru_jenis_peruntukan,
                        'peru_amaun' => $req->peru_amaun
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
        $peruntukan = Peruntukan::find($id);
        return response()->json([
            'status'=>200,
            'peruntukan'=>$peruntukan,
        ]);
    }

    public function delete(string $id){
        $peruntukan = Peruntukan::find($id);
        if($peruntukan)
        {
            $peruntukan->delete();
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
