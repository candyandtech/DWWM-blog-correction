@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center items-center px-4 font-sans text-gray-900">
    <div class="w-full max-w-md">
        
        <!-- En-tête -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-3">
                Créer un nouveau compte
            </h1>
            <p class="text-sm text-gray-800">
                Vous êtes déjà inscrit ? 
                <a href="{{ route('login.create') }}" class="hover:text-black ml-1">
                    → <span class="underline">Se connecter</span>
                </a>
            </p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
            @csrf

            <!-- Ligne Prénom / Nom -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Prénom -->
                <div>
                    <label for="firstname" class="block text-xs uppercase tracking-wider mb-1 text-gray-800">
                        Prénom
                    </label>
                    <input 
                        type="text" 
                        name="firstname" 
                        id="firstname" 
                        value="{{ old('firstname') }}" 
                        required 
                        class="w-full px-3 py-2.5 border border-gray-500 focus:outline-none focus:border-black text-sm"
                    >
                    @error('firstname')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nom -->
                <div>
                    <label for="lastname" class="block text-xs uppercase tracking-wider mb-1 text-gray-800">
                        Nom
                    </label>
                    <input 
                        type="text" 
                        name="lastname" 
                        id="lastname" 
                        value="{{ old('lastname') }}" 
                        required 
                        class="w-full px-3 py-2.5 border border-gray-500 focus:outline-none focus:border-black text-sm"
                    >
                    @error('lastname')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

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
                    class="w-full px-3 py-2.5 border border-gray-500 focus:outline-none focus:border-black text-sm"
                >
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ligne Mot de passe / Confirmation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
                        class="w-full px-3 py-2.5 border border-gray-500 focus:outline-none focus:border-black text-sm"
                    >
                    @error('password')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <label for="password_confirmation" class="block text-xs uppercase tracking-wider mb-1 text-gray-800">
                        Confirmer le mot de passe
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required 
                        class="w-full px-3 py-2.5 border border-gray-500 focus:outline-none focus:border-black text-sm"
                    >
                </div>
            </div>

            <!-- Bouton -->
            <div class="pt-4 text-center">
                <button 
                    type="submit" 
                    class="w-full sm:w-auto bg-black text-white py-3 px-10 text-sm font-medium hover:bg-gray-800 transition-colors"
                >
                    S'inscrire
                </button>
            </div>
        </form>

    </div>
</div>
@endsection