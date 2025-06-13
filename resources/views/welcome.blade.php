<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MediCare - Clinique Gynéco Obstétrique </title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  <link rel="icon" type="image/png" href="{{ asset('image/logo medecin.png') }}">
</head>
<body>
<!--  header . -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center text-primary" href="#">
            <img src="image/logo medecin.png" alt="Logo MediCare" style="height: 40px;" class="me-2">
            MediCare
        </a>
        <!-- Bouton mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item me-3">
                    <a class="nav-link fw-semibold px-4 py-2 rounded-pill nav-anim active" href="#">Accueil</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link fw-semibold px-4 py-2 rounded-pill nav-anim" href="#">À propos</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link fw-semibold px-4 py-2 rounded-pill nav-anim" href="#">Contact</a>
                </li>
            </ul>
            <!-- Bouton d'action à droite (optionnel) -->
            <a href="#" class="btn btn-pink ms-lg-3 px-4 py-2 fw-semibold shadow-sm">Prendre rendez-vous</a>
        </div>
    </div>
</nav>
        <!-- La partie Section Hero  -->
       <section class="hero-section py-5" style="background: linear-gradient(120deg, #0d6efd 60%, #fd0d99 100%);">
            <div class="container">
                <div class="row align-items-center min-vh-60">
                    <div class="row align-items-center min-vh-60">
            <!-- Partie gauche : Texte -->
            <div class="col-md-6 mb-4 mb-md-0 d-flex align-items-center justify-content-center">
                <div class="bg-white bg-opacity-75 rounded-4 shadow-lg p-4 p-md-5 hero-fade hero-delay-1" style="backdrop-filter: blur(2px);">
                    <h1 class="display-5 fw-bold mb-3 text-primary">
                        Bienvenue sur <br>
                        <span class="text-pink typewriter" id="medicare-type"></span>
                    </h1>
                    <p class="lead mb-2 text-dark">
                        MediCare est une clinique gynéco et obstétrique pour le suivi des patientes enceintes.
                    </p>
                    <p class="mb-3 text-dark">
                        Accédez à des soins de qualité et à un suivi médical personnalisé.<br>
                        Prenez rendez-vous en quelques clics et profitez d’un accompagnement adapté à vos besoins.
                    </p>
                    <p class="fw-semibold mb-4" style="font-size: 1.1rem; color: #fd0d99;">
                    🩺 MediCare, l’innovation au service de votre bien-être !
                    </p>
                    <a href="#" class="btn btn-pink btn-lg shadow px-4 py-2">
                        Prendre rendez-vous
                    </a>
                </div>
            </div>
                    <!-- Partie droite : Image -->
                    <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div class="bg-white rounded-4 shadow p-3" style="display: inline-block;">
                            <img src="image/sagefemme.png" alt="Médecin" class="img-fluid hero-fade hero-delay-4" style="max-height: 680px; width: auto; object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

   <!-- Section pour presenter les services de medicare  -->
   <section class="services-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #fd0d99;">
            <span class="me-2">✨</span>Découvrez nos services<span class="ms-2">✨</span>
        </h2>
        <div class="row g-4">
            <!-- Carte 1 -->
            <div class="col-md-4">
                <div class="card service-card h-100 shadow-lg border-0 animate-service">
                    <div class="card-body text-center">
                        <div class="service-icon mb-3">
                            <i class="bi bi-heart-pulse-fill" style="font-size: 2.5rem; color: #fd0d99;"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Consultation Médicale</h5>
                        <p class="card-text mb-4">Des consultations spécialisées pour un suivi optimal de votre santé.</p>
                        <!-- Carte 1 -->
                        <a href="#" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalConsultation">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="col-md-4">
                <div class="card service-card h-100 shadow-lg border-0 animate-service" style="animation-delay: 0.2s;">
                    <div class="card-body text-center">
                        <div class="service-icon mb-3">
                            <i class="bi bi-person-bounding-box" style="font-size: 2.5rem; color: #0d6efd;"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Échographie</h5>
                        <p class="card-text mb-4">Des échographies de haute qualité pour un suivi précis de votre grossesse.</p>
                        <!-- Carte 2 -->
                        <a href="#" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalEcho">En savoir plus</a>
                    </div>
                </div>
            </div>

            <!-- Carte 3 -->

            <div class="col-md-4">
             <div class="card service-card h-100 shadow-lg border-0 animate-service" style="animation-delay: 0.4s;">
                <div class="card-body text-center">
                    <div class="service-icon mb-3">
                            <img src="image/grossesse.png" alt="Suivi de grossesse" style="height: 60px; width: auto; border-radius: 50%; box-shadow: none; display: block; margin: 0 auto;">
                        </div>
                        <h5 class="card-title fw-bold mb-3 mt-2">Suivi de grossesse</h5>
                        <p class="card-text mb-4">Un accompagnement personnalisé à chaque étape de votre grossesse.</p>
                        <a href="#" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalSuivi">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section pour les differentes espaces du plateforme (patiente , medecin, admin , secretaire) -->

