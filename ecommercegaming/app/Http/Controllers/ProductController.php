<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as Product;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function form()
    {
        return view('Products/addProduct');
    }

    public function addProduct(Request $request)
    {

        if ($request->hasFile('file')) {
            $destinationPath = '/public/image/product';
            $image = $request->file('file');
            $imageName = Str::random(10) . "." . $image->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath, $imageName);
            Product::create([
                'name' => request('name'),
                'desc' => request('desc'),
                'price' => request('price'),
                'stock' => request('stock'),
                'img_product' => $path,
            ]);
        }


        flash('Vous avez ajouté un jeu')->success();
        return back();
    }
}
