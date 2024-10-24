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
        $permissions = Permission::paginate(15);
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'modul_id'=> 'required',
            'name'=> 'required'
        ],
        [
            'modul_id.required'=> 'Sila pilih modul',
            'name_capaian.required'=> 'Sila masukkan nama Had Capaian'
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
                'modul_id' => $request->modul_id,
                'name' => $request->name
            ]);
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya ditambah'
            ]);
        }
    }

    public function edit(Permission $permission)
    {
        return response()->json([
            'status'=>200,
            'permission'=> $permission,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $validator = Validator::make($request->all(), [
            'modul_id'=> 'required',
            'name'=> 'required'
        ],
        [
            'modul_id.required'=> 'Sila pilih modul',
            'name_capaian.required'=> 'Sila masukkan nama Had Capaian'
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
            $permission->update([
                'modul_id' => $request->modul_id,
                'name' => $request->name
            ]);

            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dikemakini'
            ]);
        }
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
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
