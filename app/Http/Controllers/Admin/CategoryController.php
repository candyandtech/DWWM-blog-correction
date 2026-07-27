<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    // Affiche la liste des categories (admin)
    public function index(): View
    {
        $categories = Category::orderBy('name', 'asc')
            ->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    // Formulaire de création
    public function create()
    {
        $categories = Category::all();

        // On passe un modèle vide pour harmoniser le template d'édition et de création
        $category = new Category;

        return view('admin.categories.form', compact('categories', 'category'));
    }

    // Traitement de la création
    public function store(CategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $category = new Category($validated);

        $category->slug = Str::slug($validated['name']); // Génération automatique du slug

        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'La catégorie a été créée avec succès.');
    }

    // // Formulaire d'édition (pré-rempli)
    // public function edit(Category $category)
    // {
    //     $categories = Category::all();

    //     return view('admin.categories.form', compact('categories', 'category'));
    // }

    // // Traitement de la modification
    // public function update(CategoryRequest $request, Category $category): RedirectResponse
    // {

    //     $validated = $request->validated();
    //     $status = categoriestatus::from($validated['status']);

    //     $newStatus = categoriestatus::from($validated['status']);

    //     // Gestion de la date de publication selon le changement de statut
    //     if ($newStatus === categoriestatus::PUBLISHED && is_null($category->published_at)) {
    //         $category->published_at = now();
    //     } elseif ($newStatus === categoriestatus::DRAFT) {
    //         $category->published_at = null;
    //     }

    //     $category->fill($validated);
    //     $category->status = $status;
    //     $category->slug = Str::slug($validated['title']);

    //     $category->save();

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'L’article a été modifié avec succès.');
    // }

    // // Supprimer un category
    // public function destroy(Category $category): RedirectResponse
    // {
    //     $category->deleteOrFail();

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'L’article a été supprimé avec succès.');
    // }
}
