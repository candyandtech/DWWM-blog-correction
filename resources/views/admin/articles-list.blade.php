@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Zone d'affichage du message Flash de succès -->
    @if (session('success'))
    <div class="mb-6 p-4 text-sm text-green-800 bg-green-50 border border-green-200 rounded-md flex items-center justify-between" role="alert">
        <div class="flex items-center">
            <!-- Icône check de confirmation -->
            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <!-- En-tête : Titre et Bouton -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-normal tracking-tight">Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="bg-black text-white text-sm font-medium px-4 py-2 rounded-sm hover:bg-gray-800 transition">
            + Nouvel article
        </a>
    </div>

    <!-- Tableau avec bordure noire minimaliste -->
    <div class="border border-black rounded-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-black text-sm font-normal">
                    <th class="py-4 px-6">Titre</th>
                    <th class="py-4 px-6">Catégorie</th>
                    <th class="py-4 px-6">Statut</th>
                    <th class="py-4 px-6">Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Boucle sur vos articles -->
                @foreach($articles as $article)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="py-4 px-6 text-sm">{{ $article->title }}</td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $article->category->name }}</td>
                    <td class="py-4 px-6 text-sm">
                        <span class="inline-flex items-center gap-2">
                            <!-- Pastille verte si publié, grise sinon -->
                            <span class="w-2.5 h-2.5 rounded-full {{ $article->status === App\Enums\ArticleStatus::PUBLISHED ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            {{ $article->status === App\Enums\ArticleStatus::PUBLISHED ? 'Publié' : 'Brouillon' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $article->status === App\Enums\ArticleStatus::PUBLISHED ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y')  }}</td>
                    <td class="py-4 px-6 text-sm text-right space-x-3">
                        <!-- Icône Éditer (Crayon) -->
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-block text-black hover:text-gray-600" title="Modifier">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                        <!-- Icône Supprimer (Croix) (Formulaire DELETE) -->
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cet article ?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="inline-block text-black hover:text-red-600 focus:outline-none" title="Supprimer">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                        <!-- Icône Publier (Avion en papier) -->
                        <a href="#" class="inline-block text-black hover:text-blue-600" title="Publier">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Liens de Pagination -->
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>

</div>
@endsection