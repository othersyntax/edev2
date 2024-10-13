<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PermohonanAkaunBaru;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:update user', ['only' => ['update','edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            $program =  $request->program;
            $role =  $request->role;
            $nama =  $request->nama;
            $statusUser  =  $request->statusUser;
            session([
                'program' => $program,
                'role' => $role,
                'nama' => $nama,
                'statusUser' => $statusUser
            ]);
            $queryType = 2;
        }
        else{
            if( $request->has('page')) {
                $program = session('program');
                $role = session('role');
                $nama = session('nama');
                $statusUser = session('statusUser');
                $queryType = 2;
            }
            else{
                session()->forget(['program', 'role', 'nama', 'statusUser']);
            }
        }

        if ($queryType == 1) {
            $users = User::paginate(15);
        }
        else{
            $query = User::where(function($q) use ($program, $role, $nama, $statusUser){
                if(!empty($program)){
                    $q->where('program_id',$program);
                }
                if(!empty($role)){
                    $q->where('role',$role);
                }
                if(!empty($nama)){
                    $q->where('name','LIKE', "%{$nama}%");
                }
                if(!empty($statusUser)){
                    $q->where('user_status',$statusUser);
                }
            });
            $users = $query->paginate(15);
        }
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'

        ],
        [
            'name.required' => 'Sila masukkan nama',
            'email.required' => 'Sila masukkan e-mel',
            'email.email' => 'Sila masukkan e-mel yang tepat',
            'email.unique' => 'Maklumat e-mel teah wujud',
            'password.required' => 'Sila masukkan katalaluan',
            'password.min' => 'Katalaluan sekurang-kurangnya 8 aksara',
            'roles.required' => 'Sila pilih peranan'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('eDE@2024'),
            'program_id' => $request->program_id,
        ]);

        // $mail = Mail::to($request->email)->send(new PermohonanAkaunBaru());

        $user->syncRoles($request->roles);

        return redirect('/akses/users')->with('status','Pengguna berjaya ditambah');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,


        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'user_status'=> $request->user_status,
            'program_id' => $request->program_id,

        ];

        // if(!empty($request->password)){
        //     $data += [
        //         'password' => Hash::make($request->password),
        //     ];
        // }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/akses/users')->with('status','Maklumat pengguna berjaya dikemaskini');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/akses/users')->with('status','User Delete Successfully');
    }

    public function emel(){
        $mail = Mail::to('usup.keram@moh.gov.my')->send(new PermohonanAkaunBaru());
    }
}
