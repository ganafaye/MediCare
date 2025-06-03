<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')
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
                        Bienvenue sur <span class="text-pink">MediCare</span>
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
                        <a href="#" class="btn btn-pink px-4">En savoir plus</a>
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
                        <a href="#" class="btn btn-pink px-4">En savoir plus</a>
                    </div>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="col-md-4">
                <div class="card service-card h-100 shadow-lg border-0 animate-service" style="animation-delay: 0.4s;">
                    <div class="card-body text-center">
                        <div class="service-icon mb-3">
                            <i class="bi bi-emoji-smile" style="font-size: 2.5rem; color: #fd0d99;"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">Suivi de grossesse</h5>
                        <p class="card-text mb-4">Un accompagnement personnalisé à chaque étape de votre grossesse.</p>
                        <a href="#" class="btn btn-pink px-4">En savoir plus</a>
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
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card testimonial-card h-100 shadow-lg border-0">
                    <div class="card-body text-center">
                        <p class="card-text mb-3">"MediCare a été un véritable soutien pendant ma grossesse. Les médecins sont très compétents et à l'écoute."</p>
                        <h5 class="card-title fw-bold">Marie Dupont</h5>
                        <p class="card-subtitle text-muted">Patiente</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card testimonial-card h-100 shadow-lg border-0">
                    <div class="card-body text-center">
                        <p class="card-text mb-3">"J'ai été très bien suivie tout au long de ma grossesse. Je recommande vivement MediCare !"</p>
                        <h5 class="card-title fw-bold">Sophie Martin</h5>
                        <p class="card-subtitle text-muted">Patiente</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card testimonial-card h-100 shadow-lg border-0">
                    <div class="card-body text-center">
                        <p class="card-text mb-3">"Un service de qualité et un suivi personnalisé. Merci MediCare pour votre professionnalisme !"</p>
                        <h5 class="card-title fw-bold">Claire Bernard</h5>
                        <p class="card-subtitle text-muted">Patiente</p>
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
                        <a href="#" class="btn btn-pink px-4">Accéder</a>
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
                        <a href="#" class="btn btn-pink px-4">Accéder</a>
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
                        <a href="#" class="btn btn-pink px-4">Accéder</a>
                    </div>
                </div>
            </div>
            <!-- Espace Secrétaire -->
            <div class="col-md-3">
                <div class="card platform-card h-100 shadow-lg border-0 text-center">
                    <div class="card-body">
                        <i class="bi bi-file-earmark-text mb-3" style="font-size: 3rem; color: #fd0d99;"></i>
                        <h5 class="card-title fw-bold mb-3">Espace Secrétaire</h5>
                        <p class="card-text mb-4">Gérez les rendez-vous, les dossiers patients et les communications.</p>
                        <a href="#" class="btn btn-pink px-4">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section -->
<section class="contact-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #fd0d99;">
            <span class="me-2">📞</span>Contactez-nous<span class="ms-2">📞</span>
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-card bg-white bg-opacity-90 rounded-4 shadow-lg p-4 p-md-5 mx-auto">
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
<!-- Section pour gallerie  -->
<section class="gallery-section py-5 section-fade" style="background: linear-gradient(120deg, #f8fafc 60%, #fde6f2 100%);">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #fd0d99;">
            <span class="me-2">📸</span>Galerie<span class="ms-2">📸</span>
        </h2>
        <div class="row g-4">
            <div class="col-md-4">
                <img src="image/gallery1.jpg" alt="Image 1" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="col-md-4">
                <img src="image/gallery2.jpg" alt="Image 2" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="col-md-4">
                <img src="image/gallery3.jpg" alt="Image 3" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
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
</body>
</html>
