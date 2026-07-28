@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center items-center px-4 font-sans text-gray-900">
    <div class="w-full max-w-sm text-center">
        
        <!-- Titre -->
        <h1 class="text-3xl font-bold mb-8">
            Se connecter
        </h1>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('login.store') }}" class="space-y-5 text-left">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs uppercase tracking-wider mb-1 text-gray-800">
                    Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                    class="w-full px-3 py-2.5 border border-gray-800 focus:outline-none focus:ring-1 focus:ring-black text-sm"
                >
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-xs uppercase tracking-wider mb-1 text-gray-800">
                    Mot de passe
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full px-3 py-2.5 border border-gray-800 focus:outline-none focus:ring-1 focus:ring-black text-sm"
                >
                @error('password')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton -->
            <div class="pt-2 text-center">
                <button 
                    type="submit" 
                    class="w-full bg-black text-white py-3 px-6 text-sm font-medium hover:bg-gray-800 transition-colors"
                >
                    Se connecter
                </button>
            </div>
        </form>

        <!-- Lien Inscription -->
        <div class="mt-8 text-sm text-gray-800 text-center">
            <p class="mb-1">Pas encore de compte ?</p>
            <a href="{{ route('register.create') }}" class="hover:text-black">
                → <span class="underline">S'inscrire</span>
            </a>
        </div>

    </div>
</div>
@endsection