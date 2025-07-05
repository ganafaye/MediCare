<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_medecin\dashboard_medecin.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard -Dr. {{ auth('medecin')->user()->prenom ?? 'Médecin' }} {{ auth('medecin')->user()->nom ?? '' }} - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
    <style>
        /* 🎯 Conteneur général de la sidebar */
.sidebar {
  background-color: #fff;
  border-right: 1px solid #eee;
  z-index: 1040;
  transition: all 0.3s ease-in-out;
  overflow-y: auto;
  scrollbar-width: thin;
}

/* 📌 Liens de navigation */
.nav-link {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.7rem 1rem;
  font-size: 0.95rem;
  color: #333;
  border-radius: 0.5rem;
  transition: background-color 0.2s ease-in-out;
  text-decoration: none;
}

/* 💡 État actif ou survolé */
.nav-link:hover,
.nav-link.active {
  background-color: #fdeaf3;
  color: #fd0d99;
  font-weight: 500;
}

/* 🧠 Icônes dans les liens */
.nav-link i {
  font-size: 1.2rem;
  min-width: 20px;
  text-align: center;
}

/* 🔲 Espacement entre les éléments */
.nav-item {
  margin-bottom: 0.5rem;
}

/* 🧤 Déconnexion hover */
.nav-link.text-danger:hover {
  background-color: rgba(253, 13, 153, 0.1);
  color: #fd0d99;
}

/* 📱 Sidebar mobile */
@media (max-width: 767.98px) {
  .sidebar {
    width: 250px;
  }
}

    </style>
</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
       <nav id="sidebarMedecin"
     class="col-12 col-md-3 col-lg-2 offcanvas-md offcanvas-start bg-white shadow-sm px-3 py-4 border-end d-flex flex-column vh-100 position-md-fixed z-3"
     tabindex="-1">
  <div class="d-flex flex-column justify-content-between h-100 w-100">

    {{-- Logo & Titre --}}
    <div>
      <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
        <img src="{{ asset('image/logo medecin.png') }}" alt="Logo" style="width: 42px; height: 42px;">
        <h4 class="fw-bold mb-0" style="color:#fd0d99;">MediCare</h4>
      </div>

      {{-- Liens de navigation --}}
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
            <span>Mes rendez-vous</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalPatientes">
            <i class="bi bi-person-lines-fill fs-5"></i>
            <span>Mes patientes</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalDossiers">
            <i class="bi bi-folder2-open fs-5"></i>
            <span>Dossiers médicaux</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalOrdonnances">
            <i class="bi bi-file-earmark-plus fs-5"></i>
            <span>Ordonnances</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalSuiviGrossesse">
            <i class="bi bi-heart-pulse fs-5"></i>
            <span>Suivi grossesse</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#modalConsultations">
            <i class="bi bi-file-medical fs-5"></i>
            <span>Mes consultations</span>
          </a>
        </li>

        <li class="nav-item mb-2">
          <a class="nav-link d-flex align-items-center gap-2 position-relative" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">
            <i class="bi bi-bell fs-5 position-relative">
              <span id="notif-badge-medecin" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">0</span>
            </i>
            <span>Notifications</span>
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
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMedecin" aria-controls="sidebarMedecin">
                <i class="bi bi-list" style="font-size: 1.8rem;"></i>
            </button>
            <main class="px-3 px-md-5 py-4 ms-md-0">
                    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                                $medecin = Auth::guard('medecin')->user();
                            @endphp
                            <span class="fw-bold fs-5" style="color:#fd0d99;">
                                Dr. {{ Auth::guard('medecin')->user()->prenom ?? '' }} {{ Auth::guard('medecin')->user()->nom ?? 'Médecin' }}
                            </span>
                            <div class="d-flex gap-2 mt-1">
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Spécialité : {{ Auth::guard('medecin')->user()->specialite ?? '--' }}
                                </span>
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Email : {{ Auth::guard('medecin')->user()->email ?? '--' }}
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
                                <a href="#" class="btn btn-pink btn-sm rounded-pill px-4 shadow"  data-bs-toggle="modal" data-bs-target="#modalRendezVous">Voir mes rendez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-person-lines-fill mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes patientes</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow" data-bs-toggle="modal" data-bs-target="#modalPatientes"> Voir mes patientes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-file-earmark-medical mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Consultations</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                               <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow"
   data-bs-toggle="modal" data-bs-target="#modalConsultations">
   Voir mes consultations
</a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historique des rendez-vous (exemple) -->
               <div class="row mt-5">
    <div class="col-12">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-white border-0 rounded-top-4">
                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Historique des rendez-vous</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div class="row g-2 mb-3">
  <div class="row align-items-end g-2 mb-4">
  <div class="col-md-5">
    <input type="text" id="rechercheRendezVousMedecin" class="form-control" placeholder="🔍 Rechercher un rendez-vous (patiente, motif...)">
  </div>

  <div class="col-md-4">
    <select id="filtreStatutMedecin" class="form-select">
      <option value="">Tous les statuts</option>
      <option value="confirmé">Confirmés</option>
      <option value="en attente">En attente</option>
      <option value="annulé">Annulés</option>
    </select>
  </div>

  <div class="col-md-3 d-grid">
    <button id="filtrerAujourdhuiMedecin" class="btn btn-outline-primary">
      📅 Rendez-vous d’aujourd’hui
    </button>
  </div>
