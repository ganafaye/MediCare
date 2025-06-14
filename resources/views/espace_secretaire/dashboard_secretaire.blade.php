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
                 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif
                <!-- En-tête stylisé -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" style="background: linear-gradient(90deg, #fde6f2 60%, #fff 100%); border-left: 6px solid #fd0d99;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-white shadow" style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-person-circle" style="font-size:2.5rem; color:#fd0d99;"></i>
                        </div>
                        <div>
                            @php
                                $secretaire = Auth::guard('secretaire')->user();
                            @endphp

                            <span class="fw-bold fs-5" style="color:#fd0d99;">
                            {{ $secretaire ? $secretaire->nom . ' ' . $secretaire->prenom : 'Secrétaire' }}
                            </span>
                            </span>
                            <div class="d-flex gap-2 mt-1">
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Email : {{ Auth::guard('secretaire')->user()->email ?? '--' }}
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
                                <a href="#" class="btn btn-pink btn-sm rounded-pill px-4 shadow" data-bs-toggle="modal" data-bs-target="#modalRendezVous">Voir les rendez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-people-fill mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Patientes</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow" data-bs-toggle="modal" data-bs-target="#modalPatientes">Voir les patientes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-person-badge mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Médecins</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow" data-bs-toggle="modal" data-bs-target="#modalMedecins">Voir les médecins</a>
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
        @foreach($rendezvous as $rdv)
        <tr>
            <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
            <td>{{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</td>
            <td>Dr. {{ $rdv->medecin->prenom }} {{ $rdv->medecin->nom }}</td>
            <td>{{ $rdv->motif }}</td>
            <td>
                @if($rdv->statut === 'confirmé')
                    <span class="badge bg-success">Confirmé</span>
                @elseif($rdv->statut === 'en_attente')
                    <span class="badge bg-warning text-dark">En attente</span>
                @else
                    <span class="badge bg-danger">Annulé</span>
                @endif
            </td>
            <td>
                <button class="btn btn-sm btn-outline-primary rounded-pill"
                        data-bs-toggle="modal"
                        data-bs-target="#modalVoirRendezVous{{ $rdv->id }}">
                    <i class="bi bi-eye"></i>
                </button>
                <button class="btn btn-sm btn-outline-success rounded-pill"
                        data-bs-toggle="modal"
                        data-bs-target="#modalModifierRendezVous{{ $rdv->id }}">
                    <i class="bi bi-pencil"></i>
                </button>
            </td>
        </tr>
        @endforeach
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
    @foreach($rendezvous as $rdv)
    <tr>
        <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
        <td>{{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</td>
        <td>{{ $rdv->medecin->nom }}</td>
        <td>{{ $rdv->motif }}</td>
        <td>
            @if($rdv->statut === 'confirmé')
                <span class="badge bg-success">Confirmé</span>
            @elseif($rdv->statut === 'en_attente')
                <span class="badge bg-warning text-dark">En attente</span>
            @else
                <span class="badge bg-danger">Annulé</span>
            @endif
        </td>
        <td>
            <!-- Voir -->
            <button class="btn btn-sm btn-outline-primary rounded-pill"
                    data-bs-toggle="modal"
                    data-bs-target="#modalVoirRendezVous{{ $rdv->id }}">
                <i class="bi bi-eye"></i>
            </button>

            <!-- Modifier -->
            <button class="btn btn-sm btn-outline-success rounded-pill"
                    data-bs-toggle="modal"
                    data-bs-target="#modalModifierRendezVous{{ $rdv->id }}">
                <i class="bi bi-pencil"></i>
            </button>
        </td>
    </tr>
    @endforeach
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
                    <i class="bi bi-calendar-plus me-2"></i> Nouveau rendez-vous
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('rendezvous.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Patiente</label>
                        <select class="form-select" name="patiente_id" required>
                            <option selected disabled>Choisir une patiente</option>
                            @foreach($patientes as $patiente)
                                <option value="{{ $patiente->id }}">{{ $patiente->prenom }} {{ $patiente->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Médecin</label>
                        <select class="form-select" name="medecin_id" required>
                            <option selected disabled>Choisir un médecin</option>
                            @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}">Dr. {{ $rdv->medecin->prenom }} {{ $rdv->medecin->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date et Heure</label>
                        <input type="datetime-local" class="form-control" name="date_heure" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motif</label>
                        <input type="text" class="form-control" name="motif" placeholder="Motif du rendez-vous" required>
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
    @forelse($patientes as $patiente)
        <tr>
            <td>{{ $patiente->nom }}</td>
            <td>{{ $patiente->prenom }}</td>
            <td>{{ $patiente->date_naissance }}</td>
            <td>{{ $patiente->telephone }}</td>
            <td>{{ $patiente->email }}</td>
            <td>{{ $patiente->groupe_sanguin }}</td>
            <td>{{ $patiente->profession }}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary rounded-pill"
                        data-bs-toggle="modal"
                        data-bs-target="#modalVoirPatiente{{ $patiente->id }}"
                        title="Voir">
                    <i class="bi bi-eye"></i>
                </button>
                <button class="btn btn-sm btn-outline-success rounded-pill"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditPatiente{{ $patiente->id }}"
                        title="Modifier">
                    <i class="bi bi-pencil"></i>
                </button>
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
                        <form  action="{{ route('secretaire.patiente.store') }}" method="POST">
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
                                      @foreach($medecins as $medecin)
    <tr>
        <td>{{ $medecin->nom }}</td>
        <td>{{ $medecin->prenom }}</td>
        <td>{{ $medecin->specialite }}</td>
        <td>{{ $medecin->telephone }}</td>
        <td>{{ $medecin->email }}</td>
        <td>
            <button class="btn btn-sm btn-outline-primary rounded-pill"
                    data-bs-toggle="modal"
                    data-bs-target="#modalVoirMedecin{{ $medecin->id }}"
                    title="Voir">
                <i class="bi bi-eye"></i>
            </button>
        </td>
    </tr>
    @endforeach
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

@foreach($patientes as $patiente)
<div class="modal fade" id="modalVoirPatiente{{ $patiente->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Détails de la patiente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ $patiente->nom }}</p>
        <p><strong>Prénom :</strong> {{ $patiente->prenom }}</p>
        <p><strong>Date de naissance :</strong> {{ $patiente->date_naissance }}</p>
        <p><strong>Téléphone :</strong> {{ $patiente->telephone }}</p>
        <p><strong>Email :</strong> {{ $patiente->email }}</p>
        <p><strong>Groupe sanguin :</strong> {{ $patiente->groupe_sanguin }}</p>
        <p><strong>Profession :</strong> {{ $patiente->profession }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($patientes as $patiente)
<div class="modal fade" id="modalEditPatiente{{ $patiente->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Modifier la patiente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('secretaire.patiente.update', $patiente->id) }}">
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
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $patiente->telephone }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $patiente->email }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Groupe sanguin</label>
            <input type="text" name="groupe_sanguin" class="form-control" value="{{ $patiente->groupe_sanguin }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <input type="text" name="profession" class="form-control" value="{{ $patiente->profession }}" required>
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

@foreach($medecins as $medecin)
<div class="modal fade" id="modalVoirMedecin{{ $medecin->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Détails du médecin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nom :</strong> {{ $medecin->nom }}</p>
        <p><strong>Prénom :</strong> {{ $medecin->prenom }}</p>
        <p><strong>Spécialité :</strong> {{ $medecin->specialite }}</p>
        <p><strong>Téléphone :</strong> {{ $medecin->telephone }}</p>
        <p><strong>Email :</strong> {{ $medecin->email }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--modal voir rendez-vous-->
@foreach($rendezvous as $rdv)
<div class="modal fade" id="modalVoirRendezVous{{ $rdv->id }}" tabindex="-1" aria-labelledby="modalVoirRendezVousLabel{{ $rdv->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalVoirRendezVousLabel{{ $rdv->id }}" style="color:#fd0d99;">
                    <i class="bi bi-eye me-2"></i> Détails du rendez-vous
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p><strong>Patiente :</strong> {{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</p>
                <p><strong>Médecin :</strong> {{ $rdv->medecin->nom }}</p>
                <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</p>
                <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</p>
                <p><strong>Motif :</strong> {{ $rdv->motif }}</p>
                <p><strong>Statut :</strong>
                    @if($rdv->statut === 'confirmé')
                        <span class="badge bg-success">Confirmé</span>
                    @elseif($rdv->statut === 'en_attente')
                        <span class="badge bg-warning text-dark">En attente</span>
                    @else
                        <span class="badge bg-danger">Annulé</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--modal modifier rendez-vous-->
@foreach($rendezvous as $rdv)
<div class="modal fade" id="modalModifierRendezVous{{ $rdv->id }}" tabindex="-1" aria-labelledby="modalModifierRendezVousLabel{{ $rdv->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalModifierRendezVousLabel{{ $rdv->id }}" style="color:#fd0d99;">
                    <i class="bi bi-pencil me-2"></i> Modifier le rendez-vous
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('rendezvous.update', $rdv->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Date et Heure</label>
                        <input type="datetime-local" class="form-control" name="date_heure" value="{{ \Carbon\Carbon::parse($rdv->date_heure)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motif</label>
                        <input type="text" class="form-control" name="motif" value="{{ $rdv->motif }}" required>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-pink rounded-pill ms-2">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
.hover-shadow:hover {
    box-shadow: 0 0 0 4px #fd0d9922, 0 4px 24px #fd0d9933 !important;
    transform: translateY(-2px) scale(1.02);
}
</style>
@vite('resources/js/app.js')
</body>
</html>
