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
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalRendezVous">
                            <i class="bi bi-calendar-check me-2"></i>
                            Mes rendez-vous
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                       <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalPatientes">
                            <i class="bi bi-person-lines-fill me-2"></i>
                            Mes patientes
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                       <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalDossiers">
                            <i class="bi bi-folder2-open me-2"></i>
                            Dossiers médicaux
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#modalOrdonnances">
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
                <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Historique des rendez-vous</h5>
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
                    <tr>
                        <td>Fatou Ndiaye</td>
                        <td>10/04/2024</td>
                        <td>05/06/2025</td>
                        <td>Fer + Vitamines</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-file-earmark-pdf"></i> 2</a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Awa Diop</td>
                        <td>22/08/2023</td>
                        <td>01/06/2025</td>
                        <td>Repos</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-file-earmark-pdf"></i> 1</a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Marie Sarr</td>
                        <td>15/01/2025</td>
                        <td>15/05/2025</td>
                        <td>Suivi grossesse</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="bi bi-file-earmark-pdf"></i> 3</a>
                        </td>
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
        <form>
          <div class="mb-3">
            <label for="patiente" class="form-label">Patiente</label>
            <select class="form-select" id="patiente" required>
              <option selected disabled>Choisir une patiente</option>
              <option>Fatou Ndiaye</option>
              <option>Awa Diop</option>
              <option>Marie Sarr</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="traitement" class="form-label">Traitement en cours</label>
            <input type="text" class="form-control" id="traitement" placeholder="Ex : Fer + Vitamines">
          </div>
          <div class="mb-3">
            <label for="documents" class="form-label">Ajouter des documents</label>
            <input class="form-control" type="file" id="documents" multiple>
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
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Patiente</th>
                        <th>Date</th>
                        <th>Médicaments</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fatou Ndiaye</td>
                        <td>08/06/2025</td>
                        <td>Fer, Vitamine B9</td>
                        <td><span class="badge bg-success">Envoyée</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill" title="Télécharger"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Awa Diop</td>
                        <td>05/06/2025</td>
                        <td>Paracétamol</td>
                        <td><span class="badge bg-secondary">Brouillon</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill" title="Voir"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill" title="Télécharger"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
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
        <form>
          <div class="mb-3">
            <label for="patienteOrd" class="form-label">Patiente</label>
            <select class="form-select" id="patienteOrd" required>
              <option selected disabled>Choisir une patiente</option>
              <option>Fatou Ndiaye</option>
              <option>Awa Diop</option>
              <option>Marie Sarr</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="medicaments" class="form-label">Médicaments</label>
            <textarea class="form-control" id="medicaments" rows="3" placeholder="Ex : Fer 1cp/j, Vitamine B9 1cp/j"></textarea>
          </div>
          <div class="mb-3">
            <label for="instructions" class="form-label">Instructions complémentaires</label>
            <textarea class="form-control" id="instructions" rows="2" placeholder="Ex : Prendre après le repas"></textarea>
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
                <p><strong>Statut :</strong> {{ $patiente->rendezvous->first()->statut }}</p>
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
</body>
</html>
