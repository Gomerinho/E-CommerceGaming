<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function traitement() //Connexion
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]); //Vérification des données

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]); //Connexion de l'utilisateur

        if ($resultat) {
            flash('Bienvenuue ! ')->success();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => "L'email et le mot de passe ne correspondent pas"
        ]);
    }
}
