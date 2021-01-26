<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Vente as Vente;
use App\Models\User as User;
use App\Models\Product as Product;
use App\Mail\Vente as VenteMail;

class VenteController extends Controller
{
    public function index()
    {

        $ventes = Vente::where('user_id', '=', auth()->user()->id)->get();
        foreach ($ventes as $vente) {
            $product = $vente->product;
            $user = $vente->user;
        }

        // $product = Product::where('id', '=', $vente->id);
        return view('Vente/index', [
            'user' => $user,
            'ventes' => $ventes,
            'product' => $product
        ]);
    }

    public function achat()
    {
        $product_id = request('id');
        $product = Product::where('id', '=', $product_id)->first();
        $price = $product->price;
        $ventes = Vente::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->first();
        if (isset($ventes)) {
            flash('Vous avez déjà acheté le jeu')->error();
            return back();
        }
        if (auth()->user()->wallet > $price) {
            Vente::create([
                'invoice_path' => 'Vente/invoice/',
                'product_id' => $product->id,
                'user_id' => auth()->user()->id
            ]);

            $user = auth()->user();
            $user->wallet -= $price;
            $user->save();
            auth()->user()->update([
                'wallet' => $user->wallet
            ]);

            $vente = Vente::latest()->first();

            Mail::to(auth()->user()->email)->send(new VenteMail(auth()->user(), $product, $vente));

            flash('Votre achat a été effectué, un mail va vous être envoyé')->success();
            return redirect('/dashboard');
        } else {
            flash("Vous n'avez pas assez de crédit ! ")->error();
            return back();
        }
    }
}
