<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Podcast;

class FrontendController extends Controller
{
    public function index()
    {
        // Projets récents
        $projects = Project::latest()->take(3)->get();

        // 🔹 Premier audio publié et mis en avant
        $latestAudio = Podcast::where('type', 'audio')
                            ->where('status', 'publié')
                            ->where('featured', true) // mis en avant
                            ->latest()
                            ->first();

        // 🔹 S'il n'y a pas d'audio mis en avant, on prend le dernier audio publié
        if (!$latestAudio) {
            $latestAudio = Podcast::where('type', 'audio')
                                ->where('status', 'publié')
                                ->latest()
                                ->first();
        }

        // 🔹 Toutes les vidéos publiées
        $videos = Podcast::where('type', 'video')
        ->where('status', 'publié')
        ->latest()
        ->take(6)
        ->get();


        return view('welcome', compact('projects', 'latestAudio', 'videos'));
    }
}
