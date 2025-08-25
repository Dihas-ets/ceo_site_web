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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:audio,video',
            'format' => 'required|in:lien,fichier',
            'link' => 'nullable|required_if:format,lien|url',
            'file_path' => 'nullable|required_if:format,fichier|file',
        ]);

        $podcast = new Podcast();
        $podcast->title = $request->title;
        $podcast->description = $request->description;
        $podcast->author = $request->author;
        $podcast->category_id = $request->category_id;
        $podcast->type = $request->type;
        $podcast->format = $request->format;

        // Si format = fichier, on sauvegarde le fichier
        if($request->format === 'fichier' && $request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('podcasts', 'public');
            $podcast->file_path = $path;
        }

        // Si format = lien, on sauvegarde le lien
        if($request->format === 'lien') {
            $podcast->link = $request->link;
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
    $data = $request->only(['title', 'author', 'category_id', 'type', 'format', 'link']);

    // Checkbox "featured"
    $data['featured'] = $request->has('featured'); // true si cochée, false sinon
    
    if($request->hasFile('file_path')){
        $filePath = $request->file('file_path')->store('podcasts', 'public');
        $data['file_path'] = $filePath;
    }
    
    $podcast->update($data);
    

    return redirect()->route('admin.podcasts.index')->with('success', 'Podcast mis à jour avec succès !');
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
