<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Patiente - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">

</head>
<body style="background: #f8fafc; min-height:100vh;">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <nav class="col-12 col-md-3 col-lg-2 bg-white sidebar shadow-sm py-3 px-0 offcanvas-md offcanvas-start vh-100" tabindex="-1" id="sidebarPatiente">
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
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalGestionRdv">
                            <i class="bi bi-calendar-check me-2"></i>
                            Mes rendez-vous
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalConsultations">
                            <i class="bi bi-file-medical me-2"></i>
                            Mes consultations
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('suivi_grossesse') }}">
                            <i class="bi bi-heart-pulse me-2"></i>
                            Suivre ma grossesse
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalDocuments">
                            <i class="bi bi-file-earmark-medical me-2"></i>
                            Mes documents
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-circle me-2"></i>
                            Mes informations
                        </a>
                    </li>
                    <li class="nav-item mb-2">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">
        <i class="bi bi-bell me-2"></i>
        Notifications
    </a>
</li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalDossierMedical">
                            <i class="bi bi-folder2-open me-2"></i>
                                 Dossier médical
                        </a>
                    </li>
                     <li class="nav-item mt-4">
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link text-danger"
                style="border: none; background: none; cursor: pointer;"
                onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
            <i class="bi bi-box-arrow-right me-2"></i>
            Déconnexion
        </button>
    </form>
</li>
                </ul>
            </div>
        </nav>
        <!-- Contenu principal -->
        <div class="col px-0">
            <!-- Bouton menu mobile -->
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarPatiente" aria-controls="sidebarPatiente">
                <i class="bi bi-list" style="font-size: 1.8rem;"></i>
            </button>
            <main class="px-3 px-md-5 py-4 ms-md-0">
                @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
                <h2 class="fw-bold mb-4" style="color:#fd0d99;"></h2>

                <!-- En-tête stylisé -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" style="background: linear-gradient(90deg, #fde6f2 60%, #fff 100%); border-left: 6px solid #fd0d99;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-white shadow" style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-person-circle" style="font-size:2.5rem; color:#fd0d99;"></i>
                        </div>
                        <div>
                            @php
                                use Carbon\Carbon;
                                $user = Auth::guard('patiente')->user();
                                $age = $user && $user->date_naissance ? Carbon::parse($user->date_naissance)->age : null;
                            @endphp

                            @if($user)
                                <span class="fw-bold fs-5" style="color:#fd0d99;">
                                    {{ $user->prenom ?? '' }} {{ $user->nom ?? 'Patiente' }}
                                </span>
                                <div class="d-flex gap-2 mt-1">
                                    <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                        Âge : {{ $age !== null ? $age : '--' }} ans
                                    </span>
                                    <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                        Groupe sanguin : {{ $user->groupe_sanguin ?? '--' }}
                                    </span>
                                </div>
                            @endif
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
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes rendez-vous</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalGestionRdv" class="btn btn-pink btn-sm rounded-pill px-4 shadow">Voir mes rendez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-file-medical mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes consultations</h5>
                                <p class="fw-bold fs-4 mb-2">--</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalConsultations" class="btn btn-pink btn-sm rounded-pill px-4 shadow">Voir mes consultations</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-heart-pulse mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Suivi de grossesse</h5>
                                <a href="{{ route('suivi_grossesse') }}" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow mt-2">Voir mon suivi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-file-earmark-medical mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes documents</h5>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow mt-2"
                                   data-bs-toggle="modal" data-bs-target="#modalDocuments">
                                    Voir mes documents
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-person-circle mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Mes informations</h5>
                                <a href="#" class="btn btn-outline-pink btn-sm rounded-pill px-4 shadow mt-2"
                                   data-bs-toggle="modal" data-bs-target="#modalInfos">
                                    Modifier mes infos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition:box-shadow .2s;">
                            <div class="card-body text-center">
                                <i class="bi bi-bell mb-2" style="font-size:2.5rem; color:#fd0d99;"></i>
                                <h5 class="mt-2 mb-1 fw-bold" style="color:#fd0d99;">Notifications</h5>
                                <p class="text-muted mb-0">Aucun nouveau message</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table stylisée -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Historique de mes rendez-vous</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
    <thead class="table-light">
        <tr>
            <th>Date</th>
            <th>Heure</th>
            <th>Médecin</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rendezvous as $rdv)
            <tr>
                <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
                <td>{{ $rdv->medecin->nom ?? 'Non spécifié' }}</td>
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
                    <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Aucun rendez-vous trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
