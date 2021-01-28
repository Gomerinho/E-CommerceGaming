<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class InscriptionController extends Controller
{
    public function verification()
    {
        request()->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'name' => request('name'),
            'birthdate' => request('birthdate'),
        ]);
        flash('success', 'Vous êtes inscrit, connectez vous !');
        return redirect('/inscription');
    }

    public function formulaire()
    {
        return view('inscription');
    }
}
