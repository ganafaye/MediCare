<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatienteAuthController;
use App\Http\Controllers\Auth\PatienteRegisterController;
use App\Http\Controllers\Auth\SecretaireAuthController;
use App\Http\Controllers\BotManController;
use Illuminate\Http\Request;
use App\Models\Patiente;
use App\Http\Controllers\DashboardPatienteController;
use App\Http\Controllers\Auth\MedecinAuthController;
use App\Http\Controllers\DashboardMedecinController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Admin\PatienteAdminController;
use App\Http\Controllers\Admin\MedecinAdminController;
use App\Http\Controllers\Admin\SecretaireAdminController;
use App\Http\Controllers\DashboardSecretaireController;
use App\Http\Controllers\RendezVousController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DossierMedicalController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FactureController;
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


// route pour proteger l'espace patiente
Route::get('/dashboard_patiente', [DashboardPatienteController::class, 'index'])
    ->name('dashboard.patiente')
    ->middleware('auth:patiente');

// route pour proteger l'espace medecin
Route::get('/dashboard_medecin', [DashboardMedecinController::class, 'index'])
    ->name('dashboard.medecin')
    ->middleware('auth:medecin');

route::get('/inscription_patiente', function () {
    return view('espace_patiente.auth.inscription_patiente');
})->name('inscription.patiente');

Route::get('/login', function () {
    return view('welcome'); // ou la vue de ton formulaire de connexion
})->name('login');
// Route pour l'inscription des patientes
Route::post('/patiente/register', [PatienteRegisterController::class, 'register'])->name('patiente.register');

// Routes pour la page dashbord admin
Route::get('/dashboard_admin', function () {
    return view('espace_admin.dashboard_admin');
})->name('dashboard.admin');

// Routes pour la page dashbord medecin
Route::post('/login_medecin', [MedecinAuthController::class, 'login'])->name('login.medecin');

Route::get('/dashboard_medecin', [DashboardMedecinController::class, 'index'])
    ->name('dashboard.medecin')
    ->middleware('auth:medecin');

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


// route pour la page mes doc
Route::get('/mes_document', function () {
    return view('espace_patiente.mes_document');

});

// BotMan routes
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::view('/chat', 'chat');

Route::get('/check-email-patiente', function(Request $request){
    $exists = Patiente::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});

// Routes pour l'authentification des administrateurs

Route::post('/login_admin', [AdminAuthController::class, 'login'])->name('login.admin');

Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])
    ->name('dashboard.admin')
    ->middleware('auth:admin');

// Admin routes pour la gestion des patientes par l'administrateur
Route::post('/admin/patientes', [PatienteAdminController::class, 'store'])
    ->name('admin.patiente.store')
    ->middleware('auth:admin');

Route::put('/admin/patientes/{id}', [PatienteAdminController::class, 'update'])->name('admin.patiente.update');

Route::delete('/admin/patientes/{id}', [PatienteAdminController::class, 'destroy'])->name('admin.patiente.destroy');

Route::get('/admin/patientes/{id}/edit', [PatienteAdminController::class, 'edit'])
    ->name('admin.patiente.edit')
    ->middleware('auth:admin');

Route::get('/admin/patientes/{id}', [PatienteAdminController::class, 'show'])
    ->name('admin.patiente.show')
    ->middleware('auth:admin');

// Route pour la gestion des medecins par l'administrateur
Route::post('/admin/medecins', [MedecinAdminController::class, 'store'])->name('admin.medecin.store')->middleware('auth:admin');
Route::put('/admin/medecins/{id}', [MedecinAdminController::class, 'update'])->name('admin.medecin.update')->middleware('auth:admin');
Route::delete('/admin/medecins/{id}', [MedecinAdminController::class, 'destroy'])->name('admin.medecin.destroy')->middleware('auth:admin');

//Route pour la gestion du secretaire par l'admin
Route::post('/admin/secretaire', [SecretaireAdminController::class, 'store'])->name('admin.secretaire.store')->middleware('auth:admin');
Route::put('/admin/secretaire/{id}', [SecretaireAdminController::class, 'update'])->name('admin.secretaire.update')->middleware('auth:admin');
Route::delete('/admin/secretaire/{id}', [SecretaireAdminController::class, 'destroy'])->name('admin.secretaire.destroy')->middleware('auth:admin');

