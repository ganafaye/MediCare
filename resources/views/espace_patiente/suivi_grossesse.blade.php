<!-- filepath: c:\Users\Awad\Desktop\Projet soutenance\App_MediCare\medicare\resources\views\espace_patiente\suivi_grossesse.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de grossesse - MediCare</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
    <!-- HEAD : Styles CSS FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">

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

        /* Conteneur principal du calendrier */
#calendarGrossesse {
  font-family: 'Segoe UI', 'Roboto', sans-serif;
  background-color: #fff;
  border-radius: 1rem;
  padding: 1.5rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease-in-out;
  border: 1px solid #f0f0f0;
}

/* 🗓️ Toolbar (mois, flèches) */
.fc .fc-toolbar-title {
  font-size: 1.5rem;
  color: #fd0d99;
  font-weight: 700;
}
.fc-toolbar-chunk button {
  background-color: #fd0d99;
  border: none;
  color: #fff;
  border-radius: 0.5rem;
  padding: 0.4rem 0.9rem;
  font-weight: 500;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  transition: background 0.3s ease;
}
.fc-toolbar-chunk button:hover {
  background-color: #e6007e;
}

/* 📆 Jours */
.fc-daygrid-day {
  background-color: #fafafa;
  transition: background 0.2s ease-in-out;
}
.fc-daygrid-day:hover {
  background-color: #fef0f6;
}
.fc-daygrid-day-number {
  color: #444;
  font-weight: 600;
  font-size: 0.9rem;
  padding: 0.25rem;
}

