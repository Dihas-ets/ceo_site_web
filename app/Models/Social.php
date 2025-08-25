<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        Social::create($request->all());

        return redirect()->route('admin.socials.index')->with('success', 'Réseau social ajouté avec succès');
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    public function update(Request $request, Social $social)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        $social->update($request->all());

        return redirect()->route('admin.socials.index')->with('success', 'Réseau social modifié avec succès');
    }

    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('admin.socials.index')->with('success', 'Réseau social supprimé avec succès');
    }
}
