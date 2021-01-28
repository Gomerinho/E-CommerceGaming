<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class InscriptionController extends Controller
{
    public function verification() //Vérification et création de l'user
    {
        request()->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]); //On vérifie que les données entrées sont bonne et valide les critères requis

        User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'name' => request('name'),
            'birthdate' => request('birthdate'),
        ]); //Création de l'user dans la base de donnée
        flash('success', 'Vous êtes inscrit, connectez vous !');
        return redirect('/inscription');
    }

    public function formulaire() //Affichage du formulaire
    {
        return view('inscription');
    }
}
