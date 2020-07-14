<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fecha_nac' => ['required', 'string'],
            'institucion' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'sexo' => ['required'],
        ],
        [
            'name.required' => "El nombre de usuario es obligatorio.",
            'email.required' => "El correo electrónico es obligatorio.",
            'password.required' => "La contraseña es obligatoria",
            'fecha_nac.required' => "La fecha de nacimiento es obligatoria.",
            'institucion.required' => "La institución de procedencia es obligatoria.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'sexo.required' => "Seleccione su sexo.",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fecha_nac' => $data['fecha_nac'],
            'institucion' => $data['institucion'],
            'descripcion' => $data['descripcion'],
            'sexo' => ($data['sexo'] == "Masculino"),
        ]);

        DB::table('role_user')->insert(
            array('role_id' => 4, 'user_id' => $user->id)
        );

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => $user->id,
            ]);
        }

        return $user;
    }
}
