<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Podcast;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Stats totales
        $projectsCount = Project::count();
        $podcastsCount = Podcast::count();
        $usersCount    = User::count();

        // Période : 12 derniers mois (mois en cours inclus)
        $start = Carbon::now()->startOfMonth()->subMonths(11);
        $end   = Carbon::now()->endOfMonth();

        // Libellés des mois (fr)
        Carbon::setLocale('fr');
        $months = [];
        $cursor = $start->copy();
        while ($cursor <= $end) {
            // ex: "août 2025" (capitale 1ère lettre)
            $months[] = ucfirst($cursor->translatedFormat('MMM yyyy'));
            $cursor->addMonth();
        }

        // Agrégations par mois (MySQL/MariaDB)
        // Si tu es sur SQLite ou Postgres, dis-le moi et je te donne la version adaptée.
        $projectsAgg = Project::selectRaw('DATE_FORMAT(created_at, "%Y-%m-01") as month_key, COUNT(*) as total')
            ->where('created_at', '>=', $start)
            ->groupBy('month_key')
            ->orderBy('month_key')
            ->pluck('total', 'month_key');

        $podcastsAgg = Podcast::selectRaw('DATE_FORMAT(created_at, "%Y-%m-01") as month_key, COUNT(*) as total')
            ->where('created_at', '>=', $start)
            ->groupBy('month_key')
            ->orderBy('month_key')
            ->pluck('total', 'month_key');

        // Construire les séries alignées sur $months
        $projectsPerMonth = [];
        $podcastsPerMonth = [];
        $cursor = $start->copy();
        while ($cursor <= $end) {
            $key = $cursor->format('Y-m-01'); // même format que month_key
            $projectsPerMonth[] = (int) ($projectsAgg[$key] ?? 0);
            $podcastsPerMonth[] = (int) ($podcastsAgg[$key] ?? 0);
            $cursor->addMonth();
        }

        // (Optionnel) Derniers éléments si tu veux éviter de requêter dans la vue
        $latestProjects = Project::latest()->take(5)->get();
        $latestPodcasts = Podcast::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'projectsCount',
            'podcastsCount',
            'usersCount',
            'months',
            'projectsPerMonth',
            'podcastsPerMonth',
            'latestProjects',
            'latestPodcasts'
        ));
    }
}
