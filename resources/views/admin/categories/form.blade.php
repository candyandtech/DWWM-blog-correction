@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 font-sans">

    <!-- Bouton Retour à la liste -->
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-black flex items-center transition-colors">
            <span class="mr-2">←</span> <span class="underline">Retour à la liste</span>
        </a>
    </div>

    <!-- Titre de la page dynamique -->
    <h1 class="text-2xl font-bold mb-8 text-gray-900">
        {{ isset($category->id) ? 'Modifier la catégorie' : 'Créer une catégorie' }}
    </h1>

    <!-- Formulaire -->
    <form action="{{ isset($category->id) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST">
        @csrf
        @if(isset($category->id))
        @method('PUT')
        @endif

        <!-- Champ Nom -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Titre <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $category->name) }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black @error('name') border-red-500 @enderror"
                required>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions de validation (Annuler & Enregistrer) -->
        <div class="flex justify-end space-x-4 border-t border-gray-100 pt-6">
            <a
                href="{{ route('admin.categories.index') }}"
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