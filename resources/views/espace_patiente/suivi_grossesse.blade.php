<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_patiente\suivi_grossesse.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de grossesse - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
    <style>
        body { background: #f8fafc; }
        .card-main {
            background: linear-gradient(90deg, #fde6f2 60%, #fff 100%);
            border-left: 6px solid #fd0d99;
        }
        .timeline {
            border-left: 3px solid #fd0d99;
            margin-left: 1.2rem;
        }
        .timeline-dot {
            position: absolute;
            left: -1.35rem;
            top: 0.3rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #fd0d99;
            border: 3px solid #fff;
            box-shadow: 0 0 0 2px #fd0d99;
        }
        .bg-pink { background: #fd0d99 !important; }
        .ventre-anim { transition: rx 1s, ry 1s; }
        .hover-shadow:hover {
            box-shadow: 0 0 0 4px #fd0d9922, 0 4px 24px #fd0d9933 !important;
            transform: translateY(-2px) scale(1.02);
        }
    </style>
</head>
<body>
@php
    // Simulation de la semaine courante
    $semaine = 22;
    if ($semaine <= 12) $trimestreActuel = 1;
    elseif ($semaine <= 26) $trimestreActuel = 2;
    elseif ($semaine <= 40) $trimestreActuel = 3;
    else $trimestreActuel = 4;
@endphp
<div class="container py-4">
    <!-- En-tête -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow card-main">
        <div>
            <h2 class="fw-bold mb-2" style="color:#fd0d99;">
                <i class="bi bi-heart-pulse me-2"></i>Suivi de grossesse
            </h2>
            <div class="d-flex gap-2 flex-wrap">
                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                    Date de début : <strong>01/01/2025</strong>
                </span>
                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                    Semaine : <strong id="semaine-grossesse">{{ $semaine }}</strong>/40
                </span>
                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                    DPA : <strong>15/09/2025</strong>
                </span>
                <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                    Groupe sanguin : <strong>A+</strong>
                </span>
            </div>
        </div>
        <div class="mt-3 mt-md-0">
            <i class="bi bi-calendar-event" style="color:#fd0d99; font-size:1.4rem;"></i>
            <span class="fw-semibold" style="color:#fd0d99;">
                {{ \Carbon\Carbon::now()->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
            </span>
        </div>
    </div>

    <!-- Animation silhouette -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 hover-shadow">
        <div class="card-body text-center">
            <h5 class="fw-bold mb-3" style="color:#fd0d99;">Évolution du ventre</h5>
            <div class="d-flex flex-column align-items-center">
                <svg id="silhouette-svg" width="120" height="220" viewBox="0 0 120 220">
                    <!-- Corps -->
                    <ellipse cx="60" cy="110" rx="38" ry="90" fill="#fde6f2"/>
                    <!-- Ventre (cercle qui grossit) -->
                    <ellipse id="ventre-svg" class="ventre-anim" cx="60" cy="150" rx="22" ry="14" fill="#fd0d99" opacity="0.8"/>
                    <!-- Tête -->
                    <ellipse cx="60" cy="40" rx="18" ry="18" fill="#fd0d99"/>
                </svg>
                <div class="mt-3 small text-muted">
                    Semaine <span id="semaine-grossesse-anim">{{ $semaine }}</span> sur 40 &mdash; Taille estimée : <span id="bebe-taille">28</span> cm
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers examens et conseils -->
    <div class="row mb-4">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-shadow">
                <div class="card-body">
                    <h5 class="fw-bold mb-3" style="color:#fd0d99;">Derniers examens</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Échographie du 10/05/2025 : <span class="text-success">Normale</span></li>
                        <li class="list-group-item">Analyse sanguine du 02/05/2025 : <span class="text-success">OK</span></li>
                        <li class="list-group-item">Tension artérielle : <span class="text-success">12/8</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-shadow">
                <div class="card-body">
                    <h5 class="fw-bold mb-3" style="color:#fd0d99;">Conseils personnalisés</h5>
                    <ul>
                        <li>Continuez à bien vous hydrater et à manger équilibré.</li>
                        <li>Respectez vos rendez-vous de suivi prénatal.</li>
                        <li>En cas de douleur ou de symptôme inhabituel, contactez votre médecin.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des consultations prénatales -->
    <div class="card shadow border-0 rounded-4 mb-4 hover-shadow">
        <div class="card-header bg-white border-0 rounded-top-4">
            <h5 class="mb-0 fw-bold" style="color:#fd0d99;">Consultations prénatales</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Médecin</th>
                            <th>Compte rendu</th>
                            <th>Ordonnance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/06/2025</td>
                            <td>Dr. Faye</td>
                            <td>Suivi normal, aucun souci détecté.</td>
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

    <!-- Accordion des étapes de la grossesse -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 hover-shadow">
        <div class="card-body">
            <h5 class="fw-bold mb-4" style="color:#fd0d99;">Étapes de la grossesse</h5>
            <div class="accordion" id="accordionGrossesse">
                <!-- 1er trimestre -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bold {{ $trimestreActuel == 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                            aria-expanded="{{ $trimestreActuel == 1 ? 'true' : 'false' }}" aria-controls="collapseOne"
                            style="color:#fd0d99; background:#fde6f2;">
                            1er trimestre (Semaines 1-12)
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse {{ $trimestreActuel == 1 ? 'show' : '' }}" aria-labelledby="headingOne" data-bs-parent="#accordionGrossesse">
                        <div class="accordion-body">
                            Début de grossesse, premières échographies, déclaration.
                        </div>
                    </div>
                </div>
                <!-- 2ème trimestre -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button fw-bold {{ $trimestreActuel == 2 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                            aria-expanded="{{ $trimestreActuel == 2 ? 'true' : 'false' }}" aria-controls="collapseTwo"
                            style="color:#fd0d99; background:#fde6f2;">
                            2ème trimestre (Semaines 13-26)
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse {{ $trimestreActuel == 2 ? 'show' : '' }}" aria-labelledby="headingTwo" data-bs-parent="#accordionGrossesse">
                        <div class="accordion-body">
                            Suivi mensuel, échographie morphologique, analyses sanguines.
                        </div>
                    </div>
                </div>
                <!-- 3ème trimestre -->
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button fw-bold {{ $trimestreActuel == 3 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                            aria-expanded="{{ $trimestreActuel == 3 ? 'true' : 'false' }}" aria-controls="collapseThree"
                            style="color:#fd0d99; background:#fde6f2;">
                            3ème trimestre (Semaines 27-40)
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse {{ $trimestreActuel == 3 ? 'show' : '' }}" aria-labelledby="headingThree" data-bs-parent="#accordionGrossesse">
                        <div class="accordion-body">
                            Préparation à l’accouchement, dernières consultations, monitoring.
                        </div>
                    </div>
                </div>
                <!-- Accouchement -->
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button fw-bold {{ $trimestreActuel == 4 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                            aria-expanded="{{ $trimestreActuel == 4 ? 'true' : 'false' }}" aria-controls="collapseFour"
                            style="color:#fd0d99; background:#fde6f2;">
                            Accouchement
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse {{ $trimestreActuel == 4 ? 'show' : '' }}" aria-labelledby="headingFour" data-bs-parent="#accordionGrossesse">
                        <div class="accordion-body">
                            Naissance du bébé, suivi postnatal.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/app.js')
<script>
    // Animation ventre selon la semaine
    let semaine = {{ $semaine }};
    let tailles = [
        0.1, 0.2, 0.4, 0.6, 0.8, 1.0, 1.2, 1.5, 2.0, 2.5, 3.0, 4.0, 5.5, 7.0, 8.7, 10.1, 11.6, 13.0, 14.2, 16.4,
        18.0, 20.0, 22.0, 25.0, 28.0, 30.0, 32.0, 34.0, 36.0, 38.0, 40.0, 42.0, 44.0, 46.0, 48.0, 50.0, 51.0, 52.0, 53.0, 54.0
    ];
    let taille = tailles[semaine-1] ?? 0.1;
    document.getElementById('semaine-grossesse').textContent = semaine;
    document.getElementById('semaine-grossesse-anim').textContent = semaine;
    document.getElementById('bebe-taille').textContent = taille;
    // Animation SVG ventre
    let rx = 12 + (semaine/40)*18; // de 12 à 30
    let ry = 8 + (semaine/40)*14;  // de 8 à 22
    let ventre = document.getElementById('ventre-svg');
    ventre.setAttribute('rx', rx);
    ventre.setAttribute('ry', ry);
</script>
</body>
</html>
