

<div class="text-center mb-5">
    <h1 class="fw-bold display-4 text-dark mb-3">📊 Tableau de bord</h1>
    <p class="lead text-muted">
        Bienvenue 
        <span class="fw-bold text-primary">{{ auth()->user()->name }}</span>
        @if(auth()->user()->role === 'admin')
            (Admin)
        @elseif(auth()->user()->role === 'gestionnaire')
            (Gestionnaire)
        @endif
        👋
    </p>
</div>



<div class="container-fluid">

    {{-- Cartes totales --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-lg text-center hover-card bg-gradient-primary text-white p-3">
                <i class="bi bi-kanban-fill fs-1 mb-2 animated-icon"></i>
                <h2 class="fw-bold">{{ $projectsCount }}</h2>
                <p>Projets</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg text-center hover-card bg-gradient-success text-white p-3">
                <i class="bi bi-mic-fill fs-1 mb-2 animated-icon"></i>
                <h2 class="fw-bold">{{ $podcastsCount }}</h2>
                <p>Podcasts</p>
            </div>
        </div>
        @if(auth()->user()->role === 'admin')
        <div class="col-md-4">
            <div class="card shadow-lg text-center hover-card bg-gradient-warning text-white p-3">
                <i class="bi bi-people-fill fs-1 mb-2 animated-icon"></i>
                <h2 class="fw-bold">{{ $usersCount }}</h2>
                <p>Utilisateurs</p>
            </div>
        </div>
        @endif
    </div>

    

    {{-- Graphiques --}}
    <div class="row g-4 mb-4">
        <div class="col-lg-8 col-md-12">
            <div class="card shadow p-3">
                <div class="card-header bg-dark text-white">📈 Activités récentes (par mois)</div>
                <div class="card-body">
                    <canvas id="activitiesChart" style="width: 100%; height: 400px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card shadow p-3">
                <div class="card-header bg-dark text-white">📊 Répartition</div>
                <div class="card-body">
                    <canvas id="distributionChart" style="width: 100%; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Derniers projets & podcasts --}}
    <div class="row g-4">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">📝 Derniers projets</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach(\App\Models\Project::latest()->take(5)->get() as $project)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $project->title }}
                            <span class="badge bg-primary rounded-pill pulse-badge">Nouveau</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card shadow">
                <div class="card-header bg-success text-white">🎙 Derniers podcasts</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach(\App\Models\Podcast::latest()->take(5)->get() as $podcast)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $podcast->title }}
                            <span class="badge bg-success rounded-pill pulse-badge">Nouveau</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Cartes du mois --}}
<div class="row g-4 my-5">
    <div class="col-md-4">
        <div class="card text-center shadow pulse-card bg-info text-white p-3">
            <h5>Projets ce mois-ci</h5>
            <h3>{{ \App\Models\Project::whereMonth('created_at', now()->month)->count() }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow pulse-card bg-success text-white p-3">
            <h5>Podcasts ce mois-ci</h5>
            <h3>{{ \App\Models\Podcast::whereMonth('created_at', now()->month)->count() }}</h3>
        </div>
    </div>
    @if(auth()->user()->role === 'admin')
    <div class="col-md-4">
        <div class="card text-center shadow pulse-card bg-warning text-dark p-3">
            <h5>Nouveaux utilisateurs</h5>
            <h3>{{ \App\Models\User::whereMonth('created_at', now()->month)->count() }}</h3>
        </div>
    </div>
    @endif
</div>


    
</div>


{{-- Graphiques JS --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx1 = document.getElementById('activitiesChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: @json($months),
        datasets: [
            { label: 'Projets', data: @json($projectsPerMonth), borderColor: '#007bff', backgroundColor: 'rgba(0,123,255,0.2)', tension: 0.4, fill: true },
            { label: 'Podcasts', data: @json($podcastsPerMonth), borderColor: '#28a745', backgroundColor: 'rgba(40,167,69,0.2)', tension: 0.4, fill: true }
        ]
    },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
});

const ctx2 = document.getElementById('distributionChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Projets', 'Podcasts', 'Utilisateurs'],
        datasets: [{ data: [{{ $projectsCount }}, {{ $podcastsCount }}, {{ $usersCount ?? 0 }}], backgroundColor: ['#007bff', '#28a745', '#ffc107'] }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
});
</script>

{{-- Styles supplémentaires --}}
<style>
.hover-card { transition: transform 0.3s, box-shadow 0.3s; }
.hover-card:hover { transform: translateY(-8px); box-shadow: 0 15px 25px rgba(0,0,0,0.3); }
.pulse-card { animation: pulse 1.5s infinite; }
@keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.03); } 100% { transform: scale(1); } }
.pulse-badge { animation: pulseBadge 1.2s infinite; }
@keyframes pulseBadge { 0% { transform: scale(1); opacity: 1; } 50% { transform: scale(1.2); opacity: 0.7; } 100% { transform: scale(1); opacity: 1; } }
.animated-icon { animation: bounce 2s infinite; }
@keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
.bg-gradient-primary { background: linear-gradient(135deg, #007bff, #0056b3); }
.bg-gradient-success { background: linear-gradient(135deg, #28a745, #1d7a31); }
.bg-gradient-warning { background: linear-gradient(135deg, #ffc107, #e0a800); }
</style>
@endsection