@vite('resources/js/app.js')

<!-- Ajoute ce style pour l'effet hover sur les cartes -->
<style>
.hover-shadow:hover {
    box-shadow: 0 0 0 4px #fd0d9922, 0 4px 24px #fd0d9933 !important;
    transform: translateY(-2px) scale(1.02);
}
</style>

<!-- Modal Gestion des rendez-vous -->
<div class="modal fade" id="modalGestionRdv" tabindex="-1" aria-labelledby="modalGestionRdvLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGestionRdvLabel">
            <i class="bi bi-calendar-check me-2"></i>Mes rendez-vous
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <!-- Bouton pour ouvrir le sous-modal de prise de rendez-vous -->
        <div class="d-flex justify-content-end mb-3">
            <a href="#" class="btn btn-pink rounded-pill" data-bs-toggle="modal" data-bs-target="#modalRdv" data-bs-dismiss="modal">
                <i class="bi bi-plus-lg me-1"></i>Prendre un rendez-vous
            </a>
        </div>
        <!-- Tableau des rendez-vous -->
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
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
        <td>{{ $rdv->medecin->nom }} - {{ $rdv->medecin->specialite }}</td>
        <td>{{ $rdv->motif }}</td>
        <td>
            @if($rdv->statut == 'confirmé')
                <span class="badge bg-success">Confirmé</span>
            @elseif($rdv->statut == 'en_attente')
                <span class="badge bg-warning text-dark">En attente</span>
            @else
                <span class="badge bg-danger">Annulé</span>
            @endif
        </td>
        <td>
            <button class="btn btn-sm btn-outline-primary rounded-pill"
                    data-bs-toggle="modal"
                    data-bs-target="#modalVoirRendezVous{{ $rdv->id }}"
                    title="Voir">
                <i class="bi bi-eye"></i>
            </button>
            @if($rdv->statut == 'en_attente')
                <form method="POST"  action="{{ route('rendezvous.cancel.patiente', ['id' => $rdv->id]) }}" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Annuler">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
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
</div>

