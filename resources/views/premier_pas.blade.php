<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madame Hizba BOUKARI - CEO de Diha's</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-size: 35px; color: #dcc895;">
            <img src="{{ asset('storage/images/logo.png') }}" style="max-height: 75px;" class="me-2">
            <span class="fw-bold mt-3">Hizba Boukari</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{ url('/premier-pas') }}">Podcast</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

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

        <div class="d-flex align-items-center mt-4 d-none">
          <div class="me-3 d-flex">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle border border-2 border-white" width="50">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle border border-2 border-white" width="50" style="margin-left:-15px;">
            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle border border-2 border-white" width="50" style="margin-left:-15px;">
          </div>
          <span class="fw-bold fs-5">20M+ Online Listeners</span>
        </div>
      </div>

   <!-- Image + lecteur -->
<div class="col-lg-6 text-center position-relative">
  <!-- Effet radial -->
  <div class="radial-bg"></div>

  <!-- Photo PNG -->
  <img src="{{ asset('storage/images/img22.png') }}" alt="Podcast Host" class="img-fluid position-relative" style="z-index: 2;">

<!-- Lecteur Glassmorphism -->
<div class="glass-player shadow-lg p-3 rounded-4 position-absolute start-50 translate-middle-x" 
     style="bottom: 180px; z-index: 3; width: 65%;">

    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('storage/images/logo1erpas2.png') }}" 
             class="rounded me-3" width="55" height="55" alt="cover">
        <div>
            <h6 class="mb-0 fw-bold">INTRO : Bienvenue dans 1er Pas</h6>
            <small class="text-light">Par Hizba BOUKARI</small>
        </div>
    </div>

    <div class="progress bg-secondary mb-3" style="height: 5px;">
        <div id="progressBar" class="progress-bar bg-warning" style="width: 0%"></div>
    </div>

    <div class="d-flex justify-content-center gap-4">
        <button class="btn btn-outline-success btn-lg rounded-circle" onclick="rewind()">
            <i class="fa-solid fa-backward"></i>
        </button>
        <button class="btn btn-warning btn-lg rounded-circle text-light" onclick="togglePlay()" id="playBtn">
            <i class="fa-solid fa-play"></i>
        </button>
        <button class="btn btn-outline-success btn-lg rounded-circle" onclick="forward()">
            <i class="fa-solid fa-forward"></i>
        </button>
    </div>

    <!-- Audio principal -->
    <audio id="podcastAudio">
    @if($featuredAudio && ($featuredAudio->format === 'fichier' || $featuredAudio->format === 'lien'))
        <source src="{{ $featuredAudio->format === 'lien' ? $featuredAudio->link : asset('storage/'.$featuredAudio->file_path) }}" 
                type="audio/mpeg">
    @else
        <source src="{{ asset('storage/audio/Madame.mp3') }}" type="audio/mpeg">
    @endif
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


<script>
const audio = document.getElementById('podcastAudio');
const playBtn = document.getElementById('playBtn');
const progressBar = document.getElementById('progressBar');

// Toggle play/pause
function togglePlay() {
    if(audio.paused){
        audio.play();
        playBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else {
        audio.pause();
        playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
}

// Avancer de 10 secondes
function forward() {
    audio.currentTime += 10;
}

// Reculer de 10 secondes
function rewind() {
    audio.currentTime -= 10;
}

// Mettre à jour la barre de progression
audio.addEventListener('timeupdate', () => {
    const progress = (audio.currentTime / audio.duration) * 100;
    progressBar.style.width = progress + '%';
});

// Remettre le bouton Play au début quand audio est fini
audio.addEventListener('ended', () => {
    playBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
    progressBar.style.width = '0%';
});
</script>




<!-- Carousel Section – Vidéos mises en avant -->
<!-- Carousel Section – Vidéos mises en avant -->
<section class="carousel-section py-5">
    <div class="container">
        <!-- Titre -->
        <div class="text-center mb-4">
            <h3 class="section-title fw-bold">Podcast Mise en Avant</h3>
            <p class="section-subtitle">Découvrez mes vidéos mises en avant</p>
        </div>

        @if($featuredVideos->isEmpty())
            <!-- Message si aucun podcast n'est publié et mis en avant -->
            <div class="alert alert-warning text-center fw-bold">
                🚀 Aucun podcast n’a été publié et mis en avant pour le moment.
            </div>
        @else
            <!-- Carrousel -->
            <div id="podcastCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicateurs -->
                <div class="carousel-indicators">
                    @foreach($featuredVideos as $index => $podcast)
                        <button type="button" data-bs-target="#podcastCarousel" data-bs-slide-to="{{ $index }}" 
                            class="{{ $index == 0 ? 'active' : '' }}" 
                            aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                            aria-label="Slide {{ $index+1 }}"></button>
                    @endforeach
                </div>

                <!-- Items -->
                <div class="carousel-inner">
                    @foreach($featuredVideos as $index => $podcast)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="carousel-video position-relative" style="height:600px;">
                                <img src="{{ $podcast->image ? asset('storage/'.$podcast->image) : asset('images/default.jpg') }}" 
                                     class="d-block w-100 h-100" style="object-fit: cover;" alt="{{ $podcast->title }}">

                                <!-- Overlay -->
                                <div class="carousel-overlay position-absolute bottom-0 start-0 w-100 p-3 bg-opacity-50 text-dark">
                                    <h5 class="carousel-title">{{ $podcast->title }}</h5>
                                    <p class="carousel-series">{{ Str::limit($podcast->description, 80) }}</p>
                                    <div class="carousel-meta mb-2">
                                        <i class="far fa-user"></i> {{ $podcast->author }} • 
                                        <i class="far fa-clock"></i> {{ $podcast->duration ?? 'N/A' }}
                                    </div>

                                    <button class="btn btn-outline-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#videoModal"
                                            @if($podcast->format === 'lien')
                                                data-video="{{ $podcast->link }}"
                                            @else
                                                data-video="{{ asset('storage/'.$podcast->file_path) }}"
                                            @endif>
                                        ▶️ Regarder
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Contrôles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#podcastCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#podcastCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Modal Vidéo -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <h5 class="modal-title text-white" id="videoModalLabel">🎥 Lecture Vidéo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body p-0">
        <div class="ratio ratio-16x9">
          <iframe id="videoFrame" class="rounded" src="" 
                  title="Podcast Vidéo" frameborder="0" 
                  allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
const videoModal = document.getElementById('videoModal');
const videoFrame = document.getElementById('videoFrame');

videoModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const src = button.getAttribute('data-video');
    videoFrame.src = src + '?autoplay=1';
});