</div>
<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                   <table id="tableRendezVousMedecin" class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Patiente</th>
                                <th>Motif</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rendezvous as $rdv)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
                                <td>{{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
</div>
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
                                <canvas id="motifsChart" class="chart-canvas-circle"></canvas>
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

<!-- Modal Rendez-vous -->
<div class="modal fade" id="modalRendezVous" tabindex="-1" aria-labelledby="modalRendezVousLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalRendezVousLabel" style="color:#fd0d99;">
            <i class="bi bi-calendar-check me-2"></i> Mes rendez-vous à venir
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <div class="row align-items-end g-2 mb-4">
  <div class="col-md-5">
    <input type="text" id="rechercheModalRendezVous" class="form-control" placeholder="🔍 Rechercher un rendez-vous (patiente, motif...)">
  </div>

  <div class="col-md-4">
    <select id="filtreStatutModal" class="form-select">
      <option value="">Tous les statuts</option>
      <option value="confirmé">Confirmés</option>
      <option value="en attente">En attente</option>
      <option value="annulé">Annulés</option>
    </select>
  </div>

  <div class="col-md-3 d-grid">
    <button id="filtrerAujourdhuiModal" class="btn btn-outline-primary">
      📅 Rendez-vous d’aujourd’hui
    </button>
  </div>
</div>
<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
           <table id="tableModalRendezVous" class="table align-middle mb-0 table-hover">
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
    @foreach($rendezvous as $rdv)
    <tr>
        <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
       <td>{{ $rdv->patiente->prenom }} {{ $rdv->patiente->nom }}</td>
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
            @if($rdv->statut === 'en_attente')
                <!-- Confirmer -->
                <form method="POST" action="{{ route('rendezvous.confirm', $rdv->id) }}" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-outline-success rounded-pill" title="Confirmer">
                        <i class="bi bi-check"></i>
                    </button>
                </form>

                <!-- Annuler -->
                <form method="POST" action="{{ route('rendezvous.cancel.medecin', $rdv->id) }}" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Annuler">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
            @else
                <span class="text-muted">Action non disponible</span>
            @endif
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
</div>

<!-- Modal Mes Patientes -->
<div class="modal fade" id="modalPatientes" tabindex="-1" aria-labelledby="modalPatientesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalPatientesLabel" style="color:#fd0d99;">
            <i class="bi bi-person-lines-fill me-2"></i> Liste de mes patientes
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
            <th>Date de naissance</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Groupe sanguin</th>
            <th>Profession</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patientes as $patiente)
        <tr>
            <td>{{ $patiente->nom }}</td>
            <td>{{ $patiente->prenom }}</td>
            <td>{{ \Carbon\Carbon::parse($patiente->date_naissance)->format('d/m/Y') }}</td>
            <td>{{ $patiente->telephone }}</td>
            <td>{{ $patiente->email }}</td>
            <td>{{ $patiente->groupe_sanguin }}</td>
            <td>{{ $patiente->profession }}</td>
             <td>
        <!-- Voir -->
        <button class="btn btn-sm btn-outline-primary rounded-pill"
                data-bs-toggle="modal"
                data-bs-target="#modalVoirPatiente{{$patiente->id}}">
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

<!-- Modal Dossiers médicaux -->
<div class="modal fade" id="modalDossiers" tabindex="-1" aria-labelledby="modalDossiersLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalDossiersLabel" style="color:#fd0d99;">
            <i class="bi bi-folder2-open me-2"></i> Dossiers médicaux des patientes
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <!-- Bouton Créer un dossier médical -->
       <!-- Bouton Créer un dossier médical -->
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalCreerDossier">
                <i class="bi bi-plus-circle me-2"></i>Créer un dossier médical
            </button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Patiente</th>
                        <th>Date d'ouverture</th>
                        <th>Dernière mise à jour</th>
                        <th>Traitement en cours</th>
                        <th>Documents</th>
                        <th>Actions</th>
                    </tr>
                </thead>
               <tbody>
    @foreach ($dossiers as $dossier)
        <tr>
            <td>{{ $dossier->patiente->prenom }} {{ $dossier->patiente->nom }}</td>
            <td>{{ $dossier->created_at->format('d/m/Y') }}</td>
            <td>{{ $dossier->updated_at->format('d/m/Y') }}</td>
            <td>{{ $dossier->traitement ?? 'Non renseigné' }}</td>
            <td>
@if (isset($dossier->documents) && is_iterable($dossier->documents))
    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill">
        <i class="bi bi-file-earmark-pdf"></i> {{ count($dossier->documents) }}
    </a>
@else
    <span class="text-muted">Aucun document</span>
@endif
            </td>
            <td>
                <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir" data-bs-toggle="modal" data-bs-target="#modalVoirDossier">
                      <i class="bi bi-eye"></i>
                </button>

                 <button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalModifierDossier{{ $dossier->id }}">
        <i class="bi bi-pencil"></i> Modifier
    </button>
    <button class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#modalSupprimerDossier{{ $dossier->id }}">
        <i class="bi bi-trash"></i> Supprimer
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

<!-- Modal Créer un dossier médical -->
<div class="modal fade" id="modalCreerDossier" tabindex="-1" aria-labelledby="modalCreerDossierLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalCreerDossierLabel" style="color:#fd0d99;">
            <i class="bi bi-folder-plus me-2"></i>Créer un dossier médical
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
       <form action="{{ route('dossier.creer') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="mb-3">
    <label for="patiente" class="form-label">Patiente</label>
    <select class="form-select" id="patiente" name="patiente_id" required>
      <option selected disabled>Choisir une patiente</option>
      @foreach ($patientes as $patiente)
        <option value="{{ $patiente->id }}">{{ $patiente->prenom }} {{ $patiente->nom }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="diagnostic" class="form-label">Diagnostic</label>
    <textarea class="form-control" id="diagnostic" name="diagnostic" placeholder="Ex : Anémie sévère" required></textarea>
  </div>

  <div class="mb-3">
    <label for="traitement" class="form-label">Traitement en cours</label>
    <input type="text" class="form-control" id="traitement" name="traitement" placeholder="Ex : Fer + Vitamines">
  </div>

  <div class="mb-3">
    <label for="observations" class="form-label">Observations</label>
    <textarea class="form-control" id="observations" name="observations" placeholder="Ex : À surveiller dans 15 jours"></textarea>
  </div>

  <div class="mb-3">
    <label for="grossesse" class="form-label">Grossesse</label>
    <select class="form-select" id="grossesse" name="grossesse" required>
      <option selected disabled>En état de grossesse ?</option>
      <option value="oui">Oui</option>
      <option value="non">Non</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="documents" class="form-label">Ajouter des documents</label>
    <input class="form-control" type="file" id="documents" name="documents[]" multiple>
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

<!-- Modal Ordonnances -->
<div class="modal fade" id="modalOrdonnances" tabindex="-1" aria-labelledby="modalOrdonnancesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalOrdonnancesLabel" style="color:#fd0d99;">
            <i class="bi bi-file-earmark-plus me-2"></i> Ordonnances
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <!-- Bouton Créer une ordonnance -->
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalCreerOrdonnance">
                <i class="bi bi-plus-circle me-2"></i>Créer une ordonnance
            </button>
        </div>

        <!-- Tableau des ordonnances dynamiques -->
       <div class="table-responsive">
    <table class="table align-middle table-hover ">
        <thead class="table-light text-center">
            <tr>
                <th>Patiente</th>
                <th>Date</th>
                <th>Médicaments</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordonnances as $ordonnance)
            <tr>
                <td>{{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}</td>
                <td class="text-nowrap">{{ $ordonnance->date_prescription->format('d/m/Y') }}</td>
                <td style="max-width: 250px;">
                    <div class="text-truncate" title="{{ $ordonnance->contenu }}">
                        {{ $ordonnance->contenu }}
                    </div>
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $ordonnance->statut == 'Envoyée' ? 'success' : 'secondary' }}">
                        {{ $ordonnance->statut }}
                    </span>
                </td>
                <td class="text-center">
                    <!-- Voir ordonnance -->
                    <button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalVoirOrdonnance{{ $ordonnance->id }}" title="Voir">
                        <i class="bi bi-eye"></i>
                    </button>
                    <!-- Modifier ordonnance -->
                    <button class="btn btn-sm btn-outline-warning rounded-pill" data-bs-toggle="modal" data-bs-target="#modalModifierOrdonnance{{ $ordonnance->id }}" title="Modifier">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!-- Télécharger ordonnance -->
                    <a href="{{ route('ordonnance.download', $ordonnance->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill" title="Télécharger">
                        <i class="bi bi-download"></i>
                    </a>
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


