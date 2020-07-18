<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use DB;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function formulario($token, $email){
        return view('auth.passwords.reset',['token' => $token, 
        'email' => $email,]);
    }

    public function update($token){
        
        request()->validate([
            'email'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required'
        ],
        [
            'email.required' => "El email es obligatorio",
            'password.required' => "Escriba una contraseña",
            'password_confirmation' => "Escriba la confirmación de su contraseña",
        ]);
        $user= User::whereRaw("email = ? AND confirmation_code= ?" ,[request('email'),$token])->first();
        if(!$user){
            return view('auth.passwords.reset',['token' => $token, 
            'email' => request('email')]);   
        }
        if(request('password')==request('password_confirmation')){
            $user->password= Hash::make(request('password'));
            $user->confirmation_code=null;
            $user->save();
            return redirect('/home');
        }
        else{
            return view('auth.passwords.reset',['token' => $token, 
            'email' => request('email')]);  
        }
        


        
    }
}