<section class="platform-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #fd0d99;">
            <span class="me-2">🌐</span>Accédez à votre espace<span class="ms-2">🌐</span>
        </h2>
        <div class="row g-4">

            <!-- Espace Patient -->

            <div class="col-md-3">
                <div class="card platform-card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-person-circle mb-3" style="font-size: 3rem; color: #0d6efd;"></i>
                        <h5 class="card-title fw-bold mb-3">Espace Patiente</h5>
                        <p class="card-text mb-4">Accédez à vos informations médicales, prenez rendez-vous et suivez votre santé.</p>
                        <a href="" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalLoginPatiente">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Espace Médecin -->

            <div class="col-md-3">
                <div class="card platform-card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-heart-pulse mb-3" style="font-size: 3rem; color: #fd0d99;"></i>
                        <h5 class="card-title fw-bold mb-3">Espace Médecin</h5>
                        <p class="card-text mb-4">Gérez vos consultations, accédez aux dossiers patients et suivez vos rendez-vous.</p>
                        <a href="" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalLoginMedecin">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Espace Administrateur -->

            <div class="col-md-3">
                <div class="card platform-card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-gear-wide mb-3" style="font-size: 3rem; color: #0d6efd;"></i>
                        <h5 class="card-title fw-bold mb-3">Espace Administrateur</h5>
                        <p class="card-text mb-4">Gérez les utilisateurs, les rendez-vous et les statistiques de la plateforme.</p>
                        <!-- Pour l'admin -->
                        <a href="#" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalLoginAdmin">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Espace Secrétaire -->

            <div class="col-md-3">
                <div class="card platform-card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-person-badge mb-3" style="font-size: 3rem; color: #0d6efd;"></i>
                        <h5 class="card-title fw-bold mb-3">Espace Secrétaire</h5>
                        <p class="card-text mb-4">Gérez les rendez-vous, les dossiers patients et les communications.</p>
                        <!-- Pour la secrétaire -->
                        <a href="#" class="btn btn-pink px-4" data-bs-toggle="modal" data-bs-target="#modalLoginSecretaire">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section pour les témoignages -->

