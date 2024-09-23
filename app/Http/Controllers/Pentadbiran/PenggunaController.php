<?php

namespace App\Http\Controllers\Pentadbiran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /**
     * search
     */
    public function index()
    {
        $pengguna = User::all();
        
        return view("pentadbiran.pengguna.index", compact('pengguna'));
    }

    /**
     * search
     */
    public function ajaxAll(Request $req){
        if($req->isMethod('post')) {
            $carian_type = $req->carian_type;
            $carian_text = $req->carian_text;
            // dd($req);
            if(!empty($carian_type)){
                $query = DB::table('users')
                            ->where(function($q) use ($carian_type, $carian_text){ 
                                if(!empty($carian_type)){
                                    if($carian_type=='id'){
                                        $q->where('id', "%{$carian_text}%");
                                    }
                                    elseif($carian_type=='name'){
                                        $q->where('name','like', "%{$carian_text}%");
                                    }
                                    elseif($carian_type=='email'){
                                        $q->where('email','like', "%{$carian_text}%");
                                    }
                                    else{
                                        $q->where('program_id','like',"%{$carian_text}%");
                                    }
                                    
                                }
                            });
                $pengguna = $query->get();
            }
            else{
                $pengguna =  User::all();             
            }
        }
        else{
            $pengguna =  User::all();
        }
        return response()->json([
            'Pengguna'=>$pengguna,
        ]);
    }


        

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'email'=> 'required',
            'program_id'=> 'required',
            'password'=> 'required',
        ],
        [
            'name.required'=> 'Sila Masukkan Username',
            'email.required'=> 'Sila Masukkan Email',
            'program_id.required'=> 'Sila Masukkan Kod Program',
            'password.required'=> 'Sila Masukkan Katalaluan',
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
           $pengguna = new User();
           $pengguna->name = $request->input('name');
           $pengguna->email = $request->input('email');
           $pengguna->program_id = $request->input('program_id');
           $pengguna->password = $request->input('password');
           
           

            // dd($dae);            
           $pengguna->save();
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = User::find($id);
        if($pengguna)
        {
            return response()->json([
                'status'=>200,
                'User'=> $pengguna,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Pengguna tidak dijumpai.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name'=> 'required',
            'email'=> 'required',
            'program_id'=> 'required',
            
        ],
        [
            'name.required'=> 'Sila Masukkan Username',
            'email.required'=> 'Sila Masukkan Email',
            'program_id.required'=> 'Sila Masukkan Program ID',
            
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $pengguna= User::find($request->input('id'));
             if($pengguna){
                $pengguna->name = $request->input('name');
                $pengguna->email = $request->input('email');
                $pengguna->program_id = $request->input('program_id');
                $pengguna->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Maklumat Pengguna berjaya Dikemaskini'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Maklumat Pengguna Tidak Wujud.'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fas = User::find($id);
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