// Route connexion pour la secrétaire
Route::post('/login_secretaire', [SecretaireAuthController::class, 'login'])->name('login.secretaire');

Route::get('/dashboard_secretaire', [DashboardSecretaireController::class, 'index'])
    ->name('dashboard.secretaire')
    ->middleware('auth:secretaire');

Route::post('/logout_secretaire', [SecretaireAuthController::class, 'logout'])->name('logout.secretaire');

// Route pour ajout patiente de la part du secretaire
use App\Http\Controllers\SecretairePatienteController;

Route::post('/secretaire/patiente/store', [SecretairePatienteController::class, 'store'])
    ->name('secretaire.patiente.store')
    ->middleware('auth:secretaire');

Route::put('/secretaire/patiente/{id}', [SecretairePatienteController::class, 'update'])
    ->name('secretaire.patiente.update')
    ->middleware('auth:secretaire');

Route::delete('/secretaire/patiente/{id}', [SecretairePatienteController::class, 'destroy'])
    ->name('secretaire.patiente.destroy')
    ->middleware('auth:secretaire');

// 📅 Création d'un rendez-vous (Patiente ou Secrétaire)
Route::post('/rendezvous/store', [RendezVousController::class, 'store'])
    ->name('rendezvous.store')
    ->middleware('auth:patiente,secretaire');

// ✅ Afficher les rendez-vous selon le rôle
Route::get('/rendezvous', [RendezVousController::class, 'index'])
    ->name('rendezvous.index')
    ->middleware('auth');

// 🏥 Confirmation d'un rendez-vous (Médecin uniquement)
Route::put('/rendezvous/confirm/{id}', [RendezVousController::class, 'confirm'])
    ->name('rendezvous.confirm')
    ->middleware('auth:medecin');
// route pour la mise à jour d'un rendez-vous (Secrétaire uniquement)
    Route::put('/rendezvous/update/{id}', [RendezVousController::class, 'update'])
    ->name('rendezvous.update')
    ->middleware('auth:secretaire');

// ❌ Annulation d'un rendez-vous (Secrétaire uniquement)
Route::put('/rendezvous/cancel/{id}', [RendezVousController::class, 'cancel'])
    ->name('rendezvous.cancel')
    ->middleware('auth:secretaire');

// ❌ Annulation d'un rendez-vous (patiente)

Route::put('/rendezvous/cancel/patient/{id}', [RendezVousController::class, 'cancelByPatiente'])
    ->name('rendezvous.cancel.patiente')
    ->middleware('auth:patiente');

// ❌ Annulation d'un rendez-vous (Médecin uniquement)
Route::put('/rendezvous/cancel/medecin/{id}', [RendezVousController::class, 'cancelByMedecin'])
    ->name('rendezvous.cancel.medecin')
    ->middleware('auth:medecin');

// Gestion rendez vous par l'administrateur
Route::delete('/rendezvous/admin/delete/{id}', [RendezVousController::class, 'deleteByAdmin'])
    ->name('rendezvous.admin.delete')
    ->middleware('auth:admin');

Route::put('/rendezvous/admin/update/{id}', [RendezVousController::class, 'updateByAdmin'])
    ->name('rendezvous.admin.update')
    ->middleware('auth:admin');
// Route pour la creation d'un rendez-vous par l'administrateur
Route::post('/rendezvous/admin/store', [RendezVousController::class, 'storeByAdmin'])
    ->name('rendezvous.admin.store')
    ->middleware('auth:admin');
