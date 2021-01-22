<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;
use App\Models\User as User;

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
    return view('welcome');
});

Route::post('/inscription', [InscriptionController::class, 'verification']);

Route::get('/inscription', [InscriptionController::class, 'formulaire']);

Route::get('users', [UsersController::class, 'index']);

Route::post('/connexion', [ConnexionController::class, 'traitement']);
