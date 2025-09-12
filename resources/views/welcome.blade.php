<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo.png') }}">

    <title> Madame Hizba BOUKARI - CEO de Diha's</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">

        <!-- Font Awesome -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">


</head>
<style>


/* Carte projet uniforme */
#portfolio-projects .project-card {
    background: #fff;          /* fond blanc */
    border: none;              /* plus de bordure */
    border-radius: 10px;       /* coins arrondis */
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05); /* ombre légère */
    height: 100%;
    display: flex;
    flex-direction: column;
}

/* Image */
#portfolio-projects .project-image {
    height: 200px;
    overflow: hidden;
}

#portfolio-projects .project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Contenu */
#portfolio-projects .project-content {
    padding: 20px;
    flex: 1; /* pour que toutes les cartes aient la même hauteur */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Description */
#portfolio-projects .project-description {
    color: #555;
    flex-grow: 1;
}

/* Lien "Voir plus" simple */
/* Titre */
#portfolio-projects .project-title {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color:  rgba(26, 77, 45, 0.95); /* vert */
    text-align: center; /* centré */
}

/* Lien "Voir plus" centré avec flèche */
#portfolio-projects .project-link {
    color:  rgba(26, 77, 45, 0.95); /* vert */
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    margin-top: 15px;
}

#portfolio-projects .project-link:hover {
    color: #1e7e34; /* vert foncé au hover */
    text-decoration: none;
}

/* Ajouter flèche après le texte */
#portfolio-projects .project-link::after {
    content: '→';
    font-weight: bold;
    color: rgba(26, 77, 45, 0.95);
    transition: transform 0.2s;
}

#portfolio-projects .project-link:hover::after {
    transform: translateX(5px);
    color: #1e7e34;
}

/* Centrer le lien dans la carte */
#portfolio-projects .project-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center; /* pour centrer le lien */
    text-align: center; /* centrer texte description aussi */
}









</style>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
       <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-size: 35px; color: #dcc895;">
            <img src="{{ asset('storage/images/logo.png') }}" style="max-height: 75px;" class="me-2">
            <span class="fw-bold mt-3">Hizba Boukari</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">À Propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Projet</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="{{ url('/premier-pas') }}">Podcast</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section avec forme ovale et photo -->
<section id="home" class="hero">
    <div class="container custum-padding">
        <div class="row align-items-center row-reverse-sm">
            <div class="col-lg-6 animate-up mb-3">
                <h1 class="custom-title">VOTRE REFERENCE <br> EN DIGITALE</h1>
                <p class="hero-subtitle">Fondatrice de Diha's - Entrepreneure Visionnaire - Cheffe projet digital</p>
                <p class="hero-subtitle-p">Je suis la cheffe de projet digital de référence pour les entrepreneurs africains ambitieux, en Afrique et dans la diaspora. À travers DIHA’S, je rends la création d’outils numériques performants accessible, stratégique et rentable pour les entreprises qui veulent accélérer leur croissance.</p>
                <a href="#about" class="btn btn-lg mt-3 pulse" style="background-color: #e67f3c; color: white;">Découvrir mon univers</a>
            </div>
            <div class="col-lg-6 animate-up delay-1">
                <div class="hero-img">
                    <img src="{{ asset('storage/images/ban.png') }}" alt="Portrait de Hizba BOUKARI" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <h2 class="text-center section-title animate-up">Qui suis-je</h2>
        <div class="row align-items-center animate-up delay-1">
            <div class="col-lg-6">
                <div class="photo-container">           
                    <img src="{{ asset('storage/images/hero-img_2.png') }}" alt="Photo de profil" class="img-fluid">            
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h3>CEO de Diha's & Entrepreneure Passionnée</h3>
                    <p>
                        Je suis <strong>Hizba Boukari</strong>, cheffe de projet digital et fondatrice de 
                        <strong>DIHA’S</strong>, une entreprise spécialisée dans la création de solutions numériques sur-mesure 
                        (applications mobiles, sites web, plateformes digitales). 
                        Mon objectif est clair : aider les entrepreneurs et entreprises africaines à transformer leurs idées en 
                        outils technologiques puissants et rentables.
                    </p>

                    <p>
                        Chaque jour, j’accompagne des porteurs de projets, des startups et des institutions qui souhaitent 
                        structurer leur business, gagner en visibilité et automatiser leurs processus grâce au digital. 
                        Depuis la création de DIHA’S, j’ai eu la chance de piloter plus de 
                        <strong>100 projets digitaux</strong> dans des secteurs variés : santé, éducation, commerce, 
                        logistique, agroalimentaire, etc.
                    </p>

                    <blockquote class="blockquote my-4">
                        <p class="mb-0">
                            « Je crois profondément que le digital n’est pas réservé aux grandes entreprises. 
                            Il peut – et doit – être un levier de croissance accessible aux entrepreneurs africains, 
                            où qu’ils soient dans le monde. »
                        </p>
                    </blockquote>

                    <p>
                        Mon ambition ? Construire un écosystème où chaque idée d’entreprise peut devenir une 
                        <strong>startup performante</strong> grâce à une solution technologique bien pensée. 
                        Et <strong>DIHA’S</strong> est le partenaire stratégique pour y arriver.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Services Section -->
