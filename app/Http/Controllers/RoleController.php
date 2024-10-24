<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:update role', ['only' => ['update','edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string|unique:roles,name',
            ],
            [
                'name.required' => 'Sila masukkan nama peranan',
                'name.string' => 'Peranan mesti aksara sahaja',
                'name.unique' => 'Peranan telah wujud!!',
            ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('/akses/roles')->with('status','Peranan berja ditambah');
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.edit',[
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(
            [
            'name'=>'required|string|unique:roles,name',
            ],
            [
                'name.required' => 'Sila masukkan nama peranan',
                'name.string' => 'Peranan mesti aksara sahaja',
                'name.unique' => 'Peranan telah wujud!!',
            ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('/akses/roles')->with('status','Peranan berjaya dikemaskini');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('/akses/roles')->with('status','Peranan berjaya dipadam');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::all()->groupBy('modul_id');
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        // dd($permissions);
        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Capaian telah diberi kepada peranan');
    }
}
