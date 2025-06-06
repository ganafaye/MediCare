<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_medecin\dashboard_medecin.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Médecin - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 bg-white sidebar shadow-sm py-3 px-0 offcanvas-md offcanvas-start vh-100" tabindex="-1" id="sidebarMedecin">
            <div class="sidebar-sticky pt-4">
                <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                    <img src="{{ asset('image/logo medecin.png') }}" alt="Logo" style="width: 40px; height:40px;">
                    <h4 class="mb-0 fw-bold" style="color:#fd0d99;">MediCare</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-house-door me-2"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check me-2"></i>
                            Mes rendez-vous
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-lines-fill me-2"></i>
                            Mes patientes
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-folder2-open me-2"></i>
                            Dossiers médicaux
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-file-earmark-plus me-2"></i>
                            Ordonnances
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat-dots me-2"></i>
                            Messagerie
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link text-danger" href="#">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Contenu principal -->
        <div class="col px-0">
            <!-- Bouton menu mobile -->
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMedecin" aria-controls="sidebarMedecin">
                <i class="bi bi-list" style="font-size: 1.8rem;"></i>
            </button>
            <main class="px-3 px-md-5 py-4 ms-md-0">
                <!-- En-tête stylisé -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" style="background: linear-gradient(90deg, #fde6f2 60%, #fff 100%); border-left: 6px solid #fd0d99;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-white shadow" style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-person-circle" style="font-size:2.5rem; color:#fd0d99;"></i>
                        </div>
                        <div>
                            <span class="fw-bold fs-5" style="color:#fd0d99;">
                                Dr. {{ Auth::user()->name ?? 'Médecin' }}
                            </span>
                            <div class="d-flex gap-2 mt-1">
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Spécialité : {{ Auth::user()->specialite ?? '--' }}
                                </span>
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Email : {{ Auth::user()->email ?? '--' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mt-md-0 d-flex align-items-center gap-2">
                        <i class="bi bi-calendar-event" style="color:#fd0d99; font-size:1.4rem;"></i>
                        <span class="fw-semibold" style="color:#fd0d99;">
                            {{ \Carbon\Carbon::now()->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
                        </span>
                    </div>
                </div>

                <!-- Widgets stylisés -->
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-calendar-check mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Rendez-vous du jour</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-pink btn-sm rounded-pill px-4 shadow">Voir mes rendez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-person-lines-fill mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes patientes</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow">Voir mes patientes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-file-earmark-medical mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Consultations</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow">Voir mes consultations</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historique des rendez-vous (exemple) -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Rendez-vous à venir</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Patiente</th>
                                                <th>Motif</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/06/2025</td>
                                                <td>09:00</td>
                                                <td>Fatou Ndiaye</td>
                                                <td>Consultation prénatale</td>
                                                <td><span class="badge bg-success">Confirmé</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                                                </td>
                                            </tr>
                                            <!-- ... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistiques (exemple) -->
                <div class="row mt-5">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4" style="color:#fd0d99;">
                                    <i class="bi bi-bar-chart-steps me-2"></i>
                                    Consultations par mois
                                </h5>
                                <canvas id="consultationsChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4" style="color:#fd0d99;">
                                    <i class="bi bi-pie-chart me-2"></i>
                                    Répartition des motifs
                                </h5>
                                <canvas id="motifsChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<style>
.hover-shadow:hover {
    box-shadow: 0 0 0 4px #fd0d9922, 0 4px 24px #fd0d9933 !important;
    transform: translateY(-2px) scale(1.02);
}
</style>
@vite('resources/js/app.js')
</body>
</html>
