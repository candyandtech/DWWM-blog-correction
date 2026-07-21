<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller {

    // Affiche la liste des articles
    public function index(): View {
        $articles = Article::all();
        return view('articles-list', compact('articles'));
    }

    public function show(int $id) : View {
        $article = Article::with(['category', ])->findOrFail($id);

        return view('article-detail', [
            'article' => $article
        ]);
    }

    // Affiche la liste des articles (admin)
    public function adminIndex(): View {

        $articles = Article::all();

        return view('admin.articles-list', [
            'articles' => $articles
        ]);
    }

    // Formulaire de création
    public function create() {
        $categories = Category::all();
        // On passe un modèle vide pour harmoniser le template d'édition et de création
        $article = new Article();

        return view('articles-form', compact('categories', 'article'));
    }

    // Traitement de la création
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'required|in:DRAFT,PUBLISHED',
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']); // Génération automatique du slug
        $article->content = $validated['content'];
        $article->status = $validated['status'];
        $article->category_id = $validated['category_id'];
        $article->user_id = 1; // TODO Récupère l'ID de l'admin connecté

        $newStatus = ArticleStatus::from($validated['status']);

        // Gestion de la date de publication selon le changement de statut
        if ($newStatus === ArticleStatus::PUBLISHED) {
            $article->published_at = now();
        } elseif ($newStatus === ArticleStatus::DRAFT) {
            $article->published_at = null;
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'L’article a été créé avec succès.');
    }

    // Formulaire d'édition (pré-rempli)
    public function edit(Article $article) {
        $categories = Category::all();
        
        return view('articles-form', compact('categories', 'article'));
    }

    // Traitement de la modification
    public function update(Request $request, Article $article) {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'status' => 'required|in:DRAFT,PUBLISHED',
        ]);

        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']);
        $article->content = $validated['content'];
        $article->category_id = $validated['category_id'];

        $newStatus = ArticleStatus::from($validated['status']);

        // Gestion de la date de publication selon le changement de statut
        if ($newStatus === ArticleStatus::PUBLISHED) {
            $article->published_at = now();
        } elseif ($newStatus === ArticleStatus::DRAFT) {
            $article->published_at = null;
        }

        $article->status = $validated['status'];

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'L’article a été modifié avec succès.');
    }

    // Supprimer un article
    public function destroy(Article $article) {
        $article->deleteOrFail();

        return redirect()->route('admin.articles.index')->with('success', 'L’article a été supprimé avec succès.');
    }
}
