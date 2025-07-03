<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_secretaire\dashboard_secretaire.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard - {{ auth('secretaire')->user()->prenom ?? 'Secrétaire' }} {{ auth('secretaire')->user()->nom ?? '' }} - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
    <style>
        .nav-link {
  padding: 0.75rem 1rem;
  border-radius: 0.5rem;
  transition: all 0.2s ease-in-out;
  color: #333;
}

.nav-link:hover,
.nav-link.active {
  background-color: #fdeaf3;
  color: #fd0d99;
  font-weight: 500;
}

    </style>
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
       <nav id="sidebarSecretaire"
     class="col-12 col-md-3 col-lg-2 offcanvas-md offcanvas-start bg-white shadow-sm px-3 py-4 border-end d-flex flex-column vh-100 position-md-fixed z-3"
     tabindex="-1">
  <div class="d-flex flex-column justify-content-between h-100 w-100">

    {{-- En-tête --}}
    <div>
      <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
        <img src="{{ asset('image/logo medecin.png') }}" alt="Logo" style="width: 42px; height: 42px;">
        <h4 class="fw-bold mb-0" style="color:#fd0d99;">MediCare</h4>
      </div>

      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2 active" href="#">
            <i class="bi bi-house-door fs-5"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalRendezVous">
            <i class="bi bi-calendar-check fs-5"></i>
            <span>Gérer les rendez-vous</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalPatientes">
            <i class="bi bi-people-fill fs-5"></i>
            <span>Patientes</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalMedecins">
            <i class="bi bi-person-badge fs-5"></i>
            <span>Médecins</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#">
            <i class="bi bi-bell fs-5"></i>
            <span>Notifications</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalFactures">
            <i class="bi bi-receipt fs-5"></i>
            <span>Factures</span>
          </a>
        </li>
      </ul>
    </div>

    {{-- Déconnexion en bas --}}
    <div class="mt-auto pt-3 border-top">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
       <button type="submit" class="nav-link text-danger"
                style="border: none; background: none; cursor: pointer;"
                onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
            <i class="bi bi-box-arrow-right me-2"></i>
          <span>Déconnexion</span>
        </button>
      </form>
    </div>

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
                <br>


                <!-- Tableau des rendez-vous du jour (exemple) -->
             <div class="table-responsive shadow-sm rounded-4" style="max-height: 400px; overflow-y: auto;">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light sticky-top">
            <tr>
                <th class="text-pink fw-bold">Heure</th>
                <th class="text-pink fw-bold">Patiente</th>
                <th class="text-pink fw-bold">Médecin</th>
                <th class="text-pink fw-bold">Motif</th>
                <th class="text-pink fw-bold">Statut</th>
                <th class="text-pink fw-bold text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rendezvous as $rdv)
            <tr class="shadow-sm">
                <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
                <td>{{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</td>
                <td>Dr. {{ $rdv->medecin->prenom }} {{ $rdv->medecin->nom }}</td>
                <td>{{ $rdv->motif }}</td>
                <td>
                    @if($rdv->statut === 'confirmé')
                        <span class="badge bg-success rounded-pill px-3 py-2">Confirmé</span>
                    @elseif($rdv->statut === 'en_attente')
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">En attente</span>
                    @else
                        <span class="badge bg-danger rounded-pill px-3 py-2">Annulé</span>
                    @endif
                </td>
                <td class="text-center">
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
<br>


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
                                <canvas id="statutChart" class="chart-canvas-circle"></canvas>
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
              <!-- Modal Liste des Factures -->
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
                        <i class="bi bi-plus-circle me-2"></i> Nouvelle facture
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Patiente</th>
                                <th>Montant</th>
                                <th>Type</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($factures->count() > 0)
                                @foreach ($factures as $facture)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ optional($facture->patiente)->prenom }} {{ optional($facture->patiente)->nom }}</td>
                                    <td>{{ number_format($facture->montant, 2, ',', ' ') }} FCFA</td>
                                    <td>{{ $facture->type_facture }}</td>
                                    <td>
                                        @if ($facture->statut == 'Payée')
                                            <span class="badge bg-success">Payée</span>
                                        @else
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir" data-bs-toggle="modal" data-bs-target="#modalVoirFacture{{ $facture->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success rounded-pill" title="Modifier" data-bs-toggle="modal" data-bs-target="#modalModifierFacture{{ $facture->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a href="{{ route('facture.download', $facture->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                                            <i class="bi bi-file-earmark-pdf"></i> Télécharger
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer" data-bs-toggle="modal" data-bs-target="#modalSupprimerFacture{{ $facture->id }}">
    <i class="bi bi-trash"></i>
</button>

                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        <i class="bi bi-exclamation-circle me-2"></i> Aucune facture disponible.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- Modal Nouvelle Facture -->
