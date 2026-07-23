@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 font-sans text-gray-900">

    <!-- Bouton Retour à la liste -->
    <div class="mb-6">
        <a href="{{ route('articles.index') }}" class="text-sm text-gray-800 hover:text-black flex items-center transition-colors">
            <span class="mr-1">←</span> <span class="underline">Retour à la liste</span>
        </a>
    </div>

    <!-- Article -->
    <article>

        <!-- Badges : Catégorie & Tags -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <!-- Catégorie -->
            @if($article->category)
            <span class="px-3 py-1 border border-gray-400 rounded-md text-xs text-gray-800">
                {{ $article->category->name }}
            </span>
            @endif

            <!-- Tags (Statiques pour le moment selon la maquette) -->
            <span class="px-3 py-1 border border-gray-400 rounded-md text-xs text-gray-800">
                Tag 1
            </span>
            <span class="px-3 py-1 border border-gray-400 rounded-md text-xs text-gray-800">
                Tag 2
            </span>
        </div>

        <!-- Titre principal -->
        <h1 class="text-3xl md:text-4xl font-normal text-gray-900 mb-3 tracking-tight">
            {{ $article->title }}
        </h1>

        <!-- Auteur et Date -->
        <div class="text-sm text-gray-600 mb-6">
            Par {{ $article->user->name }}
            <span class="mx-1.5">·</span>
            {{ $article->published_at->translatedFormat('j M. Y') }}
        </div>

        <!-- Séparateur Supérieur -->
        <hr class="border-t border-gray-400 mb-8" />

        <!-- Corps du texte -->
        <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4 mb-8">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Séparateur Inférieur -->
        <hr class="border-t border-gray-400 mt-8" />

    </article>

</div>
@endsection