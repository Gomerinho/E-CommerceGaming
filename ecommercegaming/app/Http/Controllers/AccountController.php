<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class AccountController extends Controller
{
    public function dashboard()
    {

        if (auth()->check()) {
            return view('Users/dashboard', [
                'user' => auth()->user()
            ]);
        } elseif (auth()->guest()) {
            flash('Vous devez être connecté pour accéder a cette page')->error();
            return redirect('/inscription');
        }
    }

    public function signout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function birthdate()
    {
        $user = auth()->user();
        $user->birthdate = request('date');
        $user->save();
        auth()->user()->update([
            'birthdate' => $user->birthdate
        ]);

        flash('Votre date de naissance a été changée.')->success();
        return view('Users/dashboard', [
            'user' => auth()->user(),
        ]);
    }

    public function email_modification()
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

    public function password_modification()
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