/* 🩺 Événements */
.fc .fc-event {
  background: linear-gradient(135deg, #ffd6ea, #ffc2dd);
  border: none;
  color: #c30066;
  border-radius: 0.5rem;
  font-size: 0.85rem;
  padding: 0.35rem 0.6rem;
  font-weight: 500;
  transition: transform 0.2s ease, background 0.3s ease;
}
.fc .fc-event:hover {
  background: linear-gradient(135deg, #fbb4db, #f7a9cf);
  transform: scale(1.03);
  cursor: pointer;
}

/* 📌 Sélection jour (clic ou hover) */
.fc-daygrid-day.fc-day-today {
  background-color: #fff0f7;
  border: 1px solid #fd0d99;
}
.pregnancy-progress {
  height: 12px;
  background-color: #e9ecef;
  border-radius: 6px;
  position: relative;
  overflow: visible;
}

.pregnancy-progress .progress-bar {
  background-color: #fd0d99;
  border-radius: 6px;
  position: relative;
  overflow: visible;
}

.pregnancy-progress .dot {
  position: absolute;
  right: 0;
  top: -6px;
  width: 14px;
  height: 14px;
  background-color: white;
  border: 3px solid #fd0d99;
  border-radius: 50%;
}

    </style>
</head>
<body>
<div class="container py-4">
    <!-- En-tête -->
   <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 p-4 rounded-4 shadow card-main">
    <div>
        <h2 class="fw-bold mb-2" style="color:#fd0d99;">
            <i class="bi bi-heart-pulse me-2"></i>Suivre ma grossesse
        </h2>
        <div class="d-flex gap-2 flex-wrap">

            <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                Date de début :
                <strong>{{ optional($grossesse->date_debut)->format('d/m/Y') ?? '—' }}</strong>
            </span>

            <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                Semaine :
                <strong id="semaine-grossesse">{{ $semaine ?? '0' }}</strong>/40
            </span>

            <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                DPA :
                <strong>{{ optional($grossesse->date_terme)->format('d/m/Y') ?? '—' }}</strong>
            </span>

            <span class="badge rounded-pill" style="background:#fd0d991a; color:#fd0d99;">
                Groupe sanguin :
                <strong>{{ $patiente->groupe_sanguin ?? 'Non renseigné' }}</strong>
            </span>

        </div>
    </div>
    <div class="mt-3 mt-md-0">
        <i class="bi bi-calendar-event" style="color:#fd0d99; font-size:1.4rem;"></i>
        <span class="fw-semibold" style="color:#fd0d99;">
            {{ now()->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
        </span>
    </div>
</div>


    <!-- Animation silhouette alignée avec les autres cards -->
   <!-- Évolution de la grossesse -->
@php
    $mois = $semaine ? ceil($semaine / 4) : 1;
    $sa = $sa ?? ($semaine ? $semaine + 2 : 2);
@endphp

<div class="rounded-4 p-4 d-flex flex-column flex-md-row align-items-center justify-content-between"
     style="background-color: #fdeaf1;">

    <!-- Illustration bébé -->
    <div class="mb-4 mb-md-0 text-center">
        <img src="{{ asset('image/mois_grossesse/' . $mois . '_mois.png') }}"
             alt="Illustration mois {{ $mois }}"
             class="img-fluid" style="width: 280px;">
    </div>

    <!-- Infos semaine -->
    <div class="flex-grow-1 ms-md-4">
        <h3 class="fw-bold text-danger mb-3">
            Ma {{ $semaine ?? '—' }}<sup>ᵉ</sup> semaine de grossesse
            ({{ $sa }} sa)
        </h3>

        <!-- Tags -->
        <div class="mb-3 d-flex flex-wrap gap-2">
            <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #d63384;">
                <i class="bi bi-person-heart me-1"></i> MA GROSSESSE
            </span>
            <span class="badge rounded-pill text-dark border border-dark px-3 py-2">
                <i class="bi bi-file-text me-1"></i> ARTICLE
            </span>
            <span class="badge rounded-pill text-dark border border-dark px-3 py-2">
                <i class="bi bi-clock me-1"></i> 3 MINS
            </span>
        </div>

        <!-- Description -->
        <p class="mb-1 fw-semibold">
            Vous êtes à {{ $semaine ?? '—' }} semaines de grossesse.
        </p>

        <ul class="text-muted ps-3 mb-3">
            <li>Il est oxygéné grâce à vous, via votre sang.</li>
            <li>Grand changement pour vous : vous sentez votre bébé bouger !</li>
        </ul>

        <p class="text-muted small">
            Découvrez ce qui vous attend de palpitant maintenant que vous êtes à
            {{ $semaine ?? '—' }} semaines de grossesse,
            soit {{ $sa }} semaines d’aménorrhée.
        </p>

        <!-- Boutons d’action -->
        <div class="d-flex flex-wrap gap-2 mt-3">
            <button class="btn btn-outline-danger rounded-pill">
                <i class="bi bi-heart"></i>
            </button>
            <button class="btn btn-outline-danger rounded-pill">
                <i class="bi bi-share-fill"></i>
            </button>
            <button class="btn btn-danger rounded-pill px-4">
                <i class="bi bi-headphones me-1"></i> Écouter
            </button>
        </div>
    </div>
</div>



<br>
@php
    $totalSemaines = 38;
    $semaine = $semaine ?? 0;
    $pourcentage = round(($semaine / $totalSemaines) * 100);
    $joursRestants = 266 - ($semaine * 7); // basé sur date début estimée
@endphp

<div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white mb-4">
  <h5 class="fw-bold mb-4">Voici où vous en êtes de votre grossesse :</h5>

  <div class="d-flex justify-content-between align-items-center mb-2">
    <span class="fw-bold text-dark">SEMAINE {{ $semaine }}</span>
    <span class="fw-bold text-muted">{{ $totalSemaines }} SEMAINES</span>
  </div>

  <div class="progress pregnancy-progress mb-2"
       role="progressbar"
       aria-valuenow="{{ $pourcentage }}"
       aria-valuemin="0"
       aria-valuemax="100">
    <div class="progress-bar" style="width: {{ $pourcentage }}%">
      <span class="dot"></span>
    </div>
  </div>

  <div class="fw-bold text-dark mb-4">{{ $pourcentage }}%</div>

  <div class="calendar-icon mb-3">
    <i class="bi bi-calendar3 display-6 text-rose"></i>
    <div class="fs-4 fw-bold mt-1">J-{{ $joursRestants }}</div>
  </div>

  <p class="text-muted small">
    Vous ne vous en apercevez pas, mais tout s’agite dans votre ventre !
    Et, vous commencez à vous sentir mieux…
  </p>
</div>

<!-- ✅ Design Amélioré avec Style Moderne et Cohérent -->

<!-- Examens + Conseils -->
<div class="row mb-4">
  <!-- Bloc Examens -->
<div class="col-md-6 mb-3">
  <div class="card border-0 rounded-4 shadow-sm h-100"
       style="background: linear-gradient(to bottom right, #fdeaf4, #ffffff);">
    <div class="card-body">
      <div class="d-flex align-items-center mb-3">
        <div class="bg-white rounded-circle p-2 shadow-sm me-2">
          <i class="bi bi-clipboard2-check text-rose fs-5"></i>
        </div>
        <h6 class="fw-bold text-rose mb-0">Observations échographiques</h6>
      </div>

      <ul class="list-group list-group-flush small">
        @forelse($grossesse->echographies->sortByDesc('date_examen')->take(3) as $echo)
          <li class="list-group-item bg-transparent border-0">
            <div class="fw-semibold text-dark mb-1">
              📅 {{ \Carbon\Carbon::parse($echo->date_examen)->format('d/m/Y') }}

            </div>
            <div class="text-muted">
              {{ $echo->observations ?? 'Aucune observation enregistrée.' }}
            </div>
          </li>
        @empty
          <li class="list-group-item bg-transparent border-0 text-muted fst-italic">
            Aucune échographie enregistrée.
          </li>
        @endforelse
      </ul>
    </div>
  </div>
</div>



  @php
    $conseils = match(true) {
        $semaine < 12 => [
            'Prenez de l’acide folique si ce n’est pas encore fait.',
            'Évitez toute substance toxique (alcool, tabac).',
            'Allez doucement si vous avez des nausées fréquentes.',
        ],
        $semaine < 27 => [
            'Continuez une alimentation équilibrée et riche en fer.',
            'Commencez à préparer vos rendez-vous du 2ᵉ trimestre.',
            'Surveillez vos mouvements fœtaux.',
        ],
        default => [
            'Préparez votre valise pour la maternité.',
            'Dormez sur le côté gauche pour une meilleure circulation.',
            'Discutez de votre plan d’accouchement avec le médecin.',
        ],
    };
@endphp

<!-- Bloc Conseils -->
<div class="col-md-6 mb-3">
  <div class="card border-0 rounded-4 shadow-sm h-100" style="background: linear-gradient(to bottom right, #e6f5f9, #ffffff);">
    <div class="card-body">
      <div class="d-flex align-items-center mb-3">
        <div class="bg-white rounded-circle p-2 shadow-sm me-2">
          <i class="bi bi-chat-left-heart text-rose fs-5"></i>
        </div>
        <h6 class="fw-bold text-rose mb-0">Conseils personnalisés</h6>
      </div>
      <ul class="small mb-0 ps-2">
        @foreach($conseils as $conseil)
          <li class="mb-2">
            <i class="bi bi-check2-circle me-2 text-secondary"></i>{{ $conseil }}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>


<!-- 🗓️ Consultations prénatales -->
<div class="card shadow-sm border-0 rounded-4 mb-4">
  <div class="card-header bg-white border-0 rounded-top-4">
    <h6 class="fw-bold mb-0 text-rose"><i class="bi bi-calendar-check me-1"></i>Consultations prénatales</h6>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table align-middle table-hover mb-0">
        <thead class="table-light text-center">
          <tr>
            <th>Date</th>
            <th>Médecin</th>
            <th>Compte rendu</th>
            <th>Ordonnance</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td>10/06/2025</td>
            <td>Dr. Faye</td>
            <td>Suivi normal, aucun souci détecté.</td>
            <td>
              <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">
                <i class="bi bi-file-earmark-arrow-down me-1"></i>Télécharger
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- 📅 Calendrier Grossesse -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
  <div class="card-header bg-white border-0 rounded-top-4">
    <h6 class="fw-bold text-rose mb-0">
      <i class="bi bi-calendar3-event me-1"></i>Calendrier des échographies
    </h6>
  </div>
  <div class="card-body">
    <div id="calendarGrossesse"></div>
  </div>
</div>

<!-- 🖼️ Échographies -->
<div class="card shadow-sm border-0 rounded-4 mb-4">
  <div class="card-header bg-white border-0 rounded-top-4 d-flex justify-content-between align-items-center">
    <h6 class="fw-bold mb-0 text-rose">
      <i class="bi bi-images me-1"></i>Échographies
    </h6>
  </div>
  <div class="card-body">
  <div class="row g-4">
    @forelse($echographies as $echo)
      <div class="col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
          <div class="card-body text-center">

            {{-- Image (affichage dynamique) --}}
            @php
              $hasImage = $echo->image && file_exists(public_path('storage/' . $echo->image));
              $imgPath = $hasImage
                ? asset('storage/' . $echo->image)
                : asset('image/mois_grossesse/' . ceil($semaine / 4) . '_mois.png');
            @endphp

            <a href="{{ $hasImage ? $imgPath : '#' }}" target="{{ $hasImage ? '_blank' : '_self' }}">
              <img src="{{ $imgPath }}"
                   alt="Échographie"
                   class="img-fluid rounded mb-3"
                   style="max-height:180px;">
            </a>

            {{-- Type + date --}}
            <p class="fw-bold mb-1">{{ $echo->type ?? 'Échographie' }}</p>
            <small class="text-muted mb-2 d-block">
              {{ $echo->date_examen
                  ? \Carbon\Carbon::parse($echo->date_examen)->format('d/m/Y')
                  : 'Date inconnue' }}
            </small>

            {{-- Observation --}}
            @if($echo->observation)
              <p class="text-muted small">{{ $echo->observation }}</p>
            @endif

            {{-- Boutons action --}}

              <div class="d-flex justify-content-center gap-2 mt-2">
                <a href="{{ $imgPath }}" target="_blank"
                   class="btn btn-sm btn-outline-primary rounded-pill">
                  <i class="bi bi-eye me-1"></i>Consulter
                </a>
                <a href="{{ $imgPath }}" download
                   class="btn btn-sm btn-outline-success rounded-pill">
                  <i class="bi bi-download me-1"></i>Télécharger
                </a>
              </div>
          </div>
        </div>
      </div>
    @empty
      <div class="text-muted fst-italic px-3">Aucune échographie enregistrée.</div>
    @endforelse
  </div>
</div>
</div>

<!-- 📋 Étapes de grossesse -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
  <div class="card-body">
    <h5 class="fw-bold text-rose mb-4">
      <i class="bi bi-clock-history me-2"></i>Étapes clés de votre grossesse
    </h5>

    <div class="row g-4">
      <!-- Étape 1 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 position-relative">
          <div class="card-body text-center">
            <div class="bg-light rounded-circle d-inline-block p-3 mb-3">
              <i class="bi bi-calendar2-week-fill fs-3 text-rose"></i>
            </div>
            <h6 class="fw-bold text-rose">1er trimestre</h6>
            <span class="badge bg-secondary mb-2">Semaines 1 - 12</span>
            <p class="small text-muted">Début de grossesse, premières échographies, déclaration.</p>
          </div>
        </div>
      </div>

      <!-- Étape 2 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 position-relative">
          <div class="card-body text-center">
            <div class="bg-light rounded-circle d-inline-block p-3 mb-3">
              <i class="bi bi-clipboard2-pulse-fill fs-3 text-rose"></i>
            </div>
            <h6 class="fw-bold text-rose">2ᵉ trimestre</h6>
            <span class="badge bg-warning mb-2 text-dark">Semaines 13 - 26</span>
            <p class="small text-muted">Suivi mensuel, échographie morphologique, analyses sanguines.</p>
          </div>
        </div>
      </div>

      <!-- Étape 3 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 position-relative">
          <div class="card-body text-center">
            <div class="bg-light rounded-circle d-inline-block p-3 mb-3">
              <i class="bi bi-heart-pulse-fill fs-3 text-rose"></i>
            </div>
            <h6 class="fw-bold text-rose">3ᵉ trimestre</h6>
            <span class="badge bg-danger mb-2">Semaines 27 - 40</span>
            <p class="small text-muted">Préparation à l’accouchement, dernières consultations, monitoring.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@vite('resources/js/app.js')

    </div>
  </div>
</div>
</div>
<script>
  const dateDebutGrossesse = new Date("{{ \Carbon\Carbon::parse($grossesse->date_debut)->format('Y-m-d') }}");
</script>

<!-- JS FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendarGrossesse');

    if (calendarEl && typeof dateDebutGrossesse !== 'undefined') {

      function ajouterSemaines(date, semaines) {
        const copie = new Date(date);
        copie.setDate(copie.getDate() + semaines * 7);
        return copie.toISOString().slice(0, 10);
      }

      const events = [
        {
          title: '🩺 Échographie 1er trimestre',
          start: ajouterSemaines(dateDebutGrossesse, 12),
          url: '#'
        },
        {
          title: '🧠 Écho morphologique',
          start: ajouterSemaines(dateDebutGrossesse, 22),
          url: '#'
        },
        {
          title: '🧸 Écho 3ᵉ trimestre',
          start: ajouterSemaines(dateDebutGrossesse, 32),
          url: '#'
        }
      ];

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        locale: 'fr',
        firstDay: 1,
        events: events,
        eventClick: function(info) {
          if (info.event.url && info.event.url !== '#') {
            window.open(info.event.url, '_blank');
            info.jsEvent.preventDefault();
          }
        }
      });

      calendar.render();
    }
  });
</script>

</div>
@vite('resources/js/app.js')
</body>
</html>
