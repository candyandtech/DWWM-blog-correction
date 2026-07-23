@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 font-sans">

    <!-- Bouton Retour à la liste -->
    <div class="mb-8">
        <a href="{{ route('admin.articles.index') }}" class="text-sm text-gray-600 hover:text-black flex items-center transition-colors">
            <span class="mr-2">←</span> <span class="underline">Retour à la liste</span>
        </a>
    </div>

    <!-- Titre de la page dynamique -->
    <h1 class="text-2xl font-bold mb-8 text-gray-900">
        {{ isset($article->id) ? 'Modifier l’article' : 'Créer un article' }}
    </h1>

    <!-- Formulaire -->
    <form action="{{ isset($article->id) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" method="POST">
        @csrf
        @if(isset($article->id))
        @method('PUT')
        @endif

        <!-- Champ Titre -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                Titre <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $article->title) }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black @error('title') border-red-500 @enderror"
                required>
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Catégorie -->
        <div class="mb-6">
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                Catégorie <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <select
                    name="category_id"
                    id="category_id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black bg-white @error('category_id') border-red-500 @enderror"
                    required>
                    <option value="" disabled {{ is_null(old('category_id', $article->category_id)) ? 'selected' : '' }}>Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <!-- Flèche personnalisée de la liste déroulante -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
            @error('category_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Section Tags (Visuel conforme à la maquette - Branchement BDD ignoré) -->
        <div class="mb-6">
            <span class="block text-sm font-medium text-gray-700 mb-2">Tags</span>
            <div class="flex flex-wrap gap-2 items-center">
                <!-- Tag Statique 1 -->
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-gray-300 text-gray-800">
                    Tag 1
                    <button type="button" class="ml-2 focus:outline-none text-gray-600 hover:text-black">×</button>
                </span>
                <!-- Tag Statique 2 -->
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-gray-300 text-gray-800">
                    Tag 2
                    <button type="button" class="ml-2 focus:outline-none text-gray-600 hover:text-black">×</button>
                </span>
                <!-- Bouton Ajouter un Tag -->
                <button type="button" class="inline-flex items-center px-4 py-1.5 border border-black rounded-full text-sm font-medium text-black bg-white hover:bg-gray-50 focus:outline-none">
                    + &nbsp; Ajouter un tag
                </button>
            </div>
        </div>

        <!-- Champ Contenu -->
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                Contenu <span class="text-red-500">*</span>
            </label>
            <textarea
                name="content"
                id="content"
                rows="8"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black @error('content') border-red-500 @enderror"
                required>{{ old('content', $article->content) }}</textarea>
            @error('content')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Statut -->
        <div class="mb-8">
            <span class="block text-sm font-medium text-gray-700 mb-3">Statut</span>
            <div class="flex items-center space-x-6">
                <!-- Option Brouillon (Valeur 'draft' / Sélectionné par défaut) -->
                <label class="inline-flex items-center cursor-pointer">
                    <input
                        type="radio"
                        name="status"
                        value="{{ \App\Enums\ArticleStatus::DRAFT }}"
                        class="form-radio text-black focus:ring-black h-4 w-4 border-gray-300"
                        {{ old('status', $article->status ?? \App\Enums\ArticleStatus::DRAFT) === \App\Enums\ArticleStatus::DRAFT ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-900">{{ \App\Enums\ArticleStatus::DRAFT->label() }}</span>
                </label>
                <!-- Option Publié (Valeur 'published') -->
                <label class="inline-flex items-center cursor-pointer">
                    <input
                        type="radio"
                        name="status"
                        value="{{ \App\Enums\ArticleStatus::PUBLISHED }}"
                        class="form-radio text-black focus:ring-black h-4 w-4 border-gray-300"
                        {{ old('status', $article->status) === \App\Enums\ArticleStatus::PUBLISHED ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-900">{{ \App\Enums\ArticleStatus::PUBLISHED->label() }}</span>
                </label>
            </div>
            @error('status')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions de validation (Annuler & Enregistrer) -->
        <div class="flex justify-end space-x-4 border-t border-gray-100 pt-6">
            <a
                href="{{ route('admin.articles.index') }}"
                class="px-8 py-3 border border-gray-300 rounded-sm text-sm font-medium text-black hover:bg-gray-50 transition-colors">
                Annuler
            </a>
            <button
                type="submit"
                class="px-8 py-3 bg-black text-white rounded-sm text-sm font-medium hover:bg-gray-900 transition-colors">
                Enregistrer
            </button>
        </div>

    </form>
</div>
@endsection