<section class="testimonials-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #fd0d99;">
            <span class="me-2">🌟</span>Témoignages<span class="ms-2">🌟</span>
        </h2>
        <div class="row g-4 justify-content-center">

            <!-- Témoignage 1 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="testimonial-card p-4 h-100 shadow-lg border-0 rounded-4 position-relative">
                    <div class="testimonial-quote mb-3">
                        <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <p class="testimonial-text mb-4 fst-italic">
                        "MediCare a été un véritable soutien pendant ma grossesse. Les médecins sont très compétents et à l'écoute."
                    </p>
                    <div class="testimonial-author d-flex align-items-center gap-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-pink" style="width:48px; height:48px;">
                            <i class="bi bi-person-circle" style="font-size:2rem; color:#fd0d99;"></i>
                        </span>
                        <div>
                            <h5 class="mb-0 fw-bold">Marie Dupont</h5>
                            <span class="text-muted small">Patiente</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="testimonial-card p-4 h-100 shadow-lg border-0 rounded-4 position-relative">
                    <div class="testimonial-quote mb-3">
                        <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <p class="testimonial-text mb-4 fst-italic">
                        "J'ai été très bien suivie tout au long de ma grossesse. Je recommande vivement MediCare !"
                    </p>
                    <div class="testimonial-author d-flex align-items-center gap-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-pink" style="width:48px; height:48px;">
                            <i class="bi bi-person-circle" style="font-size:2rem; color:#fd0d99;"></i>
                        </span>
                        <div>
                            <h5 class="mb-0 fw-bold">Sophie Martin</h5>
                            <span class="text-muted small">Patiente</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="testimonial-card p-4 h-100 shadow-lg border-0 rounded-4 position-relative">
                    <div class="testimonial-quote mb-3">
                        <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <p class="testimonial-text mb-4 fst-italic">
                        "Un service de qualité et un suivi personnalisé. Merci MediCare pour votre professionnalisme !"
                    </p>
                    <div class="testimonial-author d-flex align-items-center gap-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-pink" style="width:48px; height:48px;">
                            <i class="bi bi-person-circle" style="font-size:2rem; color:#fd0d99;"></i>
                        </span>
                        <div>
                            <h5 class="mb-0 fw-bold">Claire Bernard</h5>
                            <span class="text-muted small">Patiente</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section new letters  -->

<section class="newsletter-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container text-center">
        <h2 class="mb-4 fw-bold" style="color: #fd0d99;">
            <i class="bi bi-envelope-paper-heart-fill me-2"></i>
            Inscrivez-vous à notre newsletter
            <i class="bi bi-envelope-paper-heart-fill ms-2"></i>
        </h2>
        <p class="mb-4">Recevez les dernières actualités et conseils santé directement dans votre boîte mail.</p>
        <form class="d-flex justify-content-center">
            <input type="email" class="form-control me-2 newsletter-input" placeholder="Votre email" required>
            <button type="submit" class="btn btn-pink px-4">S'inscrire</button>
        </form>
    </div>
</section>

<!-- contact section -->

<section class="contact-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <div class="row justify-content-center align-items-stretch">

            <!-- Colonne gauche : Google Maps -->

            <div class="col-lg-6 mb-4 mb-lg-0 d-flex flex-column align-items-stretch">
                <h4 class="contact-title text-center mb-4">
                    <i class="bi bi-geo-alt-fill me-2" style="color:#fd0d99;"></i>
                    Notre adresse
                </h4>
                <div class="w-100 h-100 rounded-4 shadow-lg overflow-hidden flex-grow-1" style="min-height: 350px;">
                    <iframe
                        src="https://www.google.com/maps?q=Rufisque,+Dakar,+Sénégal&output=embed"
                        width="100%" height="100%" style="border:0; min-height:350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Colonne droite : Formulaire de contact -->

            <div class="col-lg-6 d-flex flex-column align-items-stretch">
                <h4 class="contact-title text-center mb-4">
                    <i class="bi bi-envelope-fill me-2" style="color:#0d6efd;"></i>
                    Contactez-nous
                </h4>
                <div class="contact-card bg-white bg-opacity-90 rounded-4 shadow-lg p-4 p-md-5 mx-auto w-100 flex-grow-1">
                    <form>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control contact-input" placeholder="Votre nom" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control contact-input" placeholder="Votre email" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control contact-input" rows="4" placeholder="Votre message" required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-pink btn-lg px-5 shadow">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section pour illustrer la responsivite du plateforme  -->

<section class="responsive-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container text-center">
        <h2 class="mb-4 fw-bold" style="color: #fd0d99;">
            <i class="bi bi-phone-fill me-2"></i>
            Accessible partout, tout le temps
            <i class="bi bi-phone-fill ms-2"></i>
        </h2>
        <p class="mb-4">Notre plateforme est optimisée pour tous les appareils : ordinateurs, tablettes et smartphones.</p>
        <!-- centrer l'image -->
        <div class="d-flex justify-content-center mb-4">
        <img src="image/Design_responsive2-removebg-preview.png" alt="Responsive Design" class="img-fluid" style="max-width: 100%; height: auto;">
    </div>
