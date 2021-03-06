<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Product as Product;
use App\Models\Vente as Vente;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminPanel()
    {
        $date = \Carbon\Carbon::today()->subDays(7); //Permet de récupérer les 7 derniers jours
        $users = User::all();
        $userscount = User::all()->count(); //Compte tout les utilisateurs du site
        $userscount7 = User::where('created_at', '>=', $date)
            ->count(); //Les utilisateurs inscrit dans les 7 derniers jours

        $ventes = Vente::All(); //On récupère toutes les ventes effectué

        if (auth()->check()) { //Vérification que l'utilisateur est connecté
            if (auth()->user()->is_admin) { //Vérification que l'utilisateur est administrateur
                return view('Admin/adminPanel', [
                    'users' => $users,
                    'userscount' => $userscount,
                    'userscount7' => $userscount7,
                    'ventes' => $ventes
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

    public function modifyUserForm()
    {
        $user = User::where('id', '=', request('id'))->first(); //ON récupère l'utilisateur qui correspond
        $ventes = Vente::where('user_id', '=', request('id'))->get();
        if (auth()->user()->is_admin) {
            return view('Admin/modifyUser', [
                'user' => $user,
                'ventes' => $ventes
            ]);
        }
    }

    public function modifyUser()
    {
        $users = User::all();
        $user = User::where('id', '=', request('id'))->first();

        if ($user->email == request('email')) {
            request()->validate([
                'name' => ['required'],
                'email' => ['required'],
                'birthdate' => ['required'],
                'wallet' => ['required'],
                'is_admin' => ['required'],
            ]);
        } else {
            request()->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users'],
                'birthdate' => ['required'],
                'wallet' => ['required'],
                'is_admin' => ['required'],
            ]);
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'birthdate' => request('birthdate'),
            'wallet' => request('wallet'),
            'is_admin' => request('is_admin'),
        ]);

        flash("Vous avez modifier l'utilisateur : " . $user->name . ".")->success();
        return redirect('/admin');
    }

    public function productIndex()
    {
        $products = Product::All();
        $user = Product::where('id', '=', request('id'))->first();
        $productcount = $products->count();
        if (auth()->user()->is_admin) {
            return view('Admin/adminProduct', [
                'products' => $products,
                'productcount' => $productcount

            ]);
        }
    }

    public function modifyProductForm()
    {
        $product = Product::where('id', '=', request('id'))->first();
        if (auth()->user()->is_admin) {
            return view('Admin/modifyProduct', [
                'product' => $product
            ]);
        }
    }

    public function modifyProduct(Request $request)
    {
        $products = Product::all();
        $product = Product::where('id', '=', request('id'))->first();

        request()->validate([
            'name' => ['required'],
            'desc' => ['required',],
            'stock' => ['required'],
            'price' => ['required'],
            'activation_code' => ['required'],
        ]);

        if (null !== request('file')) { //Permet de vérifier si on change l'image ou non
            $destinationPath = '/public/image/product';
            $imageName = request('img_product');
            $request->file('file')->storeAs($destinationPath, $imageName);
            $product->update([
                'img_product' => $imageName,
                'name' => request('name'),
                'desc' => request('desc'),
                'stock' => request('stock'),
                'price' => request('price'),
                'activation_code' => request('activation_code'),

            ]);
        } else {
            $product->update([
                'name' => request('name'),
                'desc' => request('desc'),
                'stock' => request('stock'),
                'price' => request('price'),
                'activation_code' => request('activation_code'),

            ]);
        }


        flash("Vous avez modifier le jeu : " . $product->name . ".")->success();
        return redirect('/admin/product');
    }
}
