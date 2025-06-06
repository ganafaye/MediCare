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

// Routes pour la page dashbord admin
Route::get('/dashboard_admin', function () {
    return view('espace_admin.dashboard_admin');
})->name('dashboard.admin');

// Routes pour la page dashbord medecin
Route::get('/dashboard_medecin', function () {
    return view('espace_medecin.dashboard_medecin');
})->name('dashboard.medecin');


