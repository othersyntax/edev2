<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Pentadbiran\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();
        return view("pentadbiran.program.index", compact('program'));
    }

    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            // dd($req);
            if(!empty($carian_type)){
                $query = \DB::table('tblprogram')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='prog_name'){
                                        $q->where('prog_name', 'like', "%{$carian_text}%");
                                    }
                                    else{
                                        $q->where('program_id', $carian_text);
                                    }
                                                                                                       
                                }
                            });
                $program = $query->get();
            }
            else{
                $program =  Program::all();             
            }
        }
        else{
            $program =  Program::all();
        }
        return response()->json([
            'Program'=>$program,
        ]);



    }

    public function create()
    {
        //
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'prog_code'=> 'required',
            'prog_name'=> 'required',
            'prog__negri_id'=> 'required',
        ],
        [
            'prog_code.required'=> 'Sila masukkan Kod Program',
            'prog_name.required'=> 'Sila masukkan Nama Program',
            'prog__negri_id.required'=> 'Sila pilih Negeri',
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
           $prog = new Program;
           $prog->prog_code = $req->input('prog_code');
           $prog->prog_name = $req->input('prog_name');
           $prog->prog__negri_id = $req->input('prog__negri_id');
           $prog->prog_updated_by = 1000;
           $prog->prog_created_by = 1000;
           

            // dd($dae);            
           $prog->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $program = Program::find($id);
        // dd($id);
        if($program)
        {
            return response()->json([
                'status'=>200,
                'program'=> $program,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat program tidak dijumpai.'
            ]);
        }
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'program_id'=> 'required',
            'prog_code'=> 'required',
            'prog_name'=> 'required',
            'prog__negri_id'=> 'required',
        ],
        [
            'program_id.required'=> 'Sila masukkan Id Program',
            'prog_code.required'=> 'Sila masukkan Kod Program',
            'prog_name.required'=> 'Sila masukkan Nama Program',
            'prog__negri_id.required'=> 'Sila pilih Negeri',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $prog= Program::find($req->input('program_id'));
            if($prog){
                $prog->prog_code = $req->input('prog_code');
                $prog->prog_name = $req->input('prog_name');
                $prog->prog__negri_id = $req->input('prog__negri_id');
                $prog->prog_status = $req->input('prog_status');
                $prog->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat program berjaya dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Program Tidak Wujud.'
                ]);
            }

        }
    }

    public function destroy(string $id)
    {
        $prog = Program::find($id);
        if($prog)
        {
            $prog->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Program Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Program Tidak Wujud'
            ]);
        }
    }
}
