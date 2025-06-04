<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('patiente', function () {
    return "Bienvenue dans l'espace patiente !";
})->name('espace.patiente');

Route::get('admin', function () {
    return "Bienvenue dans l'espace administrateur !";
})->name('espace.admin');

Route::get('medecin', function () {
    return "Bienvenue dans l'espace médecin !";
})->name('espace.medecin');

Route::get('secretaire', function () {
    return "Bienvenue dans l'espace secrétaire !";
})->name('espace.secretaire');