<!-- Modal Créer une ordonnance -->
<div class="modal fade" id="modalCreerOrdonnance" tabindex="-1" aria-labelledby="modalCreerOrdonnanceLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalCreerOrdonnanceLabel" style="color:#fd0d99;">
            <i class="bi bi-file-earmark-plus me-2"></i>Créer une ordonnance
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('ordonnance.store') }}" method="POST">
          @csrf

          <!-- Sélection de la patiente -->
          <div class="mb-3">
            <label for="patienteOrd" class="form-label">Patiente</label>
            <select class="form-select" id="patienteOrd" name="patiente_id" required>
              <option selected disabled>Choisir une patiente</option>
              @foreach ($patientes as $patiente)
                <option value="{{ $patiente->id }}">{{ $patiente->prenom }} {{ $patiente->nom }}</option>
              @endforeach
            </select>
          </div>

          <!-- Médicaments prescrits -->
          <div class="mb-3">
            <label for="medicaments" class="form-label">Médicaments</label>
            <textarea class="form-control" id="medicaments" name="contenu" rows="3" placeholder="Ex : Fer 1cp/j, Vitamine B9 1cp/j"></textarea>
          </div>

          <!-- Date de prescription -->
          <div class="mb-3">
            <label for="date_prescription" class="form-label">Date de prescription</label>
            <input type="date" class="form-control" id="date_prescription" name="date_prescription" required>
          </div>

          <!-- Boutons d'action -->
          <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-pink rounded-pill ms-2">Créer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Voir Patiente -->
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
                <p><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($patiente->date_naissance)->format('d/m/Y') }}</p>
                <p><strong>Téléphone :</strong> {{ $patiente->telephone }}</p>
                <p><strong>Email :</strong> {{ $patiente->email }}</p>
                <p><strong>Groupe sanguin :</strong> {{ $patiente->groupe_sanguin }}</p>
                <p><strong>Profession :</strong> {{ $patiente->profession }}</p>
                <p><strong>Date du rendez-vous :</strong> {{ \Carbon\Carbon::parse($patiente->rendezvous->first()->date_heure)->format('d/m/Y H:i') }}</p>
                <p><strong>Motif :</strong> {{ $patiente->rendezvous->first()->motif }}</p>
                <p><strong>Statut :</strong>
   <span class="badge bg-{{ $patiente->rendezvous->first()->statut == 'Confirmé' ? 'success' : ($patiente->rendezvous->first()->statut == 'En attente' ? 'warning' : 'danger') }}">
       {{ $patiente->rendezvous->first()->statut }}
   </span>
</p>

            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Ajoute ce bouton dans la sidebar pour ouvrir le modal -->
<script>
document.querySelectorAll('[data-bs-target="#modalOrdonnances"]').forEach(function(btn){
    btn.addEventListener('click', function(){
        var modal = new bootstrap.Modal(document.getElementById('modalOrdonnances'));
        modal.show();
    });
});
</script>
<style>
    .chart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 250px; /* ✅ Fixe une hauteur identique */
        max-width: 100%;
    }
</style>
<script>
    window.consultationsParMois = @json(array_values($consultationsParMois));
    window.repartitionMotifs = @json(array_values($repartitionMotifs));
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Consultations par mois (Bar chart)
        var ctx1 = document.getElementById("consultationsChart").getContext("2d");
        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: ["Juin", "Juil", "Août", "Sep", "Oct", "Nov", "Déc", "Jan", "Fév", "Mar", "Avr", "Mai"],
                datasets: [{
                    label: "Consultations",
                    data: window.consultationsParMois,
                    backgroundColor: "rgba(54, 162, 235, 0.5)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            },

        });

        // Répartition des motifs (Pie chart)
        var ctx2 = document.getElementById("motifsChart").getContext("2d");
        new Chart(ctx2, {
            type: "pie",
            data: {
                labels: @json(array_keys($repartitionMotifs)),
                datasets: [{
                    label: "Motifs",
                    data: window.repartitionMotifs,
                    backgroundColor: ["#ff6384", "#36a2eb", "#ffce56", "#4bc0c0", "#9966ff"]
                }]
            },

        });
    });
