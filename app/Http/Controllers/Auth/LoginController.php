<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function create()
    {
        return view('auth.login');
    }

    // Traite la tentative de connexion
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auth::attempt() vérifie email + password (via Hash::check() en interne)
        // et démarre la session automatiquement si ça correspond
        if (! Auth::attempt($credentials)) {
            // onlyInput('email') : le mot de passe n'est jamais repeuplé dans le formulaire,
            // mais l'email si, pour éviter à l'utilisateur de tout retaper
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.',
            ])->onlyInput('email');
        }

        // Prévention de fixation de session : on régénère l'ID de session
        // maintenant que l'utilisateur est authentifié (cf. focus session vu ensemble)
        $request->session()->regenerate();

        // Redirige vers la page d'où l'utilisateur vient (s'il a été intercepté
        // par un middleware auth), sinon fallback sur l'accueil
        return redirect()->intended('/');
    }

    // Déconnecte l'utilisateur
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalide la session actuelle et régénère le jeton CSRF
        // — empêche toute réutilisation de la session après déconnexion
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
