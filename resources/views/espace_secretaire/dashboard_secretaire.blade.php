<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_secretaire\dashboard_secretaire.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Secrétaire - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 bg-white sidebar shadow-sm py-3 px-0 offcanvas-md offcanvas-start vh-100 min-vh-100 d-flex flex-column" tabindex="-1" id="sidebarSecretaire">
            <div class="sidebar-sticky pt-4 flex-grow-1 d-flex flex-column">
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
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalRendezVous">
                            <i class="bi bi-calendar-check me-2"></i>
                            Gérer les rendez-vous
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalPatientes">
                            <i class="bi bi-people-fill me-2"></i>
                            Patientes
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                         <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalMedecins">
                            <i class="bi bi-person-badge me-2"></i>
                            Médecins
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bell me-2"></i>
                            Notifications
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                      <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalFactures">
                       <i class="bi bi-receipt me-2"></i>
                              Factures
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
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarSecretaire" aria-controls="sidebarSecretaire">
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
                                {{ Auth::user()->name ?? 'Secrétaire' }}
                            </span>
                            <div class="d-flex gap-2 mt-1">
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
                                <a href="#" class="btn btn-pink btn-sm rounded-pill px-4 shadow">Voir les rendez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-people-fill mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Patientes</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow">Voir les patientes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-person-badge mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Médecins</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow">Voir les médecins</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau des rendez-vous du jour (exemple) -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Rendez-vous du jour</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Heure</th>
                                                <th>Patiente</th>
                                                <th>Médecin</th>
                                                <th>Motif</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>09:00</td>
                                                <td>Fatou Ndiaye</td>
                                                <td>Dr. Faye</td>
                                                <td>Consultation prénatale</td>
                                                <td><span class="badge bg-success">Confirmé</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-sm btn-outline-success rounded-pill"><i class="bi bi-pencil"></i></button>
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

                <!-- Graphiques d'activité -->
                <div class="row mt-5">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4" style="color:#fd0d99;">
                                    <i class="bi bi-bar-chart-steps me-2"></i>
                                    Rendez-vous par mois
                                </h5>
                                <canvas id="rdvChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4" style="color:#fd0d99;">
                                    <i class="bi bi-pie-chart me-2"></i>
                                    Statut des rendez-vous
                                </h5>
                                <canvas id="statutChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Factures -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 rounded-top-4 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Factures récentes</h5>
                                <a href="#" class="btn btn-pink btn-sm rounded-pill"><i class="bi bi-plus-lg me-1"></i>Nouvelle facture</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Patiente</th>
                                                <th>Montant</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10/06/2025</td>
                                                <td>Fatou Ndiaye</td>
                                                <td>25 000 FCFA</td>
                                                <td><span class="badge bg-success">Payée</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-sm btn-outline-success rounded-pill"><i class="bi bi-pencil"></i></button>
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

                <!-- Section Rendez-vous (avec bouton création) -->
                <div class="row mt-5" id="section-rendezvous">
                    <div class="col-12">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 rounded-top-4 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Gérer les rendez-vous</h5>
                                <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalNouveauRdv">
                                    <i class="bi bi-plus-circle me-2"></i>Nouveau rendez-vous
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Patiente</th>
                                                <th>Médecin</th>
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
                                                <td>Dr. Faye</td>
                                                <td>Consultation prénatale</td>
                                                <td><span class="badge bg-success">Confirmé</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>13/06/2025</td>
                                                <td>11:30</td>
                                                <td>Awa Diop</td>
                                                <td>Dr. Sarr</td>
                                                <td>Suivi postnatal</td>
                                                <td><span class="badge bg-secondary">En attente</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Gérer les rendez-vous -->
                <div class="modal fade" id="modalRendezVous" tabindex="-1" aria-labelledby="modalRendezVousLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalRendezVousLabel" style="color:#fd0d99;">
                            <i class="bi bi-calendar-check me-2"></i> Gérer les rendez-vous
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-4 text-end">
                            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalNouveauRdv">
                                <i class="bi bi-plus-circle me-2"></i>Nouveau rendez-vous
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Patiente</th>
                                        <th>Médecin</th>
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
                                        <td>Dr. Faye</td>
                                        <td>Consultation prénatale</td>
                                        <td><span class="badge bg-success">Confirmé</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13/06/2025</td>
                                        <td>11:30</td>
                                        <td>Awa Diop</td>
                                        <td>Dr. Sarr</td>
                                        <td>Suivi postnatal</td>
                                        <td><span class="badge bg-secondary">En attente</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Nouveau Rendez-vous -->
                <div class="modal fade" id="modalNouveauRdv" tabindex="-1" aria-labelledby="modalNouveauRdvLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalNouveauRdvLabel" style="color:#fd0d99;">
                            <i class="bi bi-calendar-plus me-2"></i>Nouveau rendez-vous
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label class="form-label">Patiente</label>
                            <select class="form-select" required>
                              <option selected disabled>Choisir une patiente</option>
                              <option>Fatou Ndiaye</option>
                              <option>Awa Diop</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Médecin</label>
                            <select class="form-select" required>
                              <option selected disabled>Choisir un médecin</option>
                              <option>Dr. Faye</option>
                              <option>Dr. Sarr</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Heure</label>
                            <input type="time" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Motif</label>
                            <input type="text" class="form-control" placeholder="Motif du rendez-vous" required>
                          </div>
                          <div class="text-end">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-pink rounded-pill ms-2">Créer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Patientes -->
                <div class="modal fade" id="modalPatientes" tabindex="-1" aria-labelledby="modalPatientesLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalPatientesLabel" style="color:#fd0d99;">
                            <i class="bi bi-people-fill me-2"></i> Liste des patientes
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-4 text-end">
                            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterPatiente">
                                <i class="bi bi-plus-circle me-2"></i>Ajouter une patiente
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Groupe sanguin</th>
                                        <th>Profession</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ndiaye</td>
                                        <td>Fatou</td>
                                        <td>15/03/1992</td>
                                        <td>77 123 45 67</td>
                                        <td>fatou.ndiaye@email.com</td>
                                        <td>O+</td>
                                        <td>Comptable</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Diop</td>
                                        <td>Awa</td>
                                        <td>22/07/1988</td>
                                        <td>76 234 56 78</td>
                                        <td>awa.diop@email.com</td>
                                        <td>A-</td>
                                        <td>Enseignante</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sarr</td>
                                        <td>Marie</td>
                                        <td>09/11/1995</td>
                                        <td>78 345 67 89</td>
                                        <td>marie.sarr@email.com</td>
                                        <td>B+</td>
                                        <td>Infirmière</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Ajouter une patiente -->
                <div class="modal fade" id="modalAjouterPatiente" tabindex="-1" aria-labelledby="modalAjouterPatienteLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalAjouterPatienteLabel" style="color:#fd0d99;">
                            <i class="bi bi-person-plus me-2"></i>Ajouter une patiente
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="text" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Groupe sanguin</label>
                            <input type="text" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Profession</label>
                            <input type="text" class="form-control" required>
                          </div>
                          <div class="text-end">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-pink rounded-pill ms-2">Ajouter</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Médecins -->
                <div class="modal fade" id="modalMedecins" tabindex="-1" aria-labelledby="modalMedecinsLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalMedecinsLabel" style="color:#fd0d99;">
                            <i class="bi bi-person-badge me-2"></i> Liste des médecins
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Spécialité</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Faye</td>
                                        <td>Moussa</td>
                                        <td>Gynécologue</td>
                                        <td>77 111 22 33</td>
                                        <td>m.faye@email.com</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sarr</td>
                                        <td>Fatou</td>
                                        <td>Sage-femme</td>
                                        <td>76 222 33 44</td>
                                        <td>f.sarr@email.com</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Factures -->
                <div class="modal fade" id="modalFactures" tabindex="-1" aria-labelledby="modalFacturesLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalFacturesLabel" style="color:#fd0d99;">
                            <i class="bi bi-receipt me-2"></i> Liste des factures
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-4 text-end">
                            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterFacture">
                                <i class="bi bi-plus-circle me-2"></i>Nouvelle facture
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Patiente</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/06/2025</td>
                                        <td>Fatou Ndiaye</td>
                                        <td>25 000 FCFA</td>
                                        <td><span class="badge bg-success">Payée</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>09/06/2025</td>
                                        <td>Awa Diop</td>
                                        <td>18 000 FCFA</td>
                                        <td><span class="badge bg-warning text-dark">En attente</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Nouvelle facture -->
                <div class="modal fade" id="modalAjouterFacture" tabindex="-1" aria-labelledby="modalAjouterFactureLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="modalAjouterFactureLabel" style="color:#fd0d99;">
                            <i class="bi bi-receipt me-2"></i>Nouvelle facture
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label class="form-label">Patiente</label>
                            <select class="form-select" required>
                              <option selected disabled>Choisir une patiente</option>
                              <option>Fatou Ndiaye</option>
                              <option>Awa Diop</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <input type="number" class="form-control" placeholder="Montant en FCFA" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Statut</label>
                            <select class="form-select" required>
                              <option value="payée">Payée</option>
                              <option value="en attente">En attente</option>
                            </select>
                          </div>
                          <div class="text-end">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-pink rounded-pill ms-2">Créer</button>
                          </div>
                        </form>
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
