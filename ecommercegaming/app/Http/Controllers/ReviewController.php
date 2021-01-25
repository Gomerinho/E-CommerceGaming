<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review as Review;

class ReviewController extends Controller
{
    public function commentPage(Request $request)
    {
        if (auth()->check()) {
            return view('Comments/add_comments', [
                'id' => $request->id,
                'user' => auth()->user()
            ]);
        } else {
            return flash('Vous devez être connecté pour accéder à cette page')->error();
        }
    }

    public function addReview()
    {
        Review::create([
            'comment' => request('comment'),
            'star' => request('star'),
            'user_id' => request('user_id'),
            'product_id' => request('product_id'),
        ]);

        flash('Votre commentaire a été ajouté')->success();
        return back();
    }
}
