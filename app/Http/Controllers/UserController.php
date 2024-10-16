<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
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
            'nokp' => 'required|min:12|unique:users,nokp',
            'email' => 'required|email|max:255|unique:users,email',
            'program_id' => 'required',
            'jawatan' => 'required',
            'gred' => 'required',
            'nophone_office' => 'required',
            'tahap' => 'required',
            'roles' => 'required'

        ],
        [
            'name.required' => 'Sila masukkan nama',
            'nokp.required' => 'Sila masukkan No. kad Pengenalan',
            'nokp.min' => 'No. Kad Pengenalan hanya 12 aksara',
            'nokp.unique' => 'No Kad Pengenalan telah wujud',
            'email.required' => 'Sila masukkan e-mel',
            'email.email' => 'Sila masukkan e-mel yang tepat',
            'email.unique' => 'Maklumat e-mel telah wujud',
            'program_id.required' => 'Sila pilih Program/ Bahagian/ JKN/ Institusi',
            'jawatan.required' => 'Sila masukkan jawatan',
            'gred.required' => 'Sila masukkan Gred Jawatan',
            'nophone_office.required' => 'Sila masukkan No. Telefon Pejabat',
            'tahap.required' => 'Sila pilih Tahap Capaian',
            'roles.required' => 'Sila pilih peranan'
        ]);


        $user = User::create([
            'name' => $request->name,
            'nokp' => $request->nokp,
            'gelaran_id' => $request->gelaran_id,
            'email' => $request->email,
            'program_id' => $request->program_id,
            'jawatan' => $request->jawatan,
            'gred' => $request->gred,
            'nophone_office' => $request->nophone_office,
            'nophone_mobile' => $request->nophone_mobile,
            'role' => $request->tahap,
            'password' => Hash::make('eDE@2024'),
        ]);

        // $mail = Mail::to($request->email)->send(new PermohonanAkaunBaru());

        $user->syncRoles($request->roles);
        $mail = Mail::to($request->email)->send(new PermohonanAkaunBaru());

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
            'nokp' => 'required|min:12',
            'email' => 'required|email|max:255',
            'program_id' => 'required',
            'jawatan' => 'required',
            'gred' => 'required',
            'nophone_office' => 'required',
            'tahap' => 'required',
            'roles' => 'required'

        ],
        [
            'name.required' => 'Sila masukkan nama',
            'nokp.required' => 'Sila masukkan No. kad Pengenalan',
            'nokp.min' => 'No. Kad Pengenalan hanya 12 aksara',
            'email.required' => 'Sila masukkan e-mel',
            'email.email' => 'Sila masukkan e-mel yang tepat',
            'email.unique' => 'Maklumat e-mel telah wujud',
            'program_id.required' => 'Sila pilih Program/ Bahagian/ JKN/ Institusi',
            'jawatan.required' => 'Sila masukkan jawatan',
            'gred.required' => 'Sila masukkan Gred Jawatan',
            'nophone_office.required' => 'Sila masukkan No. Telefon Pejabat',
            'tahap.required' => 'Sila pilih Tahap Capaian',
            'roles.required' => 'Sila pilih peranan'
        ]);

        $data = [
            'name' => $request->name,
            'nokp' => $request->nokp,
            'gelaran_id' => $request->gelaran_id,
            'email' => $request->email,
            'program_id' => $request->program_id,
            'jawatan' => $request->jawatan,
            'gred' => $request->gred,
            'nophone_office' => $request->nophone_office,
            'nophone_mobile' => $request->nophone_mobile,
            'role' => $request->tahap,
            'updated_at' =>date('Y-m-d H:i:s'),
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
