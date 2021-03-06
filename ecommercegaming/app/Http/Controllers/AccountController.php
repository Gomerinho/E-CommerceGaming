<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Product as Product;
use App\Models\Vente as Vente;

class AccountController extends Controller
{
    public function dashboard() //affichage du profil
    {

        $ventes = Vente::where('user_id', '=', auth()->user()->id)->get();
        // if (isset($ventes)) {
        //     foreach ($ventes as $vente) {
        //         $product = $vente->product;
        //     }

        return view('Users/dashboard', [
            'user' => auth()->user(),
            'ventes' => $ventes
        ]);
        // }


        if (auth()->check()) {
        } elseif (auth()->guest()) {
            flash('Vous devez être connecté pour accéder a cette page')->error();
            return redirect('/inscription');
        }
    }

    public function signout() //deconnexion
    {
        auth()->logout();
        flash('Vous êtes déconnecté.')->success();
        return redirect('/inscription');
    }

    public function birthdate() //Changement de la date de naissance
    {
        $user = auth()->user();
        $user->birthdate = request('date');
        $user->save();
        auth()->user()->update([
            'birthdate' => $user->birthdate
        ]);

        flash('Votre date de naissance a été changée.')->success();
        return redirect('/dashboard');
    }

    public function email_modification() //Modification de l'email
    {
        request()->validate([
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $user = auth()->user();
        $user->email = request('email');
        $user->save();

        flash('Votre adresse mail a bien été changée.')->success();
        return view('Users/dashboard', [
            'user' => auth()->user(),
        ]);
    }

    public function password_modification() //Modification du mot de passe
    {
        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $user = auth()->user();

        $user->password = bcrypt(request('password'));
        $user->save();
        // OU
        // auth()->user()->update([
        //     'password' => bcrypt(request('password')),
        // ]);

        flash('Votre mot de passse a bien été modifiié ')->success();
        return redirect('/dashboard');
    }
}
