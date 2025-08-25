<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Affiche la liste des projets
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Affiche le formulaire pour créer un projet
    public function create()
    {
        return view('admin.projects.create');
    }

    // Stocke le projet dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('projects', 'public');

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Projet ajouté avec succès !');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'link' => 'nullable|url',
    ]);

    $data = $request->only(['title', 'description', 'link']);

    if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('projects', 'public');
        $data['image'] = $imagePath;
    }

    $project->update($data);

    return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès !');
}

public function destroy(Project $project)
{
    if($project->image){
        \Storage::disk('public')->delete($project->image);
    }

    $project->delete();

    return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès !');
}


}
