<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as Product;
use App\Models\Review as Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function form() //Affichage du formulaire
    {
        if (auth()->user()->is_admin) { //Uniquement pour les admins connectés
            return view('Products/addProduct');
        }
    }

    public function addProduct(Request $request) //Ajouter un jeu
    {

        if ($request->hasFile('file')) {
            $destinationPath = '/public/image/product'; //Destination de l'image du jeu
            $image = $request->file('file'); //On récupère l'image
            $imageName = Str::random(10) . "." . $image->getClientOriginalExtension(); //Création d'un nom aléatoire
            $path = $request->file('file')->storeAs($destinationPath, $imageName); //Stockage de l'image
            Product::create([
                'name' => request('name'),
                'desc' => request('desc'),
                'price' => request('price'),
                'stock' => request('stock'),
                'activation_code' => request('activation_code'),
                'img_product' => $imageName,
            ]); //Création du produit
            flash('Vous avez ajouté un jeu')->success();
            return redirect('/admin/product');
        }

        flash("Vous n'avez pas renseigner tout les champs")->error();
        return back();
    }

    public function productPage(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $reviews = DB::table('reviews')
            ->where('product_id', request('id'))
            ->join('users', 'user_id', '=', 'users.id')
            ->select('reviews.*', 'users.name')
            ->get(); //On récupère les reviews qui correspondent au Jeu afficher


        foreach ($product as $products) { //Ce for each permet de créer une moyenne de la note
            $rate = DB::table('reviews')
                ->where('product_id', request('id'))
                ->avg('star');

            $rate = round($rate, 1);  //Round permet d'arround à 1 décimal
        }

        return view('Products/product', [
            'id' => $product->id,
            'product' => $product,
            'review' => $reviews,
            'rate' => $rate
        ]); //Retourne la vue avec toutes les données
    }

    public function search()
    {
        $search = request('search');
        if ($search != "") {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
            if ($products != null) {
                return view('Products/search', [
                    'products' => $products
                ]);
            } else {
                flash('Aucun jeu correspondant')->error();
                return redirect('/');
            }
        } else {
            return back();
        }
    }
}