<div class="modal fade" id="modalAjouterFacture" tabindex="-1" aria-labelledby="modalAjouterFactureLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalAjouterFactureLabel" style="color:#fd0d99;">
                    <i class="bi bi-receipt me-2"></i> Nouvelle facture
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('facture.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Patiente</label>
                        <select class="form-select" name="patiente_id" id="patienteSelect" required>
                            <option selected disabled>Choisir une patiente</option>
                            @foreach ($patientes as $patiente)
                                <option value="{{ $patiente->id }}">{{ $patiente->prenom }} {{ $patiente->nom }}</option>
                            @endforeach
                            <option value="new">Nouvelle patiente</option>
                        </select>
                    </div>

                    <!-- Formulaire caché pour nouvelle patiente -->
                    <div id="nouvellePatienteForm" class="mt-3" style="display: none;">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom_patiente">

                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom_patiente">

                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone_patiente">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date_facture" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type de facture</label>
                        <select class="form-select" name="type_facture" required>
                            <option value="Consultation">Consultation</option>
                            <option value="Échographie">Échographie</option>
                            <option value="Perfusion">Perfusion</option>
                            <option value="Analyse">Analyse</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Montant</label>
                        <input type="number" class="form-control" name="montant" placeholder="Montant en FCFA" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Statut</label>
                        <select class="form-select" name="statut" required>
                            <option value="Payée">Payée</option>
                            <option value="En attente">En attente</option>
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

@foreach ($factures as $facture)
<!-- Modal Voir Facture -->
<div class="modal fade" id="modalVoirFacture{{ $facture->id }}" tabindex="-1" aria-labelledby="modalVoirFactureLabel{{ $facture->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalVoirFactureLabel{{ $facture->id }}" style="color:#fd0d99;">
                    <i class="bi bi-receipt me-2"></i> Facture #{{ $facture->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <td>{{ optional($facture->patiente)->prenom }} {{ optional($facture->patiente)->nom }}</td>
                <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}</p>
                <p><strong>Type :</strong> {{ $facture->type_facture }}</p>
                <p><strong>Montant :</strong> {{ number_format($facture->montant, 2, ',', ' ') }} FCFA</p>
                <p><strong>Statut :</strong>
                    @if ($facture->statut == 'Payée')
                        <span class="badge bg-success">Payée</span>
                    @else
                        <span class="badge bg-warning text-dark">En attente</span>
                    @endif
                </p>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Fermer</button>
                    <a href="{{ route('facture.download', $facture->id) }}" class="btn btn-pink rounded-pill">
                        <i class="bi bi-file-earmark-pdf"></i> Télécharger PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($factures as $facture)
<!-- Modal Modifier Facture -->
<div class="modal fade" id="modalModifierFacture{{ $facture->id }}" tabindex="-1" aria-labelledby="modalModifierFactureLabel{{ $facture->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalModifierFactureLabel{{ $facture->id }}" style="color:#fd0d99;">
                    <i class="bi bi-pencil"></i> Modifier Facture #{{ $facture->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('facture.update', $facture->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Statut</label>
                        <select class="form-select" name="statut" required>
                            <option value="Payée" {{ $facture->statut == 'Payée' ? 'selected' : '' }}>Payée</option>
                            <option value="En attente" {{ $facture->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Méthode de paiement</label>
                        <select class="form-select" name="methode_paiement">
                            <option value="" {{ $facture->methode_paiement == null ? 'selected' : '' }}>Non renseigné</option>
                            <option value="Espèces" {{ $facture->methode_paiement == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                            <option value="Carte bancaire" {{ $facture->methode_paiement == 'Carte bancaire' ? 'selected' : '' }}>Carte bancaire</option>
                            <option value="Mobile Money" {{ $facture->methode_paiement == 'Mobile Money' ? 'selected' : '' }}>Mobile Money</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-pink rounded-pill ms-2">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($factures as $facture)
<!-- Modal Supprimer Facture -->
<div class="modal fade" id="modalSupprimerFacture{{ $facture->id }}" tabindex="-1" aria-labelledby="modalSupprimerFactureLabel{{ $facture->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalSupprimerFactureLabel{{ $facture->id }}" style="color:#fd0d99;">
                    <i class="bi bi-trash me-2"></i> Supprimer Facture #{{ $facture->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger fw-bold">Voulez-vous vraiment supprimer cette facture ? Cette action est irréversible.</p>
                <p><strong>Patiente :</strong> {{ $facture->prenom_patiente }} {{ $facture->nom_patiente }}</p>
                <p><strong>Montant :</strong> {{ number_format($facture->montant, 2, ',', ' ') }} FCFA</p>
                <form method="POST" action="{{ route('facture.destroy', $facture->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger rounded-pill ms-2">Supprimer</button>
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
<script>
    window.rdvParMois = @json(array_values($rdvParMois));
    window.statutRdv = @json(array_values($statutRdv));
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Rendez-vous par mois (Bar chart)
        var ctx1 = document.getElementById("rdvChart").getContext("2d");
        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Août", "Sep", "Oct", "Nov", "Déc"],
                datasets: [{
                    label: "Rendez-vous",
                    data: window.rdvParMois,
                    backgroundColor: "rgba(54, 162, 235, 0.5)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            },

        });

        // Statut des rendez-vous (Pie chart)
        var ctx2 = document.getElementById("statutChart").getContext("2d");
new Chart(ctx2, {
    type: "pie",
    data: {
        labels: ["Confirmés", "Annulés", "En attente"], // ✅ Ajoute explicitement "En attente"
        datasets: [{
            label: "Statut des rendez-vous",
            data: @json(array_values($statutRdv)), // ✅ Assure que toutes les valeurs sont prises en compte
            backgroundColor: ["#28a745", "#dc3545", "#ffc107"]
        }]
    },

        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const patienteSelect = document.getElementById("patienteSelect");
    const nouvellePatienteForm = document.getElementById("nouvellePatienteForm");

    patienteSelect.addEventListener("change", function() {
        nouvellePatienteForm.style.display = (patienteSelect.value === "new") ? "block" : "none";
    });
});
</script>

@vite('resources/js/app.js')
</body>
</html>