videoModal.addEventListener('hidden.bs.modal', function () {
    videoFrame.src = '';
});
</script>



<section class="container podcast-video">
    <!-- Section Titre -->
    <div class="text-center mb-5">
        <h2 class="section-title">Tous mes podcasts</h2>
        <p class="section-title-p">
            Que tu sois dans la diaspora ou sur le continent, ce podcast est là pour t’aider à faire ton 1er pas vers le numérique.
        </p>
    </div>
    
    <!-- Section Grille de Podcasts -->
    <div class="row g-4 mb-5">
        @forelse($podcasts as $index => $podcast)
            <div class="col-md-6 col-lg-4 podcast-card {{ $index >= 3 ? 'd-none' : '' }}">
                <div class="video-card"
                     data-bs-toggle="modal"
                     data-bs-target="#videoModal"
                     data-video="{{ $podcast->format==='lien' ? $podcast->link : asset('storage/'.$podcast->file_path) }}">
                    
                    <!-- Image -->
                    <div class="video-thumbnail">
                        <img src="{{ $podcast->image ? asset('storage/'.$podcast->image) : asset('images/default.jpg') }}" 
                             class="img-fluid" 
                             style="max-height: 250px; width: 100%; object-fit: cover;" 
                             alt="{{ $podcast->title }}">
                        <div class="play-overlay">
                            <div class="play-icon"><i class="fas fa-play"></i></div>
                        </div>
                    </div>

                    <!-- Infos -->
                    <div class="video-info mt-2">
                        <h3 class="video-title">{{ $podcast->title }}</h3>
                        <div class="video-series">{{ Str::limit($podcast->description, 80) }}</div>
                        <div class="video-meta">
                            <i class="far fa-user"></i> {{ $podcast->author }} • 
                            <i class="far fa-clock"></i> {{ $podcast->duration ?? 'N/A' }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Message si aucun podcast -->
            <div class="col-12 text-center">
                <p class="text-muted">Aucun podcast disponible pour le moment.</p>
            </div>
        @endforelse
    </div>

    <!-- Bouton Voir Plus -->
    @if($podcasts->count() > 3)
        <div class="text-center mb-5">
            <button id="showMoreBtn" class="btn btn-outline-primary">Voir plus</button>
        </div>
    @endif
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('showMoreBtn');
    if(btn){
        btn.addEventListener('click', () => {
            document.querySelectorAll('.podcast-card.d-none').forEach(card => card.classList.remove('d-none'));
            btn.style.display = 'none'; // cacher le bouton après avoir montré tout
        });
    }
});
</script>


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



    <script>
document.addEventListener("DOMContentLoaded", function () {
    let videoModal = document.getElementById("videoModal");
    let videoFrame = document.getElementById("videoFrame");

    // Quand on ouvre la modale → charger la vidéo
    videoModal.addEventListener("show.bs.modal", function (event) {
        let button = event.relatedTarget;
        let videoUrl = button.getAttribute("data-video");
        if (videoUrl) {
            // auto-play avec paramètre
            videoFrame.src = videoUrl + "?autoplay=1";
        }
    });

    // Quand on ferme la modale → arrêter la vidéo
    videoModal.addEventListener("hidden.bs.modal", function () {
        videoFrame.src = "";
    });
});
</script>





    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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