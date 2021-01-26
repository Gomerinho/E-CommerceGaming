<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;
use App\Models\User as User;
use App\Models\Product as Product;
use App\Models\Review as Review;
use Illuminate\Database\Eloquent\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $products = Product::simplePaginate(6);
    $reviews = Review::all();

    return view('welcome', [
        'products' => $products,
        'reviews' => $reviews,
    ]);
});

Route::post('/inscription', [InscriptionController::class, 'verification']);

Route::get('/inscription', [InscriptionController::class, 'formulaire']);

Route::get('users', [UsersController::class, 'index']);

Route::post('/connexion', [ConnexionController::class, 'traitement']);

Route::get('/dashboard', [AccountController::class, 'dashboard']);

Route::get('/signout', [AccountController::class, 'signout']);

Route::post('/email_modification', [AccountController::class, 'email_modification']);

Route::post('/password_modification', [AccountController::class, 'password_modification']);

Route::post('/birthdate', [AccountController::class, 'birthdate']);

Route::get('/addProduct', [ProductController::class, 'form']);

Route::post('/addProduct', [ProductController::class, 'addProduct']);

Route::get('/product/{id}', [ProductController::class, 'productPage']);

Route::get('/comment/{id}', [ReviewController::class, 'commentPage']);

Route::post('/addReview', [ReviewController::class, 'addReview']);

Route::get('/admin', [AdminController::class, 'adminPanel']);

Route::get('/vente', [VenteController::class, 'index']);

Route::post('/vente', [VenteController::class, 'achat']);
