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
Route::get('/souscription/{id}', [HomeController::class,'souscriptioncheck'])->name('souscriptioncheck');
Route::get('user/souscription/paye', [HomeController::class,'souscriptionpaye'])->name('souscriptionpaye');
Route::get('/user/pack/paye/valide/{id}', [HomeController::class, 'validepack'])->name('validepack');
Route::post('/connexion', [HomeController::class,'loginpagepost'])->name('loginpagepost');
Route::get('/inscription', [HomeController::class,'registerpage'])->name('registerpage');
Route::post('/inscription', [HomeController::class,'registerpagepost'])->name('registerpagepost');
Route::get('/motdepasseoublie', [HomeController::class,'forgetpage'])->name('forgetpage');
Route::get('/logout', [HomeController::class,'logout'])->name('logout');

Route::prefix('customer')->group(function () {
    Route::get('/dashboard', [UserController::class,'customerhome'])->name('customerhome');
    Route::get('/historique/souscription', [UserController::class,'customersouscription'])->name('customersouscription');
    Route::get('/historique/transaction', [UserController::class,'customertransaction'])->name('customertransaction');
    Route::get('/contacts', [UserController::class,'customercontacts'])->name('customercontacts');
    Route::get('/offres', [UserController::class,'customeroffre'])->name('customeroffre');
    Route::get('/profile', [UserController::class,'customerprofile'])->name('customerprofile');

    // Activité Contact
    Route::post('/add/contact', [UserController::class,'customeraddcontact'])->name('customeraddcontact');
    Route::get('/delete/contact/{id}', [UserController::class,'customerdeletecontact'])->name('customerdeletecontact');
    Route::post('/add/contact/excel', [UserController::class,'customeraddcontactexcel'])->name('customeraddcontactexcel');

    // Activité message envoyé
    Route::get('/confirm/delete/envois', [UserController::class,'customerconfirmdeletenvois'])->name('customerconfirmdeletenvois');
    Route::get('/delete/envois', [UserController::class,'customerdeletenvois'])->name('customerdeletenvois');

    // Activité message envoyé
    Route::get('/confirm/delete/souscription', [UserController::class,'customerconfirmdeletsouscription'])->name('customerconfirmdeletsouscription');
    Route::get('/delete/souscription', [UserController::class,'customerdeletsouscription'])->name('customerdeletsouscription');
    // Route::get('confirm/delete/one/souscription', [UserController::class,'customerdeleteconfirmonesouscription'])->name('customerdeleteconfirmonesouscription');
    Route::get('/delete/one/souscription/{code}', [UserController::class,'customerdeleteonesouscription'])->name('customerdeleteonesouscription');


    // Envoi du message
    Route::post('message/send', [UserController::class,'customermessagesend'])->name('customermessagesend');

});

