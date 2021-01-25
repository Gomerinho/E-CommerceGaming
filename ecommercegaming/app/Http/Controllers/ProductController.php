<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as Product;
use App\Models\Review as Review;
use Illuminate\Support\Facades\DB;
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
                'img_product' => $imageName,
            ]);
        }


        flash('Vous avez ajouté un jeu')->success();
        return back();
    }

    public function productPage(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $reviews = DB::table('reviews')
            ->where('product_id', request('id'))
            ->join('users', 'user_id', '=', 'users.id')
            ->select('reviews.*', 'users.*')
            ->get();

        return view('Products/product', [
            'id' => $product->id,
            'product' => $product,
            'review' => $reviews
        ]);
    }
}
