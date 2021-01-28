<?php

namespace App\Http\Controllers;

use App;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use PDF;
use App\Models\Vente as Vente;
use App\Models\User as User;
use App\Models\Product as Product;
use Illuminate\Support\Facades\Storage;
use App\Mail\Vente as VenteMail;

class VenteController extends Controller
{
    public function index()
    {

        $ventes = Vente::where('user_id', '=', auth()->user()->id)->get(); //On récupère toutes les ventes correspondant à l'utilisateur
        foreach ($ventes as $vente) {
            $product = $vente->product; //on crée une variable produit qui correspond au produit de la vente
            $user = $vente->user; //on crée une variable user qui correspond a l'user de la vente
        }

        return view('Vente/index', [
            'user' => $user,
            'ventes' => $ventes,
            'product' => $product
        ]); //On renvoie la vue avec toutes les ventes, les produits et l'user
    }

    public function achat()
    {
        //Je commence par défubur notre produit
        $product_id = request('id');
        $product = Product::where('id', '=', $product_id)->first();
        $price = $product->price; //On récupère le prix
        $ventes = Vente::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->first(); //on cherche les ventes correspondante au produit
        if (isset($ventes)) { //Si une vente existe alors l'utilisateur ne peux pas acheter le jeux
            flash('Vous avez déjà acheté le jeu')->error();
            return back();
        }
        if (auth()->user()->wallet > $price && $product->stock > 0) { //On vérifie le stock et l'argent 

            Vente::create([
                'invoice_path' => '/',
                'product_id' => $product->id,
                'user_id' => auth()->user()->id
            ]); //Si tout est bon , on crée une vente

            $stock = $product->stock - 1;
            $product->update([
                'stock' => $stock
            ]);

            $user = auth()->user(); //Initialisation de l'user
            $user->wallet -= $price; //On lui retire le prix du produit
            $user->save();
            auth()->user()->update([
                'wallet' => $user->wallet
            ]);
            $vente = Vente::latest()->first(); //On récupère la dernière vente (celle en cours)
            $path = 'public/invoice/' . auth()->user()->id . '/facture' . $vente->id . '.pdf'; //Création du chemin du fichier pdf
            $vente->update([
                'invoice_path' => $path,
            ]); //On update la colonne vers le chemin du fichier pdf (pour le récupérer dans la page admin)

            $pdf = App::make('dompdf.wrapper'); //Création du pdf

            $content = $pdf->loadView('Mail/vente', [
                'user' => auth()->user(),
                'product' => $product,
                'vente' => $vente
            ])->download()->getOriginalContent(); //Contenu du pdf provient de la vue vente pour le stockage en interne

            $pdfmails = PDF::loadView('Mail/vente', [
                'user' => auth()->user(),
                'product' => $product,
                'vente' => $vente
            ]); //Création du fichier pour l'envoie du mail

            Storage::put($path, $content); //Stockage du fichier

            $messages = new VenteMail(auth()->user(), $product, $vente); //Création de notre message dans le mail
            $messages->attachData($pdfmails->output(), "facture.pdf"); //on attach le fichier au message

            Mail::to(auth()->user()->email)->send($messages); //Envoi du mail

            flash('Votre achat a été effectué, un mail va vous être envoyé')->success(); //Renvoie une alerte de succes
            return redirect('/dashboard');
        } else {
            flash("Vous n'avez pas assez de crédit ou le stock est épuisé! ")->error(); //Si il n'a pas assez d'agent ou le stock est épuisé
            return back();
        }
    }
}
