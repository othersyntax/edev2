<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission', ['only' => ['index']]);
        $this->middleware('permission:create permission', ['only' => ['create','store']]);
        $this->middleware('permission:update permission', ['only' => ['update','edit']]);
        $this->middleware('permission:delete permission', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    // public function ajaxAll(){
    //     $permissions = Permission::get();
    //     return response()->json([
    //         'permissions'=>$permissions,
    //     ]);
    // }

    // public function create()
    // {
    //     return view('role-permission.permission.create');
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_capaian'=> 'required'
            // 'name_capaian'=> 'unique:permissions,name'
        ],
        [
            'name_capaian.required'=> 'Sila masukkan nama Had Capaian'
            // 'name_capaian.unique'=> 'Had Capaian telah wujud'
        ]);
        // dd($validator->fails());
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            Permission::create([
                'name' => $request->name_capaian
            ]);
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }

        

        // return redirect('/akses/permissions')->with('status','Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('/akses/permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        // $permission->delete();
        // return redirect('/akses/permissions')->with('status','Permission Deleted Successfully');

        // $dae = Bandar::find($id);
        if($permission)
        {
            $permission->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat Had Capaian Berjaya Dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Had Capaian Tidak Wujud'
            ]);
        }
    }
}