<section id="services" class="section services d-none">
    <div class="container">
        <h2 class="text-center section-title animate-up">Mes Services</h2>
        <div class="row animate-up delay-1">
            <div class="col-md-4 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Développement Web</h4>
                    <p>Création de sites web et applications sur mesure, alliant design élégant et fonctionnalités avancées pour une expérience utilisateur optimale.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Applications Mobiles</h4>
                    <p>Conception et développement d'applications mobiles innovantes pour iOS et Android, avec des interfaces intuitives et des performances optimales.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Développement De Marque</h4>
                    <p>Élaboration de stratégies digitales complètes pour maximiser votre présence en ligne et atteindre vos objectifs business.</p>
                </div>
            </div>
        </div>
        <div class="row mt-4 animate-up delay-2">
            <div class="col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>Design UX/UI</h4>
                    <p>Création d'interfaces utilisateur attrayantes et intuitives qui améliorent l'expérience utilisateur et renforcent l'engagement.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Transformation Digitale</h4>
                    <p>Accompagnement dans la transformation digitale de votre entreprise pour vous adapter aux nouveaux enjeux du marché.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Projects Section -->
    <section id="portfolio-projects" class="text-center projects-section mb-5">
    <div class="container">
        <h2 class="section-title">Mes Projets Réalisés</h2>
        
        <div class="row">
        @foreach($projects as $project)
            <div class="col-md-4">
                <div class="project-card mb-4">
                    <div class="project-image">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    </div>
                    <div class="project-content">
                        <h5 class="project-title">{{ $project->title }}</h5>
                        <p class="project-description">{{ $project->description }}</p>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="project-link">Voir plus</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>


        
        <div class="text-center">
            <a href="https://dihas.tech/dihas-product" class="btn btn-lg view-all-btn">Voir tous les projets</a>
        </div>
    </div>
</section>


    <!-- Portfolio Modals -->
<div class="modal fade portfolio-modal" id="portfolioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolioModalLabel">Détails du Projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="" alt="Project Image" class="img-fluid portfolio-modal-img" id="modalImage">
                        </div>
                        <div class="col-md-6">
                            <h3 id="modalTitle"></h3>
                            <p id="modalCategory" class="text-muted"></p>
                            <div id="modalDescription"></div>
                            <h5 class="mt-4">Technologies utilisées</h5>
                            <div id="modalTechnologies"></div>
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary me-2" id="modalLiveLink">Voir le projet en ligne</a>
                                <a href="#" class="btn btn-outline-primary" id="modalSourceLink">Code source</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Podcast Pro -->
