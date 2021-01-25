<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminPanel()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $users = User::all();
        $userscount = User::all()->count();
        $userscount7 = User::where('created_at', '>=', $date)
            ->count();

        if (auth()->check()) {
            if (auth()->user()->is_admin) {
                return view('Admin/adminPanel', [
                    'users' => $users,
                    'userscount' => $userscount,
                    'userscount7' => $userscount7
                ]);
            } else {
                flash('Vous devez être administrateur pour accéder à cette page')->error();
                return redirect('/dashboard');
            }
        } elseif (auth()->guest()) {
            flash('Vous devez être connecté pour accéder a cette page')->error();
            return redirect('/inscription');
        }
    }
}
