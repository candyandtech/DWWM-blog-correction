<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    function create() : View {
        return view('auth.register');
    }

    // Traite la soumission du formulaire
    function store(Request $request) {
        // Validation : chaque règle correspond à une contrainte réelle du formulaire
        $validated = $request->validate([
            'lastname'  => ['required', 'string', 'max:50'],
            'firstname' => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'confirmed', 'min:8'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/');
    }
}
