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
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif
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
    @forelse($patientes as $patiente)
        <tr>
            <td>{{ $patiente->nom }}</td>
            <td>{{ $patiente->prenom }}</td>
            <td>{{ $patiente->date_naissance }}</td>
            <td>{{ $patiente->email }}</td>
            <td>{{ $patiente->telephone }}</td>
            <td>{{ $patiente->groupe_sanguin }}</td>
            <td>{{ $patiente->profession }}</td>
            <td>
               <button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalVoirPatiente{{ $patiente->id }}" title="Voir"><i class="bi bi-eye"></i></button>
                <button class="btn btn-sm btn-outline-success rounded-pill" data-bs-toggle="modal" data-bs-target="#modalEditPatiente{{ $patiente->id }}" title="Modifier"> <i class="bi bi-pencil"></i></button>
           <form method="POST" action="{{ route('admin.patiente.destroy', $patiente->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer" onclick="return confirm('Supprimer cette patiente ?')"><i class="bi bi-trash"></i></button>
            </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">Aucune patiente trouvée.</td>
        </tr>
    @endforelse
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
       <form method="POST" action="{{ route('admin.patiente.store') }}">
         @csrf
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Date de naissance</label>
            <input type="date" class="form-control" name="date_naissance" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="telephone" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Groupe sanguin</label>
            <input type="text" class="form-control" name="groupe_sanguin" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <input type="text" class="form-control" name="profession" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" required>
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
                        <th>Prenom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medecins as $medecin)
<tr>
    <td>{{ $medecin->nom }}</td>
    <td>{{ $medecin->prenom }}</td>
    <td>{{ $medecin->telephone }}</td>
    <td>{{ $medecin->email }}</td>
    <td>{{ $medecin->specialite }}</td>
    <td>
        <!-- Bouton Voir -->
        <button class="btn btn-sm btn-outline-primary rounded-pill"
                data-bs-toggle="modal"
                data-bs-target="#modalVoirMedecin{{ $medecin->id }}"
                title="Voir">
            <i class="bi bi-eye"></i>
        </button>
        <!-- Bouton Modifier -->
        <button class="btn btn-sm btn-outline-success rounded-pill"
                data-bs-toggle="modal"
                data-bs-target="#modalEditMedecin{{ $medecin->id }}"
                title="Modifier">
            <i class="bi bi-pencil"></i>
        </button>
        <!-- Bouton Supprimer -->
        <form method="POST" action="{{ route('admin.medecin.destroy', $medecin->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer" onclick="return confirm('Supprimer ce médecin ?')">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">Aucun médecin trouvé.</td>
</tr>
@endforelse
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
        <form action="{{ route('admin.medecin.store') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" class="form-control" name="prenom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="telephone" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Spécialité</label>
            <input type="text" class="form-control" name="specialite" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" required>
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
                    @forelse($secretaires as $secretaire)
                    <tr>
                        <td>{{ $secretaire->nom }}</td>
                        <td>{{ $secretaire->prenom }}</td>
                        <td>{{ $secretaire->telephone }}</td>
                        <td>{{ $secretaire->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalVoirSecretaire{{ $secretaire->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditSecretaire{{ $secretaire->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form method="POST" action="{{ route('admin.secretaire.destroy', $secretaire->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Supprimer ce secrétaire ?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun secrétaire trouvé.</td>
                    </tr>
                    @endforelse
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
         <form action="{{ route('admin.secretaire.store') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="telephone" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" required>
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
<!-- Modals pour voir les détails des patientes-->
@foreach($patientes as $patiente)
<div class="modal fade" id="modalVoirPatiente{{ $patiente->id }}" tabindex="-1" aria-labelledby="modalVoirPatienteLabel{{ $patiente->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVoirPatienteLabel{{ $patiente->id }}">Détails de la patiente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ $patiente->nom }}</p>
        <p><strong>Prénom :</strong> {{ $patiente->prenom }}</p>
        <p><strong>Date de naissance :</strong> {{ $patiente->date_naissance }}</p>
        <p><strong>Email :</strong> {{ $patiente->email }}</p>
        <p><strong>Téléphone :</strong> {{ $patiente->telephone }}</p>
        <p><strong>Groupe sanguin :</strong> {{ $patiente->groupe_sanguin }}</p>
        <p><strong>Profession :</strong> {{ $patiente->profession }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Modals pour modifier les informations des patientes -->
@foreach($patientes as $patiente)
<div class="modal fade" id="modalEditPatiente{{ $patiente->id }}" tabindex="-1" aria-labelledby="modalEditPatienteLabel{{ $patiente->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditPatienteLabel{{ $patiente->id }}">Modifier la patiente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form method="POST" action="{{ route('admin.patiente.update', $patiente->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $patiente->nom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $patiente->prenom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ $patiente->date_naissance }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $patiente->email }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $patiente->telephone }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Groupe sanguin</label>
            <input type="text" name="groupe_sanguin" class="form-control" value="{{ $patiente->groupe_sanguin }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <input type="text" name="profession" class="form-control" value="{{ $patiente->profession }}" required>
          </div>
          <!-- Ne pas afficher le champ mot de passe ici sauf si tu veux permettre la modification -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach($medecins as $medecin)
<div class="modal fade" id="modalVoirMedecin{{ $medecin->id }}" tabindex="-1" aria-labelledby="modalVoirMedecinLabel{{ $medecin->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVoirMedecinLabel{{ $medecin->id }}">Détails du médecin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ $medecin->nom }}</p>
        <p><strong>Prénom :</strong> {{ $medecin->prenom }}</p>
        <p><strong>Téléphone :</strong> {{ $medecin->telephone }}</p>
        <p><strong>Email :</strong> {{ $medecin->email }}</p>
        <p><strong>Spécialité :</strong> {{ $medecin->specialite }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($medecins as $medecin)
<div class="modal fade" id="modalEditMedecin{{ $medecin->id }}" tabindex="-1" aria-labelledby="modalEditMedecinLabel{{ $medecin->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditMedecinLabel{{ $medecin->id }}">Modifier le médecin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form method="POST" action="{{ route('admin.medecin.update', $medecin->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $medecin->nom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $medecin->prenom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $medecin->telephone }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $medecin->email }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Spécialité</label>
            <input type="text" name="specialite" class="form-control" value="{{ $medecin->specialite }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- il reste a jouter les modals pour les secrétaires et les rendez-vous -->
<!-- Modal pour voir les détails des secrétaires -->
@foreach($secretaires as $secretaire)
<div class="modal fade" id="modalVoirSecretaire{{ $secretaire->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ $secretaire->nom }}</p>
        <p><strong>Prénom :</strong> {{ $secretaire->prenom }}</p>
        <p><strong>Téléphone :</strong> {{ $secretaire->telephone }}</p>
        <p><strong>Email :</strong> {{ $secretaire->email }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Modal du bouton modifier des secrétaires -->
@foreach($secretaires as $secretaire)
<div class="modal fade" id="modalEditSecretaire{{ $secretaire->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Modifier le secrétaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.secretaire.update', $secretaire->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $secretaire->nom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $secretaire->prenom }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $secretaire->telephone }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $secretaire->email }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal du bouton  des secrétaires -->
@foreach($secretaires as $secretaire)
<div class="modal fade" id="modalDeleteSecretaire{{ $secretaire->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header text-danger">
        <h5 class="modal-title">Confirmer la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer <strong>{{ $secretaire->nom }} {{ $secretaire->prenom }}</strong> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('admin.secretaire.destroy', $secretaire->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
@endforeach


@vite('resources/js/app.js')
</body>
</html>
