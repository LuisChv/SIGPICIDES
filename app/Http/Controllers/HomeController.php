<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $role = DB::SELECT(
			"SELECT RU.role_id FROM userS U JOIN role_user RU 
			ON U.id = RU.user_id WHERE U.id = ?", [auth()->user()->id]
        )[0];
        
        return view('dashboard', [
            'role' => $role->role_id
        ]);
    }    
}
