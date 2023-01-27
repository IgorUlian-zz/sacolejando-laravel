<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class ReusableController extends Controller
{
   

    public function sendEmail($nameUser, $emailUser)
    {
        $title = 'Obrigado por se registrar. ' . $nameUser . ' :*';
        $userDetail = ['name' => $nameUser,  'email' => $emailUser];

        $sendmail = Mail::to($userDetail['email']);

        if (empty($sendmail)) {
            return response()->json(
                ["status" => "ok", 'message' => 'Email enviado com sucesso.'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'Falha ao enviar o Email'],
                400
            );
        }
    }
}