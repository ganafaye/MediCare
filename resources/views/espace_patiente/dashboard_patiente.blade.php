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
                        <a class="nav-link" href="#">
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
            <button class="btn btn-outline-pink d-md-none mb-3 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarPatiente" aria-controls="sidebarPatiente">
                <i class="bi bi-list" style="font-size: 1.8rem;"></i>
            </button>
            <main class="px-3 px-md-5 py-4 ms-md-0">
                <h2 class="fw-bold mb-4" style="color:#fd0d99;">Tableau de bord Patiente</h2>

                <!-- En-tête stylisé -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow" style="background: linear-gradient(90deg, #fde6f2 60%, #fff 100%); border-left: 6px solid #fd0d99;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-white shadow" style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-person-circle" style="font-size:2.5rem; color:#fd0d99;"></i>
                        </div>
                        <div>
                            <span class="fw-bold fs-5" style="color:#fd0d99;">
                                {{ Auth::user()->name ?? 'Patiente' }}
                            </span>
                            <div class="d-flex gap-2 mt-1">
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Âge : {{ Auth::user()->age ?? '--' }} ans
                                </span>
                                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                                    Groupe sanguin : {{ Auth::user()->groupe_sanguin ?? '--' }}
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
                                            <!-- Exemple de ligne -->
                                            <tr>
                                                <td>10/06/2025</td>
                                                <td>10:00</td>
                                                <td>Dr. Faye</td>
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
                            <!-- Exemple statique, à remplacer par une boucle dynamique -->
                            <tr>
                                <td>12/06/2025</td>
                                <td>09:00</td>
                                <td>Dr. Faye</td>
                                <td>Consultation prénatale</td>
                                <td><span class="badge bg-success">Confirmé</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-x"></i></button>
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
        <form>
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" required>
          </div>
          <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" class="form-control" id="heure" required>
          </div>
          <div class="mb-3">
            <label for="medecin" class="form-label">Médecin</label>
            <select class="form-select" id="medecin" required>
              <option value="">Choisir...</option>
              <option>Dr. Faye</option>
              <option>Dr. Diop</option>
              <!-- ... -->
            </select>
          </div>
          <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <input type="text" class="form-control" id="motif" required>
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
                            <!-- Exemple statique, à remplacer par une boucle dynamique -->
                            <tr>
                                <td>10/06/2025</td>
                                <td>Dr. Faye</td>
                                <td>Consultation prénatale</td>
                                <td>Tout va bien, suivi normal.</td>
                                <td>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
                                    </a>
                                </td>
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
                    <tr>
                        <td>12/06/2025</td>
                        <td>Ordonnance</td>
                        <td>Prescription suite à consultation</td>
                        <td>
                            <span class="badge bg-secondary">ordonnance_120625.pdf</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">
                                <i class="bi bi-file-earmark-arrow-down"></i> Télécharger
                            </a>
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
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item"><strong>Nom :</strong> {{ Auth::user()->name ?? '--' }}</li>
          <li class="list-group-item"><strong>Email :</strong> {{ Auth::user()->email ?? '--' }}</li>
          <li class="list-group-item"><strong>Âge :</strong> {{ Auth::user()->age ?? '--' }} ans</li>
          <li class="list-group-item"><strong>Téléphone :</strong> {{ Auth::user()->telephone ?? '--' }}</li>
          <li class="list-group-item"><strong>Adresse :</strong> {{ Auth::user()->adresse ?? '--' }}</li>
          <li class="list-group-item"><strong>Groupe sanguin :</strong> {{ Auth::user()->groupe_sanguin ?? '--' }}</li>
        </ul>
        <div class="text-end">
          <a href="#" class="btn btn-pink rounded-pill">Modifier mes infos</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Dossier médical -->
<div class="modal fade" id="modalDossierMedical" tabindex="-1" aria-labelledby="modalDossierMedicalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDossierMedicalLabel">
            <i class="bi bi-folder2-open me-2"></i>Dossier médical
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item"><strong>ID Dossier :</strong> {{ $dossier->id ?? '--' }}</li>
          <li class="list-group-item"><strong>Date de création :</strong> {{ $dossier->date_creation ?? '--' }}</li>
          <li class="list-group-item"><strong>Antécédents :</strong> {{ $dossier->antecedant ?? '--' }}</li>
          <li class="list-group-item"><strong>Traitement :</strong> {{ $dossier->traitement ?? '--' }}</li>
          <li class="list-group-item"><strong>Documents :</strong>
            @if(isset($dossier->documents) && count($dossier->documents))
                <ul class="mb-0">
                  @foreach($dossier->documents as $doc)
                    <li>
                      <a href="{{ asset('storage/'.$doc->chemin) }}" target="_blank">
                        {{ $doc->nom }}
                      </a>
                    </li>
                  @endforeach
                </ul>
            @else
                Aucun document.
            @endif
          </li>
        </ul>
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
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>
</html>
