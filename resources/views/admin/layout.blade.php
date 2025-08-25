<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optionnel : Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
        /* Sidebar custom */
        body {
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -220px;
                transition: left 0.3s;
                z-index: 1000;
            }
            .sidebar.show {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar d-flex flex-column p-3">
            <h4 class="mb-4">Admin</h4>

            
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.projects.index') }}"><i class="fas fa-folder me-2"></i>Espace Projet</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.podcasts.index') }}"><i class="fas fa-microphone me-2"></i>Podcasts</a>
                </li>
                <li class="nav-item mb-2">
    <a class="nav-link" href="{{ route('admin.socials.index') }}">
        <i class="fas fa-share-alt me-2"></i>Réseaux Sociaux
    </a>
</li>

                <li class="nav-item mt-4">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Contenu principal -->
        <div class="main-content flex-grow-1">
            <nav class="navbar navbar-light bg-light d-md-none mb-3">
                <div class="container-fluid">
                    <button class="btn btn-outline-secondary" id="toggleSidebar"><i class="fas fa-bars"></i></button>
                    <span class="navbar-brand mb-0 h1">Dashboard Admin</span>
                </div>
            </nav>

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');

        if(toggleBtn){
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }
    </script>
</body>
</html>