<section id="premierPAS" class="premier-pas show-premier-pas">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Texte gauche -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="image">
            <img src="{{ asset('storage/images/logo1erpas1.png') }}" alt="Podcast Premier Pas" class="img-fluid">
        </div>
        <h1 class="fw-bold display-4 mb-3">
          🎙️<span class="text-warning">Un pas </span> à la fois,
          <span class="text-gradient"> vers ton projet tech</span>
        </h1>
        <p class="lead text-light opacity-75 mb-4">
          <span style="font-weight: bold;">1<sup>er</sup> PAS</span>, c’est le podcast qui accompagne les entrepreneurs africains, 
          de la diaspora ou du continent, à faire leurs premiers pas dans le monde des startups numériques.
        </p>

        <div class="d-flex gap-3 mb-4 btn-play">
          <button class="btn btn-warning btn-lg px-4 rounded-pill shadow-lg" onclick="togglePlay()" id="playBtnFirst">
            <i class="fa-solid fa-play"></i> Podcast Mise en Avant
          </button>
          <a href="{{ url('/podcasts') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">
            📂 Voir tous les podcasts
          </a>
        </div>
      </div>

      <!-- Image + lecteur -->
      <div class="col-lg-6 text-center position-relative">
        <!-- Effet radial -->
        <div class="radial-bg"></div>

        <!-- Photo PNG -->
        <img src="{{ asset('storage/images/img22.png') }}" alt="Podcast Host" class="img-fluid position-relative" style="z-index: 2;">

        <!-- Lecteur Glassmorphism -->
        <div class="glass-player shadow-lg p-3 rounded-4 position-absolute start-50 translate-middle-x" style="bottom: 180px; z-index: 3; width: 65%;">
          <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('storage/images/logo1erpas2.png') }}" 
                 class="rounded me-3" width="55" height="55" alt="cover">
            <div>
              <h6 class="mb-0 fw-bold">
                {{ $latestAudio ? $latestAudio->title : 'INTRO : Bienvenue dans 1er Pas' }}
              </h6>
              <small class="text-light">
                {{ $latestAudio ? $latestAudio->author : 'Par Hizba BOUKARI' }}
              </small>
            </div>
          </div>

          <div class="progress bg-secondary mb-3" style="height: 5px;">
            <div id="progressBar" class="progress-bar bg-warning" style="width: 0%"></div>
          </div>

          <div class="d-flex justify-content-center gap-4">
            <button class="btn btn-outline-success btn-lg rounded-circle" onclick="rewind()"><i class="fa-solid fa-backward"></i></button>
            <button class="btn btn-warning btn-lg rounded-circle text-light" onclick="togglePlay()" id="playBtn"><i class="fa-solid fa-play"></i></button>
            <button class="btn btn-outline-success btn-lg rounded-circle" onclick="forward()"><i class="fa-solid fa-forward"></i></button>
          </div>

          <!-- Audio -->
          <audio id="podcastAudio">
              <source src="@if($latestAudio)
                              {{ $latestAudio->format === 'fichier' 
                                  ? asset('storage/' . $latestAudio->file_path) 
                                  : $latestAudio->link }}
                          @else
                              {{ asset('storage/audio/Madame.mp3') }}
                          @endif" type="audio/mpeg">
              Votre navigateur ne supporte pas la lecture audio.
          </audio>
        </div>

        <div class="abonne-count badge bg-warning text-dark fs-6 mt-5 p-3 rounded-pill shadow-lg animate__animated animate__pulse animate__infinite">
          ✨ Avec +50 entrepreneurs
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Video Section -->
<section class="container podcast-video">
  <!-- Section Titre -->
  <div class="row">
    <div class="col-md-12">
      <div class="text-center mb-5">
        <h2 class="section-title">🎥 Mes Podcasts Vidéo</h2>
        <p class="section-title-p">
          Que tu sois dans la diaspora ou sur le continent, ce podcast est là pour t’aider à faire ton 1er pas vers le numérique.
        </p>
      </div>
    </div>
  </div>


    <div class="row g-4 mb-5">
        @if($videos->isEmpty())
            <div class="alert alert-warning text-center fw-bold">
                🚀 Aucun podcast vidéo publié pour le moment.
            </div>
        @else
            @foreach($videos as $video)
                <div class="col-md-4">
                <div class="card podcast-card h-100"
     data-bs-toggle="modal"
     data-bs-target="#videoModal"
     data-video="{{ $video->link }}">


                        <!-- Image Aperçu -->
                        <img src="{{ $video->image ? asset('storage/' . $video->image) : asset('images/default.jpg') }}" 
                             class="card-img-top" 
                             alt="{{ $video->title }}">

                        <!-- Infos -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <p class="card-text">{{ Str::limit($video->description, 100) }}</p>
                            <i class="fas fa-user"></i> {{ $video->author }}
                            <i class="far fa-clock"></i> {{ $video->duration }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Bouton Voir tous les podcasts -->
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <a href="{{ url('/premier-pas') }}" class="btn btn-lg btn-primary view-all-btn">Visitez tous les podcasts</a>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Visionnage de la vidéo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-video-container">
                        <iframe id="videoFrame" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
   <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <h3>Hizba BOUKARI</h3>
                    <p>CEO de Diha's - Entrepreneure Visionnaire</p>
                    <div class="social-icons mb-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <p>&copy; 2025 Hizba BOUKARI. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>

        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });
        
        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Navbar background change on scroll
        const navbar = document.querySelector('.navbar');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                navbar.style.padding = '10px 0';
                navbar.style.backgroundColor = 'var(--primary-dark)';
            } else {
                navbar.style.padding = '15px 0';
                navbar.style.backgroundColor = 'rgba(26, 77, 45, 0.95)';
            }
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Animation on scroll
        const animateElements = document.querySelectorAll('.animate-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        animateElements.forEach(element => {
            element.style.opacity = 0;
            element.style.transform = 'translateY(50px)';
            element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(element);
        });
        
  
    </script>

    <script>
        // Activer la vidéo dans la modal
        var videoModal = document.getElementById('videoModal');
        videoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var videoURL = button.getAttribute('data-video');
            var iframe = videoModal.querySelector('#videoFrame');
            iframe.src = videoURL;
        });
        
        // Réinitialiser la vidéo quand la modal se ferme
        videoModal.addEventListener('hidden.bs.modal', function () {
            var iframe = videoModal.querySelector('#videoFrame');
            iframe.src = '';
        });
        
        // Filtrage des vidéos par catégorie
        document.querySelectorAll('.filter-buttons .btn').forEach(button => {
            button.addEventListener('click', () => {
                // Mettre à jour le bouton actif
                document.querySelectorAll('.filter-buttons .btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
                
                // Filtrer les vidéos
                const filter = button.getAttribute('data-filter');
                document.querySelectorAll('#video-grid .col-md-6').forEach(video => {
                    if (filter === 'all' || video.getAttribute('data-category') === filter) {
                        video.style.display = 'block';
                    } else {
                        video.style.display = 'none';
                    }
                });
            });
        });
    </script>


    <script>
    const audio = document.getElementById("podcastAudio");
    const playBtn = document.getElementById("playBtn");
    const playBtnFirst = document.getElementById("playBtnFirst");
    const progressBar = document.getElementById("progressBar");

    audio.addEventListener("timeupdate", () => {
        const progress = (audio.currentTime / audio.duration) * 100;
        progressBar.style.width = progress + "%";
    });

    function togglePlay() {
        if (audio.paused) {
        audio.play();
        playBtn.innerHTML = "<i class='fa-solid fa-pause'></i>";
        playBtnFirst.innerHTML = "<i class='fa-solid fa-pause'></i> Mettre en pause";
        } else {
        audio.pause();
        playBtn.innerHTML = "<i class='fa-solid fa-play'></i>";
        playBtnFirst.innerHTML = "<i class='fa-solid fa-play'></i> Continuer la lecture";
        }
    }
    function rewind() {
        audio.currentTime -= 10;
    }
    function forward() {
        audio.currentTime += 10;
    }
    </script>


<!-- Custom JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion de la modal vidéo
        const videoModal = document.getElementById('videoModal');
        videoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const videoURL = button.getAttribute('data-video');
            const iframe = videoModal.querySelector('#videoFrame');
            iframe.src = videoURL;
            
            // Mettre à jour le titre de la modal
            const cardTitle = button.querySelector('.video-title') || button.querySelector('.carousel-title');
            if (cardTitle) {
                videoModal.querySelector('.modal-title').textContent = cardTitle.textContent;
            }
        });
        
        // Réinitialiser la vidéo quand la modal se ferme
        videoModal.addEventListener('hidden.bs.modal', function () {
            const iframe = videoModal.querySelector('#videoFrame');
            iframe.src = '';
        });
        
        // Animation du carrousel
        const myCarousel = document.getElementById('videoCarousel');
        const carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            wrap: true
        });
    });
</script>

</body>
</html>