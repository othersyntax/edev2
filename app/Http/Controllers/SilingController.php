<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Siling;
use App\Mail\MaklumanSiling;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SilingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.siling.index');
    }

    public function showList(Request $req)
    {
        if($req->isMethod('post')) {
            $sil_program_id = $req->sil_program_id;
            $sil_status = $req->sil_status;


            $query = DB::table('tblsiling as a')
                ->join('tblprogram as b', 'a.sil_fasiliti_id', '=', 'b.program_id')
                ->select('a.*', 'b.program_id', 'b.prog_name')
                ->where(function($q) use ($sil_program_id, $sil_status){
                    if(!empty($sil_status)){
                        $q->where('a.sil_status', $sil_status);
                    }
                    if(!empty($sil_program_id)){
                        $q->where('a.sil_fasiliti_id', $sil_program_id);
                    }
                });
                $siling = $query->orderBy('prog_name')->get();
                // dd($siling);
        }
        else{
            $siling = DB::table('tblsiling as a')
                ->join('tblprogram as b', 'a.sil_fasiliti_id', '=', 'b.program_id')
                ->select('a.*', 'b.prog_name')
                ->orderBy('prog_name')
                ->get();
        }

        return response()->json([
            'siling'=>$siling,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.siling.add');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'sil_program_id'=> 'required',
            'sil_tahun'=> 'required',
            'sil_sdate'=> 'required',
            'sil_edate'=> 'required',
            'sil_amount'=> 'required',
        ],
        [
            'sil_program_id.required'=> 'Sila pilih Program / JKN',
            'sil_tahun.required'=> 'Sila masukkan tahun',
            'sil_sdate.required'=> 'Sila masukkan tarikh kuatkuasa',
            'sil_edate.required'=> 'Sila masukkan tarikh tamat',
            'sil_amount.required'=> 'Sila masukkan jumlah siling',
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
            $sil = new Siling();
            $sil->sil_fasiliti_id = $req->sil_program_id;
            $sil->sil_tahun = $req->sil_tahun;
            $sil->sil_amount = $req->sil_amount;
            $sil->sil_sdate = Carbon::createFromFormat('d/m/Y',$req->sil_sdate)->format('Y-m-d');
            $sil->sil_edate = Carbon::createFromFormat('d/m/Y',$req->sil_edate)->format('Y-m-d');
            $sil->sil_created_by = auth()->user()->id;
            $sil->sil_updated_by = auth()->user()->id;
            $sil->save();
            // dd($sil);
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }
    }

    public function edit(string $id)
    {
        $siling = Siling::find($id);
        if($siling)
        {
            return response()->json([
                'status'=>200,
                'siling'=> $siling,
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


    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'sil_program_id'=> 'required',
            'sil_tahun'=> 'required',
            'sil_sdate'=> 'required',
            'sil_edate'=> 'required',
            'sil_amount'=> 'required',
        ],
        [
            'sil_program_id.required'=> 'Sila pilih Program / JKN',
            'sil_tahun.required'=> 'Sila masukkan tahun',
            'sil_sdate.required'=> 'Sila masukkan tarikh kuatkuasa',
            'sil_edate.required'=> 'Sila masukkan tarikh tamat',
            'sil_amount.required'=> 'Sila masukkan jumlah siling',
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
            $sil = Siling::find($id);
            $sil->sil_fasiliti_id = $req->sil_program_id;
            $sil->sil_tahun = $req->sil_tahun;
            $sil->sil_amount = $req->sil_amount;
            $sil->sil_status = $req->sil_status;
            $sil->sil_sdate = Carbon::createFromFormat('d/m/Y',$req->sil_sdate)->format('Y-m-d');
            $sil->sil_edate = Carbon::createFromFormat('d/m/Y',$req->sil_edate)->format('Y-m-d');
            $sil->sil_updated_by = auth()->user()->id;
            $sil->save();

            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dikemaskini'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siling = Siling::find($id);
        if($siling)
        {
            $siling->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Siling Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Siling Tidak Wujud'
            ]);
        }
    }

    public function emel(Request $req){
        // $selSiling = $req->input('siling');

        // GET PROGRAM ID
        $senaraiProgram = Siling::select('sil_fasiliti_id')->where('sil_tahun', '2026')->groupBy('sil_fasiliti_id')->get()->toArray();
        // dd($senaraiProgram);
        // foreach($selSiling as $sil) {
        //     $programID[] = $sil['program'];
        // }
        // $arrProgramID = $programID->toArray();

        $penerima = \DB::table('vwuserperanan')
            ->whereIn('program_id',$senaraiProgram)
            ->whereIn('peranan', ['pengesah', 'peraku'])
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();
        // dd($penerima);

        $mail = Mail::to($arrPenerima)->send(new MaklumanSiling());

        if($mail){
            foreach ($selSiling as $sil) {
                $silingID = $sil['id'];

                Siling::where('siling_id',$silingID)->update([
                    'sil_emel'  => 2
                 ]);
            }
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dihantar'
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }
}
