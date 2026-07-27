<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ArticleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // Affiche la liste des articles (admin)
    public function index(): View
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.articles.index', compact('articles'));
    }

    // Formulaire de création
    public function create()
    {
        $categories = Category::all();

        // On passe un modèle vide pour harmoniser le template d'édition et de création
        $article = new Article;

        return view('admin.articles.form', compact('categories', 'article'));
    }

    // Traitement de la création
    public function store(ArticleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $status = ArticleStatus::from($validated['status']);

        $article = new Article($validated);
        $article->status = $status;

        // Gestion de la date de publication selon le changement de statut
        $article->published_at = ($status === ArticleStatus::PUBLISHED) ? now() : null;

        $article->slug = Str::slug($validated['title']); // Génération automatique du slug
        $article->user_id = 1; // TODO Récupère l'ID de l'admin connecté

        $article->save();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'L’article a été créé avec succès.');
    }

    // Formulaire d'édition (pré-rempli)
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('admin.articles.form', compact('categories', 'article'));
    }

    // Traitement de la modification
    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {

        $validated = $request->validated();
        $status = ArticleStatus::from($validated['status']);

        $newStatus = ArticleStatus::from($validated['status']);

        // Gestion de la date de publication selon le changement de statut
        if ($newStatus === ArticleStatus::PUBLISHED && is_null($article->published_at)) {
            $article->published_at = now();
        } elseif ($newStatus === ArticleStatus::DRAFT) {
            $article->published_at = null;
        }

        $article->fill($validated);
        $article->status = $status;
        $article->slug = Str::slug($validated['title']);

        $article->save();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'L’article a été modifié avec succès.');
    }

    // Supprimer un article
    public function destroy(Article $article): RedirectResponse
    {
        $article->deleteOrFail();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'L’article a été supprimé avec succès.');
    }
}
