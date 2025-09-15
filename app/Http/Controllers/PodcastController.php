<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    // Affiche la liste des podcasts
    public function index()
    {
        // Récupérer tous les podcasts avec leur catégorie
        $podcasts = Podcast::with('category')->get();
    
        return view('admin.podcasts.index', compact('podcasts'));
    }
    
    // Affiche le formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('admin.podcasts.create', compact('categories'));
    }

    // Enregistre le podcast en base
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'author'      => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'type'        => 'required|in:audio,video',
        'format'      => 'required|in:lien,fichier',
        'link'        => 'nullable|required_if:format,lien|url',
        'file_path'   => 'nullable|required_if:format,fichier|file',
        'duration'    => 'nullable|string|max:50',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $podcast = new Podcast();
    $podcast->title       = $request->title;
    $podcast->description = $request->description;
    $podcast->author      = $request->author;
    $podcast->category_id = $request->category_id;
    $podcast->type        = $request->type;
    $podcast->format      = $request->format;
    $podcast->duration    = $request->duration;

    // ✅ Status indépendant (audio ou vidéo)
    $podcast->status = $request->has('status') ? 'publié' : 'brouillon';

    // ✅ Mise en avant (indépendant aussi)
    $podcast->featured = $request->has('featured');

    // ✅ Fichier uploadé
    if ($request->format === 'fichier' && $request->hasFile('file_path')) {
        $podcast->file_path = $request->file('file_path')->store('podcasts', 'public');
    }

    // ✅ Lien externe
    if ($request->format === 'lien') {
        $podcast->link = $request->link;
    }

    // ✅ Image
    if ($request->hasFile('image')) {
        $podcast->image = $request->file('image')->store('podcasts/images', 'public');
    }


    $podcast->save();

    return redirect()->route('admin.podcasts.index')
                     ->with('success', 'Podcast ajouté avec succès !');
}

    // Formulaire d'édition
    public function edit(Podcast $podcast)
    {
        $categories = Category::all();
        return view('admin.podcasts.edit', compact('podcast', 'categories'));
    }

    // Mise à jour
    public function update(Request $request, Podcast $podcast)
    {
        $data = $request->only([
            'title',
            'author',
            'category_id',
            'type',
            'format',
            'link',
            'description',
            'duration',
            'image'
        ]);
    
        // ✅ Mise en avant (indépendante, audio ou vidéo)
        $data['featured'] = $request->has('featured');
    
        // ✅ Status indépendant aussi
        $data['status'] = $request->has('status') ? 'publié' : 'brouillon';
    
        // ✅ Fichier (si on modifie le fichier)
        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('podcasts', 'public');
        }
    
        // ✅ Image (si on modifie l’image)
        if ($request->hasFile('image')) {
            if ($podcast->image && Storage::disk('public')->exists($podcast->image)) {
                Storage::disk('public')->delete($podcast->image);
            }
            $data['image'] = $request->file('image')->store('podcasts/images', 'public');
        }
        
    
        $podcast->update($data);
    
        return redirect()->route('admin.podcasts.index')
                         ->with('success', 'Podcast mis à jour avec succès !');
    }
    


    // Supprimer
    public function destroy(Podcast $podcast)
    {
        if($podcast->file_path){
            \Storage::disk('public')->delete($podcast->file_path);
        }

        $podcast->delete();

        return redirect()->route('admin.podcasts.index')->with('success', 'Podcast supprimé avec succès !');
    }

    public function featured()
    {
        // On récupère uniquement les vidéos mises en avant
        $podcasts = Podcast::where('featured', true)
            ->where('type', 'video')
            ->get();

        return view('admin.podcasts.featured', compact('podcasts'));
    }
}
