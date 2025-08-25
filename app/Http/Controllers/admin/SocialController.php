<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Liste des réseaux sociaux
     */
    public function index()
    {
        $socials = Social::all();
        return view('admin.socials.index', compact('socials'));
    }

    /**
     * Formulaire d’ajout
     */
    public function create()
    {
        return view('admin.socials.create');
    }

    /**
     * Enregistrer un nouveau réseau social
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'link' => 'nullable|url',
        ]);

        Social::create($request->all());

        return redirect()->route('admin.socials.index')->with('success', 'Réseau social ajouté avec succès ✅');
    }

    /**
     * Formulaire de modification
     */
    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    /**
     * Mettre à jour un réseau social
     */
    public function update(Request $request, Social $social)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'link' => 'nullable|url',
        ]);

        $social->update($request->all());

        return redirect()->route('admin.socials.index')->with('success', 'Réseau social mis à jour ✅');
    }

    /**
     * Supprimer un réseau social
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('admin.socials.index')->with('success', 'Réseau social supprimé ❌');
    }
}