<!-- Modal Prendre un rendez-vous (déjà prêt dans ton code) -->
<div class="modal fade" id="modalRdv" tabindex="-1" aria-labelledby="modalRdvLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRdvLabel">Prendre un rendez-vous</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
       <form  action="{{ route('rendezvous.store') }}" method="POST">
         @csrf
    <div class="mb-3">
        <label for="date_heure" class="form-label">Date et Heure</label>
        <input type="datetime-local" class="form-control" name="date_heure" required>
    </div>
    <div class="mb-3">
        <label for="medecin_id" class="form-label">Médecin</label>
        <select class="form-select" name="medecin_id" required>
            <option value="">Choisir...</option>
            @foreach($medecins as $medecin)
                <option value="{{ $medecin->id }}">{{ $medecin->nom }} - {{ $medecin->specialite }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="motif" class="form-label">Motif</label>
        <input type="text" class="form-control" name="motif" required>
    </div>
    <button type="submit" class="btn btn-pink rounded-pill w-100">Valider</button>
</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Mes consultations -->
<div class="modal fade" id="modalConsultations" tabindex="-1" aria-labelledby="modalConsultationsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConsultationsLabel">
            <i class="bi bi-file-medical me-2"></i>Mes consultations
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Médecin</th>
                                <th>Motif</th>
                                <th>Compte rendu</th>
                                <th>Ordonnance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
<tbody>
    @foreach ($consultations as $consultation)
    <tr>
        <td>{{ \Carbon\Carbon::parse($consultation->date_consultation)->format('d/m/Y') }}</td>
        <td>Dr. {{ $consultation->medecin->nom }}</td>
        <td>{{ $consultation->motif }}</td>
        <td>{{ $consultation->diagnostic ?? 'Non renseigné' }}</td>
        <td>
            <a href="{{ route('consultation.download', $consultation->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
            </a>
        </td>
        <td>
            <button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalVoirConsultation{{ $consultation->id }}">
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
  </div>
</div>

<!-- Modal Mes documents -->
<div class="modal fade" id="modalDocuments" tabindex="-1" aria-labelledby="modalDocumentsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDocumentsLabel">
            <i class="bi bi-file-earmark-medical me-2"></i>Mes documents
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
    <thead class="table-light">
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Description</th>
            <th>Fichier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ordonnances as $ordonnance)
        <tr>
            <td>{{ \Carbon\Carbon::parse($ordonnance->date_prescription)->format('d/m/Y') }}</td>
            <td>Ordonnance</td>
            <td>Prescription de {{ $ordonnance->medecin->nom }}</td>
            <td>
                <span class="badge bg-secondary">Ordonnance_{{ $ordonnance->id }}.pdf</span>
            </td>
            <td>
                <a href="{{ route('ordonnance.download', $ordonnance->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                    <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
                </a>
            </td>
        </tr>
        @endforeach

        @foreach ($factures as $facture)
        <tr>
            <td>{{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}</td>
            <td>Facture</td>
            <td>Facture liée à la consultation du {{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}</td>
            <td>
                <span class="badge bg-secondary">Facture_{{ $facture->id }}.pdf</span>
            </td>
            <td>
                <a href="{{ route('facture.download', $facture->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                    <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
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

<!-- Modal Mes informations -->
<div class="modal fade" id="modalInfos" tabindex="-1" aria-labelledby="modalInfosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInfosLabel">
            <i class="bi bi-person-circle me-2"></i>Mes informations
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
       @php
    $patiente = Auth::guard('patiente')->user();
    $dateNaissance = $patiente->date_naissance ?? null;
    $ageModal = $dateNaissance ? Carbon::parse($dateNaissance)->age : null;
@endphp
<ul class="list-group list-group-flush mb-3">
  <li class="list-group-item"><strong>Nom :</strong> {{ $patiente->nom ?? '--' }}</li>
  <li class="list-group-item"><strong>Prenom :</strong> {{ $patiente->prenom ?? '--' }}</li>
  <li class="list-group-item"><strong>Email :</strong> {{ $patiente->email ?? '--' }}</li>
  <li class="list-group-item"><strong>Âge :</strong> {{ $ageModal !== null ? $ageModal : '--' }} ans</li>
  <li class="list-group-item"><strong>Téléphone :</strong> {{ $patiente->telephone ?? '--' }}</li>
  <li class="list-group-item"><strong>Adresse :</strong> {{ $patiente->adresse ?? '--' }}</li>
  <li class="list-group-item"><strong>Groupe sanguin :</strong> {{ $patiente->groupe_sanguin ?? '--' }}</li>
</ul>
        <div class="text-end">
          <a href="#" class="btn btn-pink rounded-pill">Modifier mes infos</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Dossier Médical -->
<!-- Modal Dossier Médical -->
<div class="modal fade" id="modalDossierMedical" tabindex="-1" aria-labelledby="modalDossierMedicalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <img src="{{ asset('image/logo medecin.png') }}" alt="Logo Clinique" class="me-3" width="50">
          <h5 class="modal-title fw-bold" id="modalDossierMedicalLabel">
            Clinique  MediCare - Dossier Médical
<button class="btn btn-sm btn-outline-success rounded-pill" id="exportDossier"><i class="bi bi-file-image"></i> Télécharger mon dossier </button>
          </h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item"><strong>Nom & Prénom :</strong> {{ $patiente->prenom }} {{ $patiente->nom }}</li>
          <li class="list-group-item"><strong>Âge :</strong> {{ \Carbon\Carbon::parse($patiente->date_naissance)->age }} ans</li>
          <li class="list-group-item"><strong>Groupe sanguin :</strong> {{ $patiente->groupe_sanguin ?? 'Non renseigné' }}</li>
        </ul>

        @if ($dossier)
          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item"><strong>ID Dossier :</strong> {{ $dossier->id ?? '--' }}</li>
            <li class="list-group-item"><strong>Date de création :</strong> {{ $dossier->created_at->format('d/m/Y à H:i') }}</li>
            <li class="list-group-item"><strong>Diagnostic :</strong> {{ $dossier->diagnostic ?? '--' }}</li>
            <li class="list-group-item"><strong>Traitement :</strong> {{ $dossier->traitement ?? 'Non renseigné' }}</li>
            <li class="list-group-item"><strong>Observations :</strong> {{ $dossier->observations ?? 'Non renseigné' }}</li>
            <li class="list-group-item"><strong>Grossesse :</strong>
                <span class="badge bg-{{ isset($dossier->grossesse) && $dossier->grossesse ? 'success' : 'danger' }}">
                    {{ isset($dossier->grossesse) && $dossier->grossesse ? 'Oui' : 'Non' }}
                </span>
            </li>
            <li class="list-group-item"><strong>Documents :</strong>
              @if(isset($dossier->documents) && count($dossier->documents))
                <ul class="mb-0">
                  @foreach($dossier->documents as $doc)
                    <li>
                      <i class="bi bi-file-earmark-pdf text-danger"></i>
                      <a href="{{ asset('storage/'.$doc->chemin) }}" target="_blank">
                        {{ $doc->nom }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              @else
                <span class="text-muted">Aucun document disponible.</span>
              @endif
            </li>
          </ul>
        @else
          <p class="text-muted">Aucun dossier médical disponible.</p>
        @endif
      </div>
    </div>
  </div>
</div>


@foreach($rendezvous as $rdv)
<div class="modal fade" id="modalVoirRendezVous{{ $rdv->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Détails du rendez-vous</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y') }}</p>
        <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</p>
        <p><strong>Médecin :</strong> {{ $rdv->medecin->nom }} - {{ $rdv->medecin->specialite }}</p>
        <p><strong>Motif :</strong> {{ $rdv->motif }}</p>
        <p><strong>Statut :</strong>
            @if($rdv->statut == 'confirmé')
                <span class="badge bg-success">Confirmé</span>
            @elseif($rdv->statut == 'en_attente')
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
<!-- Modal Voir Consultation -->

@foreach ($consultations as $consultation)
<!-- Modal Voir Consultation -->
<div class="modal fade" id="modalVoirConsultation{{ $consultation->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">
            <i class="bi bi-file-medical me-2"></i> Consultation - {{ \Carbon\Carbon::parse($consultation->date_consultation)->format('d/m/Y') }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Médecin :</strong> Dr. {{ $consultation->medecin->nom }}</p>
        <p><strong>Motif :</strong> {{ $consultation->motif }}</p>
        <p><strong>Diagnostic :</strong> {{ $consultation->diagnostic ?? 'Non renseigné' }}</p>
        <p><strong>Prescription :</strong> {{ $consultation->prescription ?? 'Non renseigné' }}</p>
        <p><strong>Poids :</strong> {{ $consultation->poids ? $consultation->poids . ' kg' : 'N/A' }}</p>
        <p><strong>Tension :</strong> {{ $consultation->tension ?? 'N/A' }} mmHg</p>
        <p><strong>Nombre de grossesses :</strong> {{ $consultation->nombre_grossesses ?? 'N/A' }}</p>
        <p><strong>Antécédents médicaux :</strong> {{ $consultation->antecedents ?? 'Non renseigné' }}</p>

        <div class="text-end">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Fermer</button>
            <a href="{{ route('consultation.download', $consultation->id) }}" class="btn btn-pink rounded-pill">
                <i class="bi bi-file-earmark-pdf"></i> Télécharger PDF
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Notifications -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsModalLabel">📢 Vos Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- À placer juste avant </body> -->
<script>
    var botmanWidget = {
    title: 'Assistante MediCare',
    aboutText: 'Assistante MediCare',
    introMessage: "Bonjour ! Je suis l'assistante virtuelle de MediCare. Comment puis-je vous aider aujourd'hui ?",
    mainColor: '#fd0d99',
    bubbleBackground: 'transparent', // Fond de la bulle transparent
    bubbleAvatarUrl: "{{ asset('image/pngegg (9).png') }}", // Ton icône de discussion
    headerTextColor: '#fff',
    headerBackgroundColor: '#fd0d99',
    desktopHeight: 400,
    desktopWidth: 320,
    mobileHeight: 350,
    mobileWidth: '100%',
    placeholderText: "Écrivez votre question ici...",
    sendButtonText: "Envoyer",
    chatBackgroundColor: "#fff",
    fontFamily: "Poppins, Arial, sans-serif"
};
</script>

<script>
document.getElementById("exportDossier").addEventListener("click", function() {
    let dossierMedical = document.getElementById("modalDossierMedical");

    html2canvas(dossierMedical, {
        scale: 3, // 🔥 Augmente la résolution (x3 la qualité normale)
        useCORS: true, // ✅ Active le support des images externes (si besoin)
        allowTaint: true, // ✅ Permet d'inclure des images du domaine
        logging: true, // ✅ Active le debug
        backgroundColor: "#ffffff", // 🔥 Assure un fond blanc au lieu d'un fond transparent
    }).then(canvas => {
        let link = document.createElement("a");
        link.href = canvas.toDataURL("image/png", 1.0); // 🔥 Qualité maximale
        link.download = "dossier_medical_hd.png";
        link.click();
    });
});
</script>


<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>
</html>