// Deconnexion des users  : administrateur, secretaire, medecin et patiente
Route::post('/logout', function () {
    foreach (['admin', 'medecin', 'secretaire', 'patiente'] as $guard) {
        if (Auth::guard($guard)->check()) {
            Auth::guard($guard)->logout();
        }
    }

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');



// route pour la création d'un dossier médical
Route::post('/dossiers/creer', [DossierMedicalController::class, 'creerDossier'])->name('dossier.creer');
Route::get('/dossiers/{patienteId}', [DossierMedicalController::class, 'voirDossier'])->name('dossier.voir');
Route::put('/dossiers/{id}', [DossierMedicalController::class, 'update'])->name('dossier.update');
Route::delete('/dossiers/{id}', [DossierMedicalController::class, 'delete'])->name('dossier.delete');

// Route pour la création d'une ordonnance
Route::post('/ordonnances/store', [OrdonnanceController::class, 'store'])->name('ordonnance.store');
Route::put('/ordonnances/update/{id}', [OrdonnanceController::class, 'update'])->name('ordonnance.update');
Route::get('/ordonnances/download/{id}', [OrdonnanceController::class, 'download'])->name('ordonnance.download');

// 📌 Routes pour la gestion des consultations
Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('consultation.store');
Route::put('/consultations/update/{id}', [ConsultationController::class, 'update'])->name('consultation.update');
Route::delete('/consultations/delete/{id}', [ConsultationController::class, 'destroy'])->name('consultation.destroy');
Route::get('/consultations/download/{id}', [ConsultationController::class, 'download'])->name('consultation.download');


// 📌 Routes pour la gestion des factures
Route::get('/factures', [FactureController::class, 'index'])->name('facture.index');
Route::post('/factures/store', [FactureController::class, 'store'])->name('facture.store');
Route::put('/factures/update/{id}', [FactureController::class, 'update'])->name('facture.update');
Route::get('/factures/download/{id}', [FactureController::class, 'download'])->name('facture.download');
Route::delete('/factures/destroy/{id}', [FactureController::class, 'destroy'])->name('facture.destroy');



// Route pour la creation d'une grossesse de la part du medecin
use App\Http\Controllers\GrossesseController;

Route::middleware(['auth:medecin'])->prefix('medecin')->group(function () {

    // 🗂 Affichage du tableau principal des grossesses
    Route::get('/grossesses', [GrossesseController::class, 'index'])->name('grossesses.index');

    // 📝 Création d’une nouvelle grossesse
    Route::post('/grossesses', [GrossesseController::class, 'store'])->name('grossesses.store');

    // ✏️ Mise à jour d’une grossesse existante
    Route::put('/grossesses/{grossesse}', [GrossesseController::class, 'update'])->name('grossesses.update');

    // ❌ Suppression d’une grossesse
    Route::delete('/grossesses/{grossesse}', [GrossesseController::class, 'destroy'])->name('grossesses.destroy');

});

//route  pour les echographies du medecin
use App\Http\Controllers\EchographieController;

Route::prefix('echographies')->group(function () {
    // Créer une échographie liée à une grossesse
    Route::post('/', [EchographieController::class, 'store'])->name('echographies.store');

    // Supprimer une échographie (si tu as un bouton "Supprimer")
    Route::delete('/{echographie}', [EchographieController::class, 'destroy'])->name('echographies.destroy');

    // (Optionnel) Voir le détail d'une échographie
    Route::get('/{echographie}', [EchographieController::class, 'show'])->name('echographies.show');
});

//Route suivi grossesse patiente
use App\Http\Controllers\SuiviGrossesseController;

Route::middleware(['auth:patiente'])->group(function () {
    Route::get('/suivi_grossesse', [SuiviGrossesseController::class, 'index'])
         ->name('suivi.patiente');
});

// route pour admin modifier son compte
Route::post('/modifier_profil_admin', [AdminAuthController::class, 'update'])
    ->name('admin.profil.update')
    ->middleware('auth:admin');


//Route pour le formulaire de contact
use App\Http\Controllers\ContactController;

// 🔹 Envoi du formulaire de contact (page d’accueil)
Route::post('/contact', [ContactController::class, 'envoyer'])->name('contact.envoyer');

// 🔹 Dashboard admin (protégé par auth:admin)
Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])
    ->name('dashboard.admin')
    ->middleware('auth:admin');

// 🔹 Affichage des messages dans le dashboard admin
Route::get('/admin/messages', [AdminAuthController::class, 'afficherMessages'])
    ->name('admin.messages')
    ->middleware('auth:admin');

// 🔹 Suppression d’un message
Route::delete('/admin/messages/{id}', [AdminAuthController::class, 'supprimerMessage'])
    ->name('admin.messages.supprimer')
    ->middleware('auth:admin');


// Route pour publier message par l'admin
use App\Models\Message;

Route::post('/admin/messages/{id}/temoignage', function ($id) {
    $message = Message::findOrFail($id);
    $message->temoignage = true;
    $message->save();

    return response()->json(['success' => true, 'message' => $message]);
})->name('admin.messages.temoignage');
