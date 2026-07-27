<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // Affiche la liste des articles
    public function index(): View
    {
        // On ne récupère que les articles au statut "PUBLISHED", ordonnés par date de création, 5 par page
        $articles = Article::where('status', '=', ArticleStatus::PUBLISHED->value, 'and')
            ->latest() // Équivalent à orderBy('created_at', 'desc')
            ->paginate(5); // Ajuste le nombre d'articles par page si besoin

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }
}
