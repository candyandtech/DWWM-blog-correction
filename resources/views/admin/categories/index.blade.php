@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">

    <!-- En-tête : Titre et Bouton -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-normal tracking-tight">Catégories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-black text-white text-sm font-medium px-4 py-2 rounded-sm hover:bg-gray-800 transition">
        + Nouvelle catégorie
        </a>
    </div>

    <!-- Tableau avec bordure noire minimaliste -->
    <div class="border border-black rounded-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-black text-sm font-normal">
                    <th class="py-4 px-6">Nom</th>
                    <th class="py-4 px-6">Articles</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Boucle sur vos articles -->
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="py-4 px-6 text-sm">{{ $category->name }}</td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ count($category->articles) }}</td>
                    <td class="py-4 px-6 text-sm text-right space-x-3">
                        <!-- Icône Éditer (Crayon) -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-block text-black hover:text-gray-600" title="Modifier">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                        <!-- Icône Supprimer (Croix) -->
                        <a href="#" class="inline-block text-black hover:text-red-600" title="Supprimer">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                        <!-- Icône Publier (Avion en papier) -->
                        <a href="#" class="inline-block text-black hover:text-blue-600" title="Publier">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr colspan="2">
                    <td>Pas de catégories.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Liens de Pagination -->
        <div class="mt-8">
            {{ $categories->links() }}
        </div>
    </div>

</div>
@endsection