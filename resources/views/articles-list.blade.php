@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Boucle sur les articles -->
    @foreach($articles as $article)
    <x-article-card :article="$article" />
    @endforeach

</div>
@endsection