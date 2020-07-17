<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use DB;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verificar($code)
    {
        $user=User::where('confirmation_code',$code)->first();

        if(!$user){
            return redirect('/email');
        }
        

        $user->email_verified_at=now();
        $user->confirmation_code=null;
        $user->save();

        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => $user->id,
        ]);

        return redirect('/home');        
    }

    public function reenviar(){
        //dd(auth()->user()->email);
        $user= User::findOrFail(auth()->user()->id);
        if( $user->email_verified_at!=null){
            return redirect('/home'); 
        }
        $user['confirmation_code']=Str::random(40);
        $user->save();
        $data = array('email'=> $user->email, 'name'=>$user->name, 'confirmation_code'=>$user->confirmation_code);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.verificacion_email_plantilla', $data, function ($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Verificación de correo electrónico');
        });

        return redirect('/home');
    }
}