</section>
<!-- Footer -->

<footer class="footer-section py-4" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0 text-muted fw-semibold">© 2025 MediCare. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <span class="me-2 text-muted">Suivez-nous :</span>
                <a href="#" class="footer-icon-link me-2" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="footer-icon-link me-2" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="footer-icon-link" title="Instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
  @vite('resources/js/app.js')

<!-- Modals En savoir plus -->

<div class="modal fade" id="modalConsultation" tabindex="-1" aria-labelledby="modalConsultationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConsultationLabel">Consultation Médicale</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>
          Nos consultations médicales sont assurées par des spécialistes expérimentés pour un suivi optimal de votre santé. Prise de rendez-vous rapide, écoute et conseils personnalisés.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEcho" tabindex="-1" aria-labelledby="modalEchoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEchoLabel">Échographie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>
          Nous proposons des échographies de haute qualité pour un suivi précis de votre grossesse, réalisées avec des équipements modernes et par des professionnels qualifiés.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSuivi" tabindex="-1" aria-labelledby="modalSuiviLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSuiviLabel">Suivi de grossessbe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>
          Un accompagnement personnalisé à chaque étape de votre grossesse, avec des conseils, des examens réguliers et un suivi attentif pour votre bien-être et celui de votre bébé.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login Patiente -->
<div class="modal fade" id="modalLoginPatiente" tabindex="-1" aria-labelledby="modalLoginPatienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 overflow-hidden">
      <div class="row g-0">
        <!-- Colonne gauche : Formulaire -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 text-center" id="modalLoginPatienteLabel">Connectez-vous</h5>
            <button type="button" class="btn-close position-absolute end-0 me-3 mt-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          @if (session('inscription_success'))
              <div class="alert alert-success">
                  {{ session('inscription_success') }}
              </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="modal-body pt-0">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-pink btn-lg px-4 rounded-pill w-100">Se connecter</button>
              </div>
            </form>
            <div class="mt-3 text-center">
              <a href="#" class="text-decoration-none" style="color:#0d6efd;"
                 data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalInscriptionPatiente">
                 Créer un compte
              </a>
            </div>
          </div>
        </div>
        @if ($errors->any() && !old('nom'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        alert('Identifiants incorrects. Veuillez réessayer.');
        var modal = new bootstrap.Modal(document.getElementById('modalLoginPatiente'));
        modal.show();
    });
</script>
@endif
        <!-- Colonne droite : Image -->
        <div class="col-md-6 d-none d-md-block bg-light">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <img src="image/online-pregnant-consultation-9420021-7668756.webp" alt="Connexion Patiente" style="max-width: 100%; max-height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Inscription Patiente (présentation améliorée en 2 colonnes) -->
<div class="modal fade" id="modalInscriptionPatiente" tabindex="-1" aria-labelledby="modalInscriptionPatienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 overflow-hidden">
      <div class="row g-0">
        <!-- Colonne gauche : Formulaire -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 text-center" id="modalInscriptionPatienteLabel">Inscription Patiente</h5>
            <button type="button" class="btn-close position-absolute end-0 me-3 mt-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body pt-0">
            <!-- Affichage des erreurs ici -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('patiente.register') }}" id="formInscriptionPatiente">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nom" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="prenom" class="form-label">Prénom</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="date_naissance" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="telephone" class="form-label">Téléphone</label>
                  <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Adresse email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="groupe_sanguin" class="form-label">Groupe sanguin</label>
                  <input type="text" class="form-control" id="groupe_sanguin" name="groupe_sanguin" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="profession" class="form-label">Profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-pink btn-lg rounded-pill w-100">S'inscrire</button>
              </div>
            </form>
            <div class="mt-3 text-center">
              <a href="#" class="text-decoration-none" style="color:#0d6efd;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalLoginPatiente">Déjà inscrite ? Se connecter</a>
            </div>
          </div>
        </div>
        <!-- Colonne droite : Image -->
        <div class="col-md-6 d-none d-md-block bg-light">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <img src="image/online-pregnant-consultation-9420021-7668756.webp" alt="Inscription Patiente" style="max-width: 100%; max-height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login Médecin -->
