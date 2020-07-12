<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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
        $data = User::all();
        return view ('users.index',[
            'data' => $data
        ]);
    }
    public function create(){
        $roles = Role::all();
        return view ('users.crear', [
            'roles'=> $roles
        ]);
    }
}
