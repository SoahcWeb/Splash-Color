<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage; // ✅ nécessaire pour gérer les fichiers

class PortfolioController extends Controller
{
    /**
     * Affichage du portfolio (front-end)
     */
    public function index()
    {
        $items = Portfolio::all();
        return view('portfolio', compact('items'));
    }

    /**
     * Formulaire d'ajout (admin)
     */
    public function create()
    {
        $items = Portfolio::all(); // récupère toutes les images pour la vue admin
        return view('admin.portfolio.create', compact('items'));
    }

    /**
     * Enregistrement image (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('portfolio', 'public');

        Portfolio::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Image ajoutée avec succès !');
    }

    /**
     * Modification du titre d'une image (admin)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        $item = Portfolio::findOrFail($id);
        $item->title = $request->title;
        $item->save();

        return redirect()->back()->with('success', 'Titre mis à jour avec succès !');
    }

    /**
     * Suppression d'une image (admin)
     */
    public function destroy($id)
    {
        $item = Portfolio::findOrFail($id);

        // Supprime le fichier image du storage
        if (Storage::disk('public')->exists($item->image_path)) {
            Storage::disk('public')->delete($item->image_path);
        }

        $item->delete();

        return redirect()->back()->with('success', 'Image supprimée avec succès !');
    }
}
