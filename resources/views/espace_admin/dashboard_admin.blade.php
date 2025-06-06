<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_admin\dashboard_admin.blade.php -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin - MediCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 bg-white sidebar shadow-sm py-3 px-0">
            <div class="sidebar-sticky pt-4">
                <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                    <img src="{{ asset('image/logo medecin.png') }}" alt="Logo" style="width: 40px; height:40px;">
                    <h4 class="mb-0 fw-bold" style="color:#fd0d99;">MediCare</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people-fill me-2"></i>
                            Gestion patientes
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-badge-fill me-2"></i>
                            Gestion médecins
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-lines-fill me-2"></i>
                            Gestion secrétaires
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check-fill me-2"></i>
                            Rendez-vous
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
        <main class="col px-3 px-md-5 py-4 ms-md-0">
            <!-- Bouton menu mobile -->
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarAdmin" aria-controls="sidebarAdmin">
                <i class="bi bi-list" style="font-size: 1.8rem;"></i>
            </button>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-3 mb-md-0" style="color:#fd0d99;">Bienvenue sur le Dashboard Administrateur</h2>
                <p class="mb-0 px-3 py-2 rounded-pill shadow-sm d-flex align-items-center"
                   style="background:#fde6f2; color:#fd0d99; font-weight:500; font-size:1.05rem;">
                    <i class="bi bi-calendar-event me-2" style="font-size:1.3rem; color:#fd0d99;"></i>
                    {{ \Carbon\Carbon::now()->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
                </p>
            </div>
            <div class="row">
                <!-- Widgets statistiques -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill" style="font-size:2rem; color:#fd0d99;"></i>
                            <h5 class="mt-2">Nombre de patientes</h5>
                            <p class="fw-bold fs-4">--</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-person-badge-fill" style="font-size:2rem; color:#fd0d99;"></i>
                            <h5 class="mt-2">Nombre de médecins</h5>
                            <p class="fw-bold fs-4">--</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-check-fill" style="font-size:2rem; color:#fd0d99;"></i>
                            <h5 class="mt-2">Rendez-vous aujourd'hui</h5>
                            <p class="fw-bold fs-4">--</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Graphiques statistiques -->
            <div class="row mt-4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="color:#fd0d99;">
                                <i class="bi bi-bar-chart-fill me-2"></i>
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
                                <i class="bi bi-graph-up-arrow me-2"></i>
                                Rendez-vous par mois
                            </h5>
                            <canvas id="rendezvousChart" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="color:#fd0d99;">
                                <i class="bi bi-pie-chart-fill me-2"></i>
                                Répartition patientes par âge
                            </h5>
                            <canvas id="ageChart" height="180"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="color:#fd0d99;">
                                <i class="bi bi-bar-chart-steps me-2"></i>
                                Consultations par médecin
                            </h5>
                            <canvas id="medecinsChart" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="color:#fd0d99;">
                                <i class="bi bi-pie-chart me-2"></i>
                                Taux rendez-vous honorés/annulés
                            </h5>
                            <canvas id="tauxChart" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@vite('resources/js/app.js')
</body>
</html>
