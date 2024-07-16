<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\TestingEmel;

class SendMailController extends Controller
{
    public function hantarEmel(){
        
        $mail = Mail::to('fikhri_bpmystep6@moh.gov.my')->send(new TestingEmel());

        if($mail)
            return "Hantar";
        else
            return "gagal";
    }
}