</script>
<!-- Modal Voir Dossier Médical -->
@if(isset($dossier) && $dossier)
  <!-- Modal Voir Dossier Médical -->
  <div class="modal fade" id="modalVoirDossier" tabindex="-1" aria-labelledby="modalVoirDossierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content rounded-4">

        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="modalVoirDossierLabel" style="color:#fd0d99;">
            <i class="bi bi-folder2-open me-2"></i>
            Dossier Médical de {{ $dossier->patiente->prenom }} {{ $dossier->patiente->nom }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <p><strong>Diagnostic :</strong> {{ $dossier->diagnostic }}</p>
          <p><strong>Traitement :</strong> {{ $dossier->traitement ?? 'Non renseigné' }}</p>
          <p><strong>Observations :</strong> {{ $dossier->observations ?? 'Non renseigné' }}</p>
          <p><strong>Grossesse :</strong>
            <span class="badge bg-{{ $dossier->grossesse ? 'success' : 'danger' }}">
              {{ $dossier->grossesse ? 'Oui' : 'Non' }}
            </span>
          </p>
        </div>

      </div>
    </div>
  </div>
@else
  {{-- En option, message d'information --}}

@endif


@foreach ($dossiers as $dossier)
<!-- Modal Modifier Dossier Médical -->
<div class="modal fade" id="modalModifierDossier{{ $dossier->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Modifier Dossier Médical</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dossier.update', $dossier->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="diagnostic" class="form-label">Diagnostic</label>
            <textarea class="form-control" id="diagnostic" name="diagnostic">{{ $dossier->diagnostic }}</textarea>
          </div>

          <div class="mb-3">
            <label for="traitement" class="form-label">Traitement</label>
            <input type="text" class="form-control" id="traitement" name="traitement" value="{{ $dossier->traitement }}">
          </div>

          <div class="mb-3">
            <label for="observations" class="form-label">Observations</label>
            <textarea class="form-control" id="observations" name="observations">{{ $dossier->observations }}</textarea>
          </div>

          <div class="mb-3">
            <label for="grossesse" class="form-label">Grossesse</label>
            <select class="form-select" id="grossesse" name="grossesse">
              <option value="1" {{ $dossier->grossesse ? 'selected' : '' }}>Oui</option>
              <option value="0" {{ !$dossier->grossesse ? 'selected' : '' }}>Non</option>
            </select>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-pink rounded-pill">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($dossiers as $dossier)
<!-- Modal Supprimer Dossier Médical -->
<div class="modal fade" id="modalSupprimerDossier{{ $dossier->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-danger">Supprimer Dossier Médical</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ce dossier médical ? Cette action est **irréversible**.</p>
        <form action="{{ route('dossier.delete', $dossier->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <div class="text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-danger rounded-pill">Supprimer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($ordonnances as $ordonnance)
<!-- Modal Voir Ordonnance -->
<div class="modal fade" id="modalVoirOrdonnance{{ $ordonnance->id }}" tabindex="-1" aria-labelledby="modalVoirOrdonnanceLabel{{ $ordonnance->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalVoirOrdonnanceLabel{{ $ordonnance->id }}">
            <i class="bi bi-file-earmark-medical me-2"></i> Ordonnance - {{ $ordonnance->patiente->prenom }} {{ $ordonnance->patiente->nom }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Date de prescription :</strong> {{ $ordonnance->date_prescription->format('d/m/Y') }}</p>
        <p><strong>Médicaments :</strong> {{ $ordonnance->contenu }}</p>
        <p><strong>Médecin :</strong> Dr. {{ $ordonnance->medecin->nom }} ({{ $ordonnance->medecin->specialite }})</p>
        <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($ordonnances as $ordonnance)
<!-- Modal Modifier Ordonnance -->
<div class="modal fade" id="modalModifierOrdonnance{{ $ordonnance->id }}" tabindex="-1" aria-labelledby="modalModifierOrdonnanceLabel{{ $ordonnance->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalModifierOrdonnanceLabel{{ $ordonnance->id }}">
            <i class="bi bi-pencil-square me-2"></i> Modifier Ordonnance
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('ordonnance.update', $ordonnance->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="contenu{{ $ordonnance->id }}" class="form-label">Prescription</label>
            <textarea class="form-control" id="contenu{{ $ordonnance->id }}" name="contenu">{{ $ordonnance->contenu }}</textarea>
          </div>

          <div class="mb-3">
            <label for="date_prescription{{ $ordonnance->id }}" class="form-label">Date</label>
            <input type="date" class="form-control" id="date_prescription{{ $ordonnance->id }}" name="date_prescription" value="{{ $ordonnance->date_prescription->format('Y-m-d') }}">
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-warning rounded-pill">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endforeach
<!-- Modal Mes consultations -->
<div class="modal fade" id="modalConsultations" tabindex="-1" aria-labelledby="modalConsultationsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalConsultationsLabel" style="color:#fd0d99;">
            <i class="bi bi-file-medical me-2"></i> Mes consultations
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- Bouton Créer une consultation -->
        <div class="mb-4 text-end">
            <button class="btn btn-pink rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalCreerConsultation">
                <i class="bi bi-plus-circle me-2"></i>Créer une consultation
            </button>
        </div>

        <!-- Tableau des consultations -->
<div class="table-responsive">
    <table class="table align-middle mb-0 table-hover">
        <thead class="table-light">
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Patiente</th>
                <th>Motif</th>
                <th>Diagnostic</th>
                <th>Poids</th>
                <th>Tension</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultations as $consultation)
            <tr>
                <td>{{ \Carbon\Carbon::parse($consultation->date_consultation)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($consultation->heure_consultation)->format('H:i') }}</td>
                <td>{{ $consultation->patiente->prenom }} {{ $consultation->patiente->nom }}</td>
                <td>{{ $consultation->motif }}</td>
                <td>{{ $consultation->diagnostic ?? 'Non renseigné' }}</td>
                <td>{{ $consultation->poids ? $consultation->poids . ' kg' : 'N/A' }}</td>
                <td>{{ $consultation->tension ?? 'N/A' }}</td>
                <td>
                     <!-- Voir consultation -->
                    <button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalVoirConsultation{{ $consultation->id }}" title="Voir">
                        <i class="bi bi-eye"></i>
                    </button>
                    <!-- Modifier consultation -->
                    <button class="btn btn-sm btn-outline-warning rounded-pill" data-bs-toggle="modal" data-bs-target="#modalModifierConsultation{{ $consultation->id }}" title="Modifier">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!-- Télécharger PDF -->
                    <a href="{{ route('consultation.download', $consultation->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill" title="Télécharger PDF">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    <!-- Supprimer consultation -->
                    <form action="{{ route('consultation.destroy', $consultation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Supprimer">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
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

<!-- Modal Créer une consultation -->
<div class="modal fade" id="modalCreerConsultation" tabindex="-1" aria-labelledby="modalCreerConsultationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalCreerConsultationLabel" style="color:#fd0d99;">
            <i class="bi bi-file-medical me-2"></i>Créer une consultation
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('consultation.store') }}" method="POST">
          @csrf

          <!-- Sélection de la patiente -->
          <div class="mb-3">
            <label for="patienteConsult" class="form-label">Patiente</label>
            <select class="form-select" id="patienteConsult" name="patiente_id" required>
              <option selected disabled>Choisir une patiente</option>
              @foreach ($patientes as $patiente)
                <option value="{{ $patiente->id }}">{{ $patiente->prenom }} {{ $patiente->nom }}</option>
              @endforeach
            </select>
          </div>

          <!-- Date & Heure -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="date_consultation" class="form-label">Date</label>
              <input type="date" class="form-control" id="date_consultation" name="date_consultation" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="heure_consultation" class="form-label">Heure</label>
              <input type="time" class="form-control" id="heure_consultation" name="heure_consultation" required>
            </div>
          </div>

          <!-- Motif de la consultation -->
          <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <textarea class="form-control" id="motif" name="motif" rows="2" placeholder="Ex : Consultation prénatale"></textarea>
          </div>

          <!-- Diagnostic & Prescription -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="diagnostic" class="form-label">Diagnostic</label>
              <textarea class="form-control" id="diagnostic" name="diagnostic" rows="2"></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="prescription" class="form-label">Prescription</label>
              <textarea class="form-control" id="prescription" name="prescription" rows="2"></textarea>
            </div>
          </div>

          <!-- Poids & Tension -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="poids" class="form-label">Poids (kg)</label>
              <input type="number" step="0.1" class="form-control" id="poids" name="poids">
            </div>
            <div class="col-md-6 mb-3">
              <label for="tension" class="form-label">Tension (mmHg)</label>
              <input type="text" class="form-control" id="tension" name="tension">
            </div>
          </div>

          <!-- Nombre de grossesses & Antécédents -->
          <div class="mb-3">
            <label for="nombre_grossesses" class="form-label">Nombre de grossesses</label>
            <input type="number" class="form-control" id="nombre_grossesses" name="nombre_grossesses">
          </div>

          <div class="mb-3">
            <label for="antecedents" class="form-label">Antécédents médicaux</label>
            <textarea class="form-control" id="antecedents" name="antecedents" rows="2"></textarea>
          </div>

          <!-- Boutons d’action -->
          <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-pink rounded-pill ms-2">Créer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@foreach ($consultations as $consultation)

<!-- Modal Voir Consultation -->
<div class="modal fade" id="modalVoirConsultation{{ $consultation->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">
            <i class="bi bi-file-medical me-2"></i> Consultation - {{ $consultation->date_consultation }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Patiente :</strong> {{ $consultation->patiente->prenom }} {{ $consultation->patiente->nom }}</p>
        <p><strong>Motif :</strong> {{ $consultation->motif }}</p>
        <p><strong>Diagnostic :</strong> {{ $consultation->diagnostic }}</p>
        <p><strong>Prescription :</strong> {{ $consultation->prescription }}</p>
        <p><strong>Poids :</strong> {{ $consultation->poids ?? 'N/A' }} kg</p>
        <p><strong>Tension :</strong> {{ $consultation->tension ?? 'N/A' }} mmHg</p>
        <p><strong>Nombre de grossesses :</strong> {{ $consultation->nombre_grossesses ?? 'N/A' }}</p>
        <p><strong>Antécédents :</strong> {{ $consultation->antecedents ?? 'Non renseigné' }}</p>
        <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($consultations as $consultation)
<!-- Modal Modifier Consultation -->
<div class="modal fade" id="modalModifierConsultation{{ $consultation->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">
            <i class="bi bi-pencil-square me-2"></i> Modifier Consultation - {{ $consultation->patiente->prenom }} {{ $consultation->patiente->nom }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('consultation.update', $consultation->id) }}" method="POST">
          @csrf
          @method('PUT')

          <!-- Date & Heure -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="date_consultation{{ $consultation->id }}" class="form-label">Date</label>
              <input type="date" class="form-control" id="date_consultation{{ $consultation->id }}" name="date_consultation" value="{{ $consultation->date_consultation }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="heure_consultation{{ $consultation->id }}" class="form-label">Heure</label>
              <input type="time" class="form-control" id="heure_consultation{{ $consultation->id }}" name="heure_consultation" value="{{ $consultation->heure_consultation }}" required>
            </div>
          </div>

          <!-- Motif -->
          <div class="mb-3">
            <label for="motif{{ $consultation->id }}" class="form-label">Motif</label>
            <textarea class="form-control" id="motif{{ $consultation->id }}" name="motif">{{ $consultation->motif }}</textarea>
          </div>

          <!-- Diagnostic & Prescription -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="diagnostic{{ $consultation->id }}" class="form-label">Diagnostic</label>
              <textarea class="form-control" id="diagnostic{{ $consultation->id }}" name="diagnostic">{{ $consultation->diagnostic }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="prescription{{ $consultation->id }}" class="form-label">Prescription</label>
              <textarea class="form-control" id="prescription{{ $consultation->id }}" name="prescription">{{ $consultation->prescription }}</textarea>
            </div>
          </div>

          <!-- Poids & Tension -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="poids{{ $consultation->id }}" class="form-label">Poids (kg)</label>
              <input type="number" step="0.1" class="form-control" id="poids{{ $consultation->id }}" name="poids" value="{{ $consultation->poids }}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="tension{{ $consultation->id }}" class="form-label">Tension (mmHg)</label>
              <input type="text" class="form-control" id="tension{{ $consultation->id }}" name="tension" value="{{ $consultation->tension }}">
            </div>
          </div>

          <!-- Nombre de grossesses & Antécédents -->
          <div class="mb-3">
            <label for="nombre_grossesses{{ $consultation->id }}" class="form-label">Nombre de grossesses</label>
            <input type="number" class="form-control" id="nombre_grossesses{{ $consultation->id }}" name="nombre_grossesses" value="{{ $consultation->nombre_grossesses }}">
          </div>

          <div class="mb-3">
            <label for="antecedents{{ $consultation->id }}" class="form-label">Antécédents médicaux</label>
            <textarea class="form-control" id="antecedents{{ $consultation->id }}" name="antecedents">{{ $consultation->antecedents }}</textarea>
          </div>

          <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-warning rounded-pill ms-2">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Modal Notifications -->

<!-- Modal Notifications -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsModalLabel">📢 Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="list-group" id="notificationList">
                    <!-- Notifications injectées dynamiquement par JS -->
                    <div class="list-group-item text-center text-muted py-3 no-notif">
                        <i class="bi bi-info-circle me-2"></i> Aucune notification pour aujourd’hui.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



<!-- modal suivi grossesse medecin -->
<div class="modal fade" id="modalSuiviGrossesse" tabindex="-1" aria-labelledby="modalSuiviGrossesseLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content rounded-4">
        <div class="modal-header d-flex justify-content-between align-items-center">
          <h5 class="modal-title" id="modalSuiviGrossesseLabel">
          <i class="bi bi-heart-pulse me-2"></i>Suivi des grossesses
          </h5>
          <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAjouterGrossesse">
          <i class="bi bi-plus-circle me-1"></i> Ajouter</a>
        </div>
      <div class="modal-body">

        <!-- Tableau des grossesses -->
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
           <thead class="table-light">
  <tr>
    <th>Patiente</th>
    <th>Date début</th>
    <th>DPA</th>
    <th>Semaine</th>
    <th>Dernier suivi</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  @foreach($grossesses as $g)
  <tr>
    <td>{{ $g->patiente->prenom }} {{ $g->patiente->nom }}</td>
    <td>{{ optional($g->date_debut)->format('d/m/Y') ?? '—' }}</td>
    <td>{{ optional($g->dpa)->format('d/m/Y') ?? '—' }}</td>
    <td>
      @php
  $progress = $g->semaine ? min($g->semaine * 2.5, 100) : 0;
@endphp
<div class="progress" style="height: 20px;">
  <div class="progress-bar" role="progressbar"
       style="width: {{ $progress }}%;"
       aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
    {{ $g->semaine ?? '0' }} / 40 sem.
  </div>
</div>
</td>
<td>{{ optional($g->created_at)->format('d/m/Y') ?? '—' }}</td>
<td>
  <a href="#" class="btn btn-sm btn-outline-secondary me-1"
     data-bs-toggle="modal" data-bs-target="#modalVoirGrossesse{{ $g->id }}">
    <i class="bi bi-eye"></i>
  </a>

  <a href="#" class="btn btn-sm btn-outline-primary me-1"
     data-bs-toggle="modal" data-bs-target="#modalEditerGrossesse{{ $g->id }}">
    <i class="bi bi-pencil"></i>
  </a>

  <a href="#" class="btn btn-sm btn-outline-success me-1"
     data-bs-toggle="modal" data-bs-target="#modalUploadEcho{{ $g->id }}">
    <i class="bi bi-upload"></i>
  </a>

  <!-- 🗑️ Bouton suppression -->
  <a href="#" class="btn btn-sm btn-outline-danger"
     data-bs-toggle="modal" data-bs-target="#modalSupprimerGrossesse{{ $g->id }}">
    <i class="bi bi-trash"></i>
  </a>
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



<div class="modal fade" id="modalAjouterGrossesse" tabindex="-1" aria-labelledby="modalAjouterGrossesseLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAjouterGrossesseLabel">
          <i class="bi bi-plus-circle me-2"></i>Ajouter une grossesse
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

     <form method="POST" action="{{ route('grossesses.store') }}">
        @csrf
        <div class="modal-body">
          <!-- Patiente -->
          <div class="mb-3">
            <label for="patiente_id" class="form-label">Patiente</label>
<select name="patiente_id" id="patiente_id" class="form-select" required>
  <option value="">-- Sélectionner une patiente --</option>
  @foreach($patientes as $patiente)
    <option value="{{ $patiente->id }}">
      {{ $patiente->nom }} {{ $patiente->prenom }}
    </option>
  @endforeach
</select>

          </div>

          <!-- Date début -->
          <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début de grossesse</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
          </div>

          <!-- DPA -->
          <div class="mb-3">
            <label for="date_terme" class="form-label">Date prévue d'accouchement (facultatif)</label>
            <input type="date" name="date_terme" id="date_terme" class="form-control">
            <div class="form-text">Laisser vide pour un calcul automatique (280 jours après début)</div>
          </div>

          <!-- Notes -->
          <div class="mb-3">
            <label for="notes_initiales" class="form-label">Observations (facultatif)</label>
            <textarea name="notes_initiales" id="notes_initiales" rows="3" class="form-control"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary rounded-pill">
            <i class="bi bi-check-circle me-1"></i> Enregistrer
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($grossesses as $grossesse)
  <!-- Bouton déclencheur -->
  <a href="#" data-bs-toggle="modal" data-bs-target="#modalVoirGrossesse{{ $grossesse->id }}">
    <i class="bi bi-eye"></i>
  </a>

  <!-- Modal dynamique -->
  <div class="modal fade" id="modalVoirGrossesse{{ $grossesse->id }}" tabindex="-1" aria-labelledby="modalVoirLabel{{ $grossesse->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h5 class="modal-title" id="modalVoirLabel{{ $grossesse->id }}">
            <i class="bi bi-eye me-2"></i>Détails de la grossesse
          </h5>
          <button class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Patiente :</strong> {{ $grossesse->patiente->nom }} {{ $grossesse->patiente->prenom }}</li>
            <li class="list-group-item"><strong>Date début :</strong> {{ optional($grossesse->date_debut)->format('d/m/Y') ?? '—' }}</li>
            <li class="list-group-item"><strong>DPA :</strong> {{ optional($grossesse->date_terme)->format('d/m/Y') ?? '—' }}</li>
            <li class="list-group-item"><strong>Semaine :</strong> {{ $grossesse->date_debut ? \Carbon\Carbon::parse($grossesse->date_debut)->diffInWeeks(now()) : '—' }}</li>
            <li class="list-group-item"><strong>Dernier suivi :</strong> {{ optional($grossesse->created_at)->format('d/m/Y') ?? '—' }}</li>
            @php
  $etat = $grossesse->etat_grossesse;
  $couleur = match($etat) {
      'En cours'   => 'primary',
      'À terme'    => 'success',
      'Dépassée'   => 'danger',
      'Inconnue'   => 'secondary',
      default      => 'secondary',
  };
@endphp

        <li class="list-group-item">
           <strong>État :</strong>
             <span class="badge bg-{{ $couleur }} ms-2">{{ $etat }}</span>
        </li>
            <li class="list-group-item"><strong>Notes :</strong> {{ $grossesse->notes_initiales ?? '—' }}</li>
            <h5 class="mt-4"><i class="bi bi-image me-2"></i>Échographies</h5>

@forelse($grossesse->echographies as $echo)
  <div class="border rounded p-2 mb-2 d-flex align-items-start">
    @php
      $isImage = Str::endsWith($echo->fichier, ['jpg', 'jpeg', 'png']);
    @endphp

    @if($isImage)
      <img src="{{ asset('storage/' . $echo->fichier) }}" alt="Échographie" width="100" class="me-3 rounded">
    @else
      <i class="bi bi-file-earmark-pdf fs-1 text-danger me-3"></i>
    @endif

    <div class="flex-grow-1">
      <p class="mb-1"><strong>{{ $echo->titre }}</strong></p>
      <p class="mb-1 text-muted">📅 Examen : {{ \Carbon\Carbon::parse($echo->date_examen)->format('d/m/Y') }}</p>
      <p class="mb-1">📝 {{ $echo->observation ?? '—' }}</p>
      <a href="{{ asset('storage/' . $echo->fichier) }}" target="_blank" class="btn btn-sm btn-outline-primary">
        <i class="bi bi-download me-1"></i> Voir / Télécharger
      </a>
    </div>
  </div>
@empty
  <div class="text-muted">Aucune échographie enregistrée pour cette grossesse.</div>
@endforelse

          </ul>
        </div>
      </div>
    </div>
  </div>
@endforeach



@foreach($grossesses as $g)
  <!-- Ligne tableau -->

  <!-- Boutons -->
  <td>
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditerGrossesse{{ $g->id }}">
      <i class="bi bi-pencil"></i>
    </a>
  </td>

  <!-- Modale Modifier Grossesse -->
  <div class="modal fade" id="modalEditerGrossesse{{ $g->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-pencil me-2"></i>Modifier la grossesse</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form method="POST" action="{{ route('grossesses.update', $g->id) }}">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Date début</label>
<input type="date" class="form-control" name="date_debut" id="date_debut_edit" value="{{ optional(\Carbon\Carbon::parse($grossesse->dpa))->format('Y-m-d') }}" required>

            </div>
            <div class="mb-3">
              <label class="form-label">Date prévue d'accouchement</label>
            <input type="date" name="date_terme" value="{{ $g->date_terme ? \Carbon\Carbon::parse($g->date_terme)->format('Y-m-d') : '' }}" class="form-control">

            </div>
            <div class="mb-3">
              <label class="form-label">Notes médicales</label>
              <textarea name="notes" class="form-control" rows="3">{{ $g->notes_initiales }}</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Enregistrer</button>
            <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach


@foreach($grossesses as $g)
<tr>
  <!-- Infos grossesse -->

  <!-- Bouton upload échographie -->
  <td>
    <a href="#" class="btn btn-sm btn-outline-success me-1"
       data-bs-toggle="modal" data-bs-target="#modalUploadEcho{{ $g->id }}">
      <i class="bi bi-upload"></i>
    </a>
  </td>
</tr>

<!-- 🔽 Modale d'envoi échographie -->
<div class="modal fade" id="modalUploadEcho{{ $g->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-upload me-2 text-success"></i>Envoyer une échographie
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="{{ route('echographies.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="grossesse_id" value="{{ $g->id }}">

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Type / titre</label>
            <input type="text" name="titre" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Date d'examen</label>
            <input type="date" name="date_examen" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Fichier (JPG, PNG, PDF)</label>
            <input type="file" name="fichier" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Observation</label>
            <textarea name="observation" class="form-control" rows="2"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-cloud-upload me-1"></i> Envoyer
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach



@foreach($grossesses as $g)
<tr>
  <!-- Colonnes + boutons -->
  <td>
    <!-- Bouton Supprimer -->
    <a href="#" class="btn btn-sm btn-outline-danger"
       data-bs-toggle="modal" data-bs-target="#modalSupprimerGrossesse{{ $g->id }}">
      <i class="bi bi-trash"></i>
    </a>
  </td>
</tr>


<!-- Modale de suppression -->
<div class="modal fade" id="modalSupprimerGrossesse{{ $g->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $g->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel{{ $g->id }}">
          <i class="bi bi-trash3 text-danger me-2"></i>Confirmer la suppression
        </h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Supprimer la grossesse de <strong>{{ $g->patiente->nom }} {{ $g->patiente->prenom }}</strong> ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('grossesses.destroy', $g->id) }}">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">
            <i class="bi bi-trash me-1"></i> Supprimer
          </button>
        </form>
        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
@endforeach


<!-- modal suivi grossesse medecin -->
<script>
    window.medecinRendezVousData = @json($rendezvous ?? []);
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const notifContainer = document.getElementById('notificationList');
    const modal = document.getElementById('notificationsModal');

    modal.addEventListener('show.bs.modal', function () {
        notifContainer.innerHTML = '';

        const today = new Date().toISOString().split('T')[0];

        if (window.medecinRendezVousData) {
            window.medecinRendezVousData.forEach(rdv => {
                const rdvDate = new Date(rdv.date_heure).toISOString().split('T')[0];

                if (rdvDate === today && rdv.statut === 'en_attente') {
                    const notif = document.createElement('div');
                    notif.className = 'list-group-item d-flex justify-content-between align-items-center';

                    notif.innerHTML = `
                        <div>
                            <span class="fw-bold">Nouveau Rendez-vous</span> - Patiente : ${rdv.patiente.nom}<br>
                            Motif : ${rdv.motif}
                        </div>
                        <small class="text-muted">${new Date(rdv.created_at).toLocaleString()}</small>
                    `;

                    notifContainer.appendChild(notif);
                }
            });
        }

        // S'il n'y a pas de notifications
        if (notifContainer.children.length === 0) {
            notifContainer.innerHTML = `
                <div class="list-group-item text-center text-muted py-3">
                    <i class="bi bi-info-circle me-2"></i> Aucune notification pour aujourd’hui.
                </div>
            `;
        }
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const badge = document.getElementById('notif-badge-medecin');
    const today = new Date().toISOString().split('T')[0];
    let totalNotif = 0;

    if (window.medecinRendezVousData) {
        window.medecinRendezVousData.forEach(rdv => {
            const rdvDate = new Date(rdv.date_heure).toISOString().split('T')[0];

            if (rdv.statut === 'en_attente' && rdvDate === today) {
                totalNotif++;
            }
        });
    }

    if (totalNotif > 0) {
        badge.textContent = totalNotif;
        badge.classList.remove('d-none');
        badge.classList.remove('bg-secondary');
        badge.classList.add('bg-danger');
    } else {
        badge.textContent = 0;
        badge.classList.remove('bg-danger');
        badge.classList.add('bg-secondary');
        badge.classList.remove('d-none'); // ou laisse hidden si tu veux l’effacer totalement
    }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const notifContainer = document.getElementById('notificationList');
    const modal = document.getElementById('notificationsModal');

    modal.addEventListener('show.bs.modal', function () {
        notifContainer.innerHTML = '';

        const today = new Date().toISOString().split('T')[0];
        let hasNotif = false;

        if (window.medecinRendezVousData) {
            window.medecinRendezVousData.forEach(rdv => {
                const rdvDate = new Date(rdv.date_heure).toISOString().split('T')[0];

                if (rdv.statut === 'en_attente' && rdvDate === today) {
                    const notif = document.createElement('div');
                    notif.className = 'list-group-item d-flex justify-content-between align-items-center notification-item';

                    notif.innerHTML = `
                        <div>
                            <span class="fw-bold">Nouveau Rendez-vous</span> - Patiente : ${rdv.patiente.nom}<br>
                            Motif : ${rdv.motif}
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <small class="text-muted">${new Date(rdv.created_at).toLocaleString()}</small>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-1 delete-notif" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    `;

                    notifContainer.appendChild(notif);
                    hasNotif = true;
                }
            });
        }

        if (!hasNotif) {
            notifContainer.innerHTML = `
                <div class="list-group-item text-center text-muted py-3 no-notif">
                    <i class="bi bi-info-circle me-2"></i> Aucune notification pour aujourd’hui.
                </div>`;
        }
    });

    // ✂️ Suppression dynamique au clic
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.delete-notif');
        if (btn) {
            const notifItem = btn.closest('.notification-item');
            notifItem.remove();

            // Vérifie s’il reste des notifications
            const remaining = document.querySelectorAll('.notification-item').length;
            if (remaining === 0) {
                notifContainer.innerHTML = `
                    <div class="list-group-item text-center text-muted py-3 no-notif">
                        <i class="bi bi-info-circle me-2"></i> Aucune notification pour aujourd’hui.
                    </div>`;
            }
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const badge = document.getElementById('notif-badge-medecin');
    const modal = document.getElementById('notificationsModal');

    // Affiche le badge uniquement si valeur > 0
    if (badge && badge.textContent.trim() !== "0") {
        badge.classList.remove('d-none');
    }

    // Quand on ouvre le modal, reset le badge
    if (modal && badge) {
        modal.addEventListener('show.bs.modal', function () {
            badge.textContent = '0';
            badge.classList.add('d-none');
        });
    }
});
</script>

<!-- script de filtrage rendez vous-->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const rechercheInput = document.getElementById('rechercheRendezVousMedecin');
    const filtreStatut = document.getElementById('filtreStatutMedecin');
    const boutonAujourdhui = document.getElementById('filtrerAujourdhuiMedecin');
    const lignes = document.querySelectorAll('#tableRendezVousMedecin tbody tr');

    function filtrerTable() {
        const recherche = rechercheInput.value.toLowerCase();
        const statut = filtreStatut.value.toLowerCase();

        lignes.forEach(function (ligne) {
            const texte = ligne.textContent.toLowerCase();
            const ligneStatut = ligne.querySelector('td:nth-child(5)').textContent.toLowerCase();

            const correspondRecherche = texte.includes(recherche);
            const correspondStatut = !statut || ligneStatut.includes(statut);

            ligne.style.display = (correspondRecherche && correspondStatut) ? '' : 'none';
        });
    }

    function filtrerAujourdhui() {
        const aujourdHui = new Date().toLocaleDateString('fr-FR'); // format DD/MM/YYYY

        lignes.forEach(function (ligne) {
            const dateTexte = ligne.querySelector('td:nth-child(1)').textContent.trim();
            ligne.style.display = (dateTexte === aujourdHui) ? '' : 'none';
        });
    }

    rechercheInput.addEventListener('keyup', filtrerTable);
    filtreStatut.addEventListener('change', filtrerTable);
    boutonAujourdhui.addEventListener('click', filtrerAujourdhui);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rechercheInput = document.getElementById('rechercheModalRendezVous');
    const filtreStatut = document.getElementById('filtreStatutModal');
    const boutonAujourdhui = document.getElementById('filtrerAujourdhuiModal');
    const lignes = document.querySelectorAll('#tableModalRendezVous tbody tr');

    function filtrerTable() {
        const recherche = rechercheInput.value.toLowerCase();
        const statut = filtreStatut.value.toLowerCase();

        lignes.forEach(function (ligne) {
            const texte = ligne.textContent.toLowerCase();
            const ligneStatut = ligne.querySelector('td:nth-child(5)').textContent.toLowerCase();

            const correspondRecherche = texte.includes(recherche);
            const correspondStatut = !statut || ligneStatut.includes(statut);

            ligne.style.display = (correspondRecherche && correspondStatut) ? '' : 'none';
        });
    }

    function filtrerAujourdhui() {
        const aujourdHui = new Date().toLocaleDateString('fr-FR'); // format DD/MM/YYYY

        lignes.forEach(function (ligne) {
            const dateTexte = ligne.querySelector('td:nth-child(1)').textContent.trim();
            ligne.style.display = (dateTexte === aujourdHui) ? '' : 'none';
        });
    }

    rechercheInput.addEventListener('keyup', filtrerTable);
    filtreStatut.addEventListener('change', filtrerTable);
    boutonAujourdhui.addEventListener('click', filtrerAujourdhui);
});
</script>


</body>

</html>
