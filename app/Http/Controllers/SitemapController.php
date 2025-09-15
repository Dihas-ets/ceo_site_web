<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function generate()
    {
        $sitemapFile = public_path('sitemap.xml');

        // Supprimer l'ancien fichier si il existe
        if (File::exists($sitemapFile)) {
            File::delete($sitemapFile);
        }

        // Générer le sitemap à partir de l'URL du site définie dans .env
        SitemapGenerator::create(config('app.url'))
            ->writeToFile($sitemapFile);

        return response()->json([
            'message' => '✅ Sitemap généré avec succès !',
            'file' => $sitemapFile
        ]);
    }
}
