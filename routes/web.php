<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatienteAuthController;
use App\Http\Controllers\BotManController;

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

// Routes pour la page dashbord secretaire
Route::get('/dashboard_secretaire', function () {
    return view('espace_secretaire.dashboard_secretaire');
})->name('dashboard.secretaire');

// Routes pour les elements du menu dashbord patiente
Route::get('/mes_rendez_vous', function () {
    return view('espace_patiente.rendezVous');
})->name('patiente.rendezvous');

//route pour les consultations
Route::get('/mes_consultation', function () {
    return view('espace_patiente.mes_consultation');
})->name('patiente.consultations');
//route pour le suivi de la grossesse
Route::get('/suivi_grossesse', function () {
    return view('espace_patiente.suivi_grossesse');
})->name('suivi_grossesse');

// route pour la page mes doc
Route::get('/mes_document', function () {
    return view('espace_patiente.mes_document');

});

// BotMan routes
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::view('/chat', 'chat');

