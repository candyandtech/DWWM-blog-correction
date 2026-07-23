@props(['article'])

<div class="border border-black rounded-sm p-6 flex flex-col justify-between min-h-[160px] bg-white">
    <!-- Ligne supérieure : Catégorie/Tags et Date -->
    <div class="flex justify-between items-start text-xs text-gray-600 tracking-wide">
        <div class="flex flex-wrap gap-2 uppercase">
            <span class="text-black">[ {{ $article->category->name }} ]</span>
            <!-- Exemple pour gérer des tags additionnels -->
            @if(isset($article->tags))
            @foreach($article->tags as $tag)
            <span>[ {{ $tag }} ]</span>
            @endforeach
            @endif
        </div>
        <span class="uppercase">{{ $article->published_at->translatedFormat('j M. Y') }}</span>
    </div>

    <!-- Zone centrale : Titre et Extrait -->
    <div class="my-4">
        <h2 class="text-xl font-normal mb-2 tracking-tight">
            {{ $article->title }}
        </h2>
        <p class="text-sm text-gray-600 leading-relaxed max-w-4xl">
            {{ $article->content }}
            {{-- Str::limit($article->content, 150, '...') --}}
        </p>
    </div>

    <!-- Ligne inférieure : Lien d'action -->
    <div class="text-right">
        <a href="{{ route('articles.show', $article) }}"" class=" text-sm font-medium text-black hover:underline inline-flex items-center gap-1 group">
            Lire <span class="inline-block transform group-hover:translate-x-1 transition-transform">&rarr;</span>
        </a>
    </div>

</div>