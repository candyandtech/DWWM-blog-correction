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

    // Formulaire d'édition (pré-rempli)
    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category', 'category'));
    }

    // Traitement de la modification
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {

        $validated = $request->validated();

        $category->fill($validated);
        $category->slug = Str::slug($validated['name']);

        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'La catégorie a été modifiée avec succès.');
    }

    // // Supprimer un category
    // public function destroy(Category $category): RedirectResponse
    // {
    //     $category->deleteOrFail();

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'L’article a été supprimé avec succès.');
    // }
}
