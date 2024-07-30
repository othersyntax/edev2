<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\LatihanEmel;
use Illuminate\Support\Facades\Mail;
class MailTestController extends Controller
{
    public function hantarEmel(){
        // $data = [
        //     'title' => 'Emel eDE',
        //     'body' => 'Ini adalah kandung emel yang dihantar',
        // ];

        $mail = Mail::to('anas.fikhri@gmail.com')->send(new LatihanEmel());

        if($mail)
            return "Hantar";
        else
            return "gagal";
    }
}
