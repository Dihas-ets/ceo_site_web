<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;

class PremierPasController extends Controller
{
    public function index()
    {
        // 🔹 Premier audio publié et mis en avant
        $featuredAudio = Podcast::where('type', 'audio')
                                ->where('status', 'publié')
                                ->where('featured', true)
                                ->latest()
                                ->first();

        // 🔹 S'il n'y a pas d'audio mis en avant, on prend le dernier audio publié
        if (!$featuredAudio) {
            $featuredAudio = Podcast::where('type', 'audio')
                                    ->where('status', 'publié')
                                    ->latest()
                                    ->first();
        }

        // carrousel
        // 🔹 Vidéos mises en avant ET publiées pour le carrousel
                $featuredVideos = Podcast::where('type', 'video')
                ->where('status', 'publié')
            ->where('featured', true)
            ->latest()
              ->get();


        // 🔹 Toutes les vidéos publiées pour la grille "Tous mes podcasts"
        $podcasts = Podcast::where('type', 'video')
                    
                    ->latest()
                    ->paginate(6);


        return view('premier_pas', compact('featuredAudio', 'featuredVideos', 'podcasts'));
    }
}
