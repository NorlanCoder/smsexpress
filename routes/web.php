<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'homepage'])->name('home');
Route::get('/connexion', [HomeController::class,'loginpage'])->name('loginpage');
Route::post('/connexion', [HomeController::class,'loginpagepost'])->name('loginpagepost');
Route::get('/inscription', [HomeController::class,'registerpage'])->name('registerpage');
Route::post('/inscription', [HomeController::class,'registerpagepost'])->name('registerpagepost');
Route::get('/motdepasseoublie', [HomeController::class,'forgetpage'])->name('forgetpage');
Route::get('/logout', [HomeController::class,'logout'])->name('logout');

Route::prefix('customer')->group(function () {
    Route::get('/dashboard', [UserController::class,'customerhome'])->name('customerhome');
    Route::get('/historique/souscription', [UserController::class,'customersouscription'])->name('customersouscription');
    Route::get('/historique/transaction', [UserController::class,'customertransaction'])->name('customertransaction');
    Route::get('/offres', [UserController::class,'customeroffre'])->name('customeroffre');
    Route::get('/profile', [UserController::class,'customerprofile'])->name('customerprofile');
});

