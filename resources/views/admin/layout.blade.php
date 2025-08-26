<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Tableau de bord')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Sidebar */
        #sidebar { width: 250px; min-height: 100vh; background-color: #212529; }
        #sidebar .nav-link { color: #fff; transition: 0.2s; }
        #sidebar .nav-link:hover { background-color: rgba(255,255,255,0.1); border-radius: 8px; }

        /* Hover effects */
        .hover-card { transition: transform 0.3s, box-shadow 0.3s; }
        .hover-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }

        /* Responsive adjustments */
        @media (max-width: 992px){
            #sidebar { width: 100%; min-height: auto; position: relative; }
        }
    </style>
    @yield('styles')
</head>
<body>
<div class="d-flex flex-column flex-lg-row">

    {{-- Sidebar --}}
    <nav id="sidebar" class="p-3 text-white">
        <h4 class="text-center mb-4">MonSite</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.projects.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-kanban-fill me-2"></i> Projets
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.podcasts.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-mic-fill me-2"></i> Podcasts
                </a>
            </li>
            @if(auth()->user()->role === 'admin')
            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-people-fill me-2"></i> Utilisateurs
                </a>
            </li>
            @endif
        </ul>
    </nav>

    {{-- Main content --}}
    <div id="main" class="flex-grow-1 p-3">
        {{-- Header (juste le profil) --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4 rounded">
            <div class="container-fluid justify-content-end">
                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-circle me-2" width="35" height="35">
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Déconnexion
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </div>
        </nav>

        {{-- Contenu principal --}}
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@yield('scripts')
</body>
</html>
