<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use App\Models\Pentadbiran\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
                $query = DB::table('tblprogram')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='Kod'){
                                        $q->where('prog_name', $carian_text);
                                    }
                                    else{
                                        $q->where('program_id','like', "%{$carian_text}%");
                                    }
                                }
                            });
                $Program = $query->get();
            }
            else{
                $Program =  Program::all();             
            }
        }
        else{
            $Program =  Program::all();
        }
        return response()->json([
            'Program'=>$Program,
        ]);



    }





     public function create()
     {
        //
     }

    

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'prog_name'=> 'required',
            
        ],
        [
            'prog_name.required'=> 'Sila masukkan nama program',
           
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
            $fas = new Program();
            $fas->prog_name = $req->input('prog_name');
            $fas->prog_created_by = 1000;
            $fas->prog_updated_by = 1000;
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
        $program = program::find($id);
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
    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'prog_name'=> 'required',
            
        ],
        [
            'prog_name.required'=> 'Sila masukkan Nama Program',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $kate= Program::find($req->input('program_id'));
            if($kate){
                $kate->program_id = $req->input('program_id');
                $kate->prog_name = $req->input('prog_name');
                $kate->prog_status = $req->input('prog_status');
                $kate->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Program berjaya dikemaskini'
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
        $kapro = Program::find($id);
        if($kapro)
        {
            $kapro->delete();
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
