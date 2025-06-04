<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatienteAuthController;

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

//  Routes pour l'authentification des patientes
Route::post('/login', [PatienteAuthController::class, 'login'])->name('login');

Route::get('/dashboard_patiente', function () {
    return view('espace_patiente.dashboard_patiente');
})->name('dashboard.patiente');

route::get('/inscription_patiente', function () {
    return view('espace_patiente.auth.inscription_patiente');
})->name('inscription.patiente');


