<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\Bayaran;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BayaranController extends Controller
{
    public function index(string $id){
        $bayaran = Bayaran::where('byr_projk_id', $id)->get();
        if($bayaran)
        {
            return response()->json([
                'status'=>200,
                'bayaran'=> $bayaran,
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
        $bayaran = Bayaran::find($id);
        if($bayaran)
        {
            return response()->json([
                'status'=>200,
                'bayaran'=> $bayaran,
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
        $porju = Bayaran::find($id);
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

    // public function update(Request $req)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'projuti_perihal'=> 'required',
    //         'projuti_ref_no'=> 'required',
    //         'projuti_date'=> 'required',
    //     ],
    //     [
    //         'projuti_perihal.required'=> 'Sila pilih perihal',
    //         'projuti_ref_no.required'=> 'Sila masukkan No Rujukan',
    //         'projuti_date.required'=> 'Sila pilih tarikh',
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //        $porju = ProjekUtilities::find($req->input('projek_uti_id'));
    //        $porju->projuti_perihal = $req->input('projuti_perihal');
    //        $porju->projuti_ref_no = $req->input('projuti_ref_no');
    //        $porju->projuti_date = Carbon::createFromFormat('d/m/Y', $req->input('projuti_date'))->format('Y-m-d');
    //        $porju->projuti_catatan = $req->input('projuti_catatan');
    //        $porju->projuti_updated_by = auth()->user()->id;

    //         // dd($dae);
    //        $porju->save();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Berjaya dikemakini'
    //         ]);
    //     }
    // }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'byr_perihal'=> 'required',
            'byr_amount'=> 'required',
            'byr_date'=> 'required',
        ],
        [
            'byr_perihal.required'=> 'Sila masukkan perihal',
            'byr_amount.required'=> 'Sila masukkan amaun',
            'byr_date.required'=> 'Sila masukkan tarikh',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else {
            $bayaran_id = $req->bayaran_id;
            if ($bayaran_id) {
                // update the value
                $bayar = Bayaran::updateOrCreate(
                    ['bayaran_id' => $bayaran_id],
                    [
                        'byr_projk_id' => $req->projek_id,
                        'byr_refno' => $req->byr_refno,
                        'byr_perihal' => $req->byr_perihal,
                        'byr_date' => Carbon::createFromFormat('d/m/Y', $req->byr_date)->format('Y-m-d'),
                        'byr_amount' => $req->byr_amount,
                        'byr_updated_by' => auth()->user()->id
                    ]
                );

                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya dikemaskini'
                ]);
            }
            else {
                $bayar = Bayaran::updateOrCreate(
                    ['bayaran_id' => $bayaran_id],
                    [
                        'byr_projk_id' => $req->projek_id,
                        'byr_refno' => $req->byr_refno,
                        'byr_perihal' => $req->byr_perihal,
                        'byr_date' => Carbon::createFromFormat('d/m/Y', $req->byr_date)->format('Y-m-d'),
                        'byr_amount' => $req->byr_amount,
                        'byr_created_by' => auth()->user()->id,
                        'byr_updated_by' => auth()->user()->id
                    ]
                );
                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya ditambah'
                ]);
            }
        }
    }
}
