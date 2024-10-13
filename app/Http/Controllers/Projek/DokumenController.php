<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use App\Models\Projek\ProjekDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index(string $id){
        $doc = ProjekDokumen::where('proj_doc_projek_id', $id)->get();
        return response()->json([
            'doc'=> $doc,
        ]);
    }

    public function upload(Request $req){
        $validator = Validator::make($req->all(), [
            'proj_doc_perihal'=>'required',
            'proj_doc_fail'=>'required|mimes:pdf,xlsx|max:2048',
        ],
        [
            'proj_doc_perihal.required'=>'Sila masukkan perihal dokumen',
            'proj_doc_fail.required'=>'Sila muat naik dokumen',
            'proj_doc_fail.mimes'=>'Hanya dokumen PDF, XLS sahaja dibenarkan',
            'proj_doc_fail.max'=>'Saiz maksimum dokumen adalah 2MB',
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
            $file = $req->file('proj_doc_fail');
            $filename =  $req->projek_id.'-'.time();
            $url = Storage::putFileAs('public/permohonan/dokumen/', $file, $filename . '.' . $file->extension());

            $doc = new ProjekDokumen();
            $doc->proj_doc_projek_id = $req->projek_id;
            $doc->proj_doc_perihal = $req->proj_doc_perihal;
            $doc->proj_doc_fail = 'permohonan/dokumen/'.$filename . '.' . $file->extension();
            $doc->save();

            if($doc){
                // $req->proj_doc_fail->move(public_path('permohonan/dokumen', $filename));
                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya ditambah'
                ]);
            }
        }

    }

    public function padamDokumen(string $id){
        $doc = ProjekDokumen::find($id);
        if($doc)
        {
            Storage::delete('public/'.$doc->proj_doc_fail);
            $doc->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat dokumen berjaya dipadam.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Dokumen Tidak Wujud'
            ]);
        }
    }
}
