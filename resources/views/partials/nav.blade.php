<nav class="sticky top-0 z-50 bg-white border-b border-black py-4 px-6 mb-8 font-sans text-gray-900">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- Logo / Placeholder (Gauche) -->
        <a href="{{ route('home') }}" class="flex items-center">
            <div class="w-10 h-10 border border-black relative flex items-center justify-center">
                <svg class="w-full h-full text-black stroke-current" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <line x1="0" y1="0" x2="100" y2="100" stroke-width="1.5" />
                    <line x1="100" y1="0" x2="0" y2="100" stroke-width="1.5" />
                </svg>
            </div>
        </a>

        <!-- Liens d'authentification (Droite) -->
        <div class="flex items-center space-x-6 text-sm">
            
            @guest
                <!-- --- SI L'UTILISATEUR EST DÉCONNECTÉ --- -->
                <a href="{{ route('login.create') }}" class="underline hover:text-black transition-colors">
                    Se connecter
                </a>
                
                <a href="{{ route('register.create') }}" class="underline hover:text-black transition-colors">
                    S'inscrire
                </a>
            @endguest

            @auth
                <!-- --- SI L'UTILISATEUR EST CONNECTÉ --- -->
                <div class="flex items-center space-x-3">
                    <!-- Prénom Nom -->
                    <span>
                        {{ Auth::user()->firstname ?? '' }} {{ Auth::user()->lastname ?? '' }}
                    </span>

                    <!-- Pastille avec l'initiale -->
                    <div class="w-8 h-8 rounded-full bg-gray-500 text-white flex items-center justify-center text-xs font-semibold uppercase">
                        {{ mb_substr(Auth::user()->firstname ?? '', 0, 1) }}
                    </div>
                </div>

                <!-- Bouton de Déconnexion (POST) -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="underline hover:text-black transition-colors">
                        Se déconnecter
                    </button>
                </form>
            @endauth

        </div>

    </div>
</nav>