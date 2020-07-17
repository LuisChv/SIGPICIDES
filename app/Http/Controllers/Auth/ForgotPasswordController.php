<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

   use SendsPasswordResetEmails;

   public function reestablecer(){
    request()->validate([
        'email'=> 'required',
    ],
    [
        'email.required' => "Debe introducir un correo electrónico.",
    ]);

    $user=User::where('email',request('email'))->first();
    if(!$user){
        return redirect('/password/reset');
    }
    //$user['confirmation_code']=Str::random(40);
    //$user->save();
    $data = array('email'=> $user->email, 'name'=>$user->name, 'confirmation_code'=>$user->confirmation_code);
    //Para enviar correo de confirmacion de nuevo
    Mail::send('Mail.password', $data, function ($message) use ($data){
        $message->to($data['email'], $data['name']);
        $message->subject('Reestablecimiento de contraseña olvidada');
    });

    return redirect('/password/reset');
}
}
