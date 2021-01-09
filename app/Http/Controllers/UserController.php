<?php

namespace App\Http\Controllers;

use App\User;
use App\RolUsuario;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function indexPanel(/*User $model*/)
    {
        //return view('users.index', ['users' => $model->paginate(15)]);
        return view ('users.usuariosDashboard');
    }

    public function index(){
        $data = User::paginate(5);
        $usersBuscador= User::all();        
        return view ('users.index',[
            'data' => $data,
            'usersBuscador'=>$usersBuscador,
        ]);
    }


    public function create(){
        $roles = DB::select('SELECT * FROM roles');
        $data = User::paginate(5);
        $usersBuscador= User::all();
        return view ('users.crear', [
            'roles'=> $roles, 
            'data' => $data,
            'usersBuscador'=>$usersBuscador,
        ]);
    }

    public function store(){
         //Validacion de los datos      
        request()->validate([
            'name'=> ['required', 'string', 'email', 'max:200'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'email', 'max:120'],
            'fecha_nac'=> 'required',
            'institucion'=> ['required', 'string', 'email', 'max:1024'],
            'descripcion'=> ['required', 'string', 'email', 'max:2048'],
            'sexo' => ['required'],
            'rol' => 'required',
        ],
        [
            'name.required' => "El username es obligatorio.",
            'email.required' => "El email es obligatoria.",
            'password.required' => "Establecer contraseña.",
            'fecha_nac.required' => "Seleccione su fecha de nacimiento.",
            'institucion.required' => "La Institucion es obligatoria.",
            'descripcion.required' => "La descripción es obligatoria.",
            'sexo.required' => "Seleccione el sexo.",
            'rol.required' => "Seleccione el rol.",
        ]);
      

        //Se asignan las variables al nuevo usuario
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'fecha_nac' => request('fecha_nac'),
            'institucion' => request('institucion'),
            'descripcion' => request('descripcion'),
            'sexo' => (request('sexo') == "Masculino"),
        ]);

        $role = Role::where('name', request('rol'))->first();;

        DB::table('role_user')->insert(
            array('role_id' => $role->id, 'user_id' => $user->id)
        );

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = ?', [$role->id]);

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => $user->id,
            ]);
        }

        return redirect('/users');

    }


    public function show($id)
    {
        $data= User::paginate(5);
        $usersBuscador= User::all();
        //Buscar el usuario con el id de entrada
        $user= User::findOrFail($id);
        
        //Buscar nombre de rol y tipo de recurso
       //S $role=Role::findOrFail($->id_tipo);
        
        //Retornar la vista
        return view ('users.show', [
            'user'=>$user,
            'data'=>$data,
            'usersBuscador'=>$usersBuscador,
        ]);
    }

    public function edit($id)
    {
        $data= User::paginate(5);
        $roles= DB::select('SELECT * FROM roles');
    
        //Buscar user y su respectivo rol
        $user= User::findOrFail($id);
        $roleuser= RolUsuario::where('user_id', $id)->first();
        $usersBuscador= User::all();
        //$roleuser=DB::select('SELECT * FROM role_user WHERE user_id = ?', [$id]);
       
        return view ('users.editar',[
            'user'=>$user, 
            'roles' => $roles, 
            'data' => $data,
            'roleuser'=>$roleuser,
            'usersBuscador'=>$usersBuscador,
            ]);
    }

    public function update($id){
        request()->validate([
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', Rule::unique('users')->ignore($id)],
            'fecha_nac'=> 'required',
            'institucion'=> 'required',
            'descripcion'=> 'required',
            'sexo' => 'required',
            'rol' => 'required',
        ],
        [
            'name.required' => "El username es obligatorio.",
            'email.required' => "El email es obligatoria.",
            'password.required' => "Establecer contraseña.",
            'fecha_nac.required' => "Seleccione su fecha de nacimiento.",
            'institucion.required' => "La Institución es obligatoria.",
            'descripcion.required' => "La descripción es obligatoria.",
            'sexo.required' => "Seleccione el sexo.",
            'rol.required' => "Seleccione el rol.",
        ]);
      

        //Modificar datos de usuario
        $user = User::findOrFail($id);

        $user->name=request('name');
        $user->email=request('email');
        if(!empty(request('password'))){
            $user->password=Hash::make(request('password'));
        }
        $user->fecha_nac=request('fecha_nac');
        $user->institucion=request('institucion');
        $user->descripcion=request('descripcion');
        $user->sexo = (request('sexo') == "Masculino");
    
        $user->save();

        $role = Role::where('name', request('rol'))->first();;

        DB::table('role_user')->where('user_id', $id)->update(['role_id' => $role->id]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = ?', [$role->id]);

        //Borrado de permisos por cambio de rol
        DB::table('permission_user')->where('user_id', $id)->delete();
       
        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => $id,
            ]);
        }

        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => $id,
        ]);

        return redirect('/users');
    }


    public function destroy($id)
    {
        //dd($id);
        $user= User::findOrFail($id);
       
        DB::table('permission_user')->where('user_id', $id)->delete();
        DB::table('role_user')->where('user_id', $id)->delete();
        $user->delete();
        return redirect('/users');
    }

    public function dark($id){
      
        $dark = User::findOrFail($id)->dark;

        DB::table('users')->where('id', $id)->update(['dark' => !$dark]);
        return redirect()->back();
    }
}
