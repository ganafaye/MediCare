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
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalGestionPatientes">
                            <i class="bi bi-people-fill me-2"></i>
                            Gestion patientes
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalGestionMedecins">
                            <i class="bi bi-person-badge-fill me-2"></i>
                            Gestion médecins
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalGestionSecretaires">
                            <i class="bi bi-person-lines-fill me-2"></i>
                            Gestion secrétaires
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalGestionRendezVous">
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

<!-- Modal Gestion patientes -->
<div class="modal fade" id="modalGestionPatientes" tabindex="-1" aria-labelledby="modalGestionPatientesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalGestionPatientesLabel" style="color:#fd0d99;">
            <i class="bi bi-people-fill me-2"></i> Gestion des patientes
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterPatiente">
                <i class="bi bi-plus-circle me-2"></i>Créer un compte patiente
            </button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Email</th>
                        <th>Téléphone</th>
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
                        <td>fatou.ndiaye@email.com</td>
                        <td>77 123 45 67</td>
                        <td>O+</td>
                        <td>Comptable</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Diop</td>
                        <td>Awa</td>
                        <td>22/07/1988</td>
                        <td>awa.diop@email.com</td>
                        <td>76 234 56 78</td>
                        <td>A-</td>
                        <td>Enseignante</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Créer un compte patiente -->
<div class="modal fade" id="modalAjouterPatiente" tabindex="-1" aria-labelledby="modalAjouterPatienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalAjouterPatienteLabel" style="color:#fd0d99;">
            <i class="bi bi-person-plus me-2"></i>Créer un compte patiente
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
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Groupe sanguin</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" required>
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

<!-- Modal Gestion médecins -->
<div class="modal fade" id="modalGestionMedecins" tabindex="-1" aria-labelledby="modalGestionMedecinsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalGestionMedecinsLabel" style="color:#fd0d99;">
            <i class="bi bi-person-badge-fill me-2"></i> Gestion des médecins
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterMedecin">
                <i class="bi bi-plus-circle me-2"></i>Créer un compte médecin
            </button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Faye Moussa</td>
                        <td>77 111 22 33</td>
                        <td>m.faye@email.com</td>
                        <td>Gynécologue</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Sarr Fatou</td>
                        <td>76 222 33 44</td>
                        <td>f.sarr@email.com</td>
                        <td>Sage-femme</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Créer un compte médecin -->
<div class="modal fade" id="modalAjouterMedecin" tabindex="-1" aria-labelledby="modalAjouterMedecinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalAjouterMedecinLabel" style="color:#fd0d99;">
            <i class="bi bi-person-plus me-2"></i>Créer un compte médecin
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
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Spécialité</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" required>
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

<!-- Modal Gestion secrétaires -->
<div class="modal fade" id="modalGestionSecretaires" tabindex="-1" aria-labelledby="modalGestionSecretairesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalGestionSecretairesLabel" style="color:#fd0d99;">
            <i class="bi bi-person-lines-fill me-2"></i> Gestion des secrétaires
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterSecretaire">
                <i class="bi bi-plus-circle me-2"></i>Créer un compte secrétaire
            </button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ba</td>
                        <td>Astou</td>
                        <td>astou.ba@email.com</td>
                        <td>77 555 66 77</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Diallo</td>
                        <td>Mariama</td>
                        <td>mariama.diallo@email.com</td>
                        <td>76 888 99 00</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Créer un compte secrétaire -->
<div class="modal fade" id="modalAjouterSecretaire" tabindex="-1" aria-labelledby="modalAjouterSecretaireLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalAjouterSecretaireLabel" style="color:#fd0d99;">
            <i class="bi bi-person-plus me-2"></i>Créer un compte secrétaire
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
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" required>
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

<!-- Modal Gestion rendez-vous -->
<div class="modal fade" id="modalGestionRendezVous" tabindex="-1" aria-labelledby="modalGestionRendezVousLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalGestionRendezVousLabel" style="color:#fd0d99;">
            <i class="bi bi-calendar-check-fill me-2"></i> Gestion des rendez-vous
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAjouterRendezVous">
                <i class="bi bi-plus-circle me-2"></i>Créer un rendez-vous
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
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
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
                            <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Créer un rendez-vous -->
<div class="modal fade" id="modalAjouterRendezVous" tabindex="-1" aria-labelledby="modalAjouterRendezVousLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalAjouterRendezVousLabel" style="color:#fd0d99;">
            <i class="bi bi-calendar-plus me-2"></i>Créer un rendez-vous
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
          <div class="mb-3">
            <label class="form-label">Statut</label>
            <select class="form-select" required>
              <option value="confirmé">Confirmé</option>
              <option value="en attente">En attente</option>
              <option value="annulé">Annulé</option>
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

@vite('resources/js/app.js')
</body>
</html>
