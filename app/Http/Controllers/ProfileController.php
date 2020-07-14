<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        request()->validate([
            'institucion' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'sexo' => ['required'],
        ]);

        $sexo = ($request->sexo == "Masculino");
        

        auth()->user()->update([
            'name' => $request->get('name'), 
            'email' => $request->get('email'), 
            'institucion' => $request->get('institucion'),
            'descripcion' => $request->get('descripcion'),
            'fecha_nac' => $request->get('fecha_nac'),
            'sexo' => $sexo]);
            

        return back()->withStatus(__('Perfil actualizado correctamente.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña actualizada correctamente.'));
    }
}