<div class="modal fade" id="modalLoginMedecin" tabindex="-1" aria-labelledby="modalLoginMedecinLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 overflow-hidden">
      <div class="row g-0">
        <!-- Colonne gauche : Formulaire -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 text-center" id="modalLoginMedecinLabel">Connexion Médecin</h5>
            <button type="button" class="btn-close position-absolute end-0 me-3 mt-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body pt-0">
            <form method="POST" action="{{ route('login.medecin') }}">
              @csrf
              <div class="mb-3">
                <label for="email_medecin" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email_medecin" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password_medecin" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password_medecin" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-pink btn-lg px-4 rounded-pill w-100">Se connecter</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Colonne droite : Image -->
        <div class="col-md-6 d-none d-md-block bg-light">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <img src="image/pngegg (7).png" alt="Connexion Médecin" style="max-width: 100%; max-height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login Administrateur -->
<div class="modal fade" id="modalLoginAdmin" tabindex="-1" aria-labelledby="modalLoginAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 overflow-hidden">
      <div class="row g-0">
        <!-- Colonne gauche : Formulaire -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 text-center" id="modalLoginAdminLabel">Connexion Administrateur</h5>
            <button type="button" class="btn-close position-absolute end-0 me-3 mt-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body pt-0">
            <form method="POST" action="{{ route('login.admin') }}">
              @csrf
              <div class="mb-3">
                <label for="email_admin" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email_admin" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password_admin" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password_admin" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-pink btn-lg px-4 rounded-pill w-100">Se connecter</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Colonne droite : Image -->
        <div class="col-md-6 d-none d-md-block bg-light">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <img src="image/img_admin.png" alt="Connexion Administrateur" style="max-width: 100%; max-height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Login Secrétaire -->
<div class="modal fade" id="modalLoginSecretaire" tabindex="-1" aria-labelledby="modalLoginSecretaireLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 overflow-hidden">
      <div class="row g-0">
        <!-- Colonne gauche : Formulaire -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title w-100 text-center" id="modalLoginSecretaireLabel">Connexion Secrétaire</h5>
            <button type="button" class="btn-close position-absolute end-0 me-3 mt-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body pt-0">
           <form method="POST" action="/login_secretaire">
              @csrf
              <div class="mb-3">
                <label for="email_secretaire" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email_secretaire" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password_secretaire" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password_secretaire" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-pink btn-lg px-4 rounded-pill w-100">Se connecter</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Colonne droite : Image -->
        <div class="col-md-6 d-none d-md-block bg-light">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <img src="image/secretaire_img2.jpg" alt="Connexion Secrétaire" style="max-width: 100%; max-height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('modalInscriptionPatiente'));
        modal.show();
    });
</script>
@endif
@if (session('inscription_success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Affiche le message (tu peux aussi le mettre dans le modal login)
            alert("{{ session('inscription_success') }}");
            // Ouvre le modal de connexion patiente
            var modal = new bootstrap.Modal(document.getElementById('modalLoginPatiente'));
            modal.show();
        });
    </script>
@endif
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formInscriptionPatiente');
    if(form){
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const email = form.querySelector('input[name="email"]').value;
            // Vérification AJAX de l'email
            fetch('/check-email-patiente?email=' + encodeURIComponent(email))
                .then(response => response.json())
                .then(data => {
                    if(data.exists){
                        // Affiche l'erreur dans le modal
                        let errorDiv = form.querySelector('.alert-danger');
                        if(!errorDiv){
                            errorDiv = document.createElement('div');
                            errorDiv.className = 'alert alert-danger mt-2';
                            form.prepend(errorDiv);
                        }
                        errorDiv.innerHTML = '<ul class="mb-0"><li>Cette adresse email est déjà utilisée.</li></ul>';
                    }else{
                        form.submit(); // Envoie le formulaire si tout est OK
                    }
                });
        });
    }
});
</script>
</body>

</html>
