<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();

        return view('Users/utilisateurs', [
            'utilisateurs' => $utilisateurs
        ]);
    }
}
