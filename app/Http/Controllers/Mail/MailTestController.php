<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\LatihanEmel;

class MailTestController extends Controller
{
    public function hantarEmel(){
        $data = [
            'title' => 'Emel eDE',
            'body' => 'Ini adalah kandung emel yang dihantar',
        ];

        $mail = Mail::to('usup.keram@moh.gov.my')->send(new LatihanEmel());

        if($mail)
            return "Hantar";
        else
            return "gagal";
    }
}
