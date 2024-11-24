<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\eleves;
use App\Models\enseignants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    //

    public function register(Request $request){

        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => 'required|in:eleve,enseignant',
            
            'classe' => 'required_if:role,eleve|string|max:255',
            'matricule' => 'required_if:role,enseignant|string|max:255',


        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'eleve') {
            eleves::create([
                'user_id' => $user->id,
                'classe' => $request->classe,
            ]);
        } else {
            enseignants::create([
                'user_id' => $user->id,
                'matricule' => $request->matricule,
            ]);
        }

        ///$token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user,
            //'token' => $token,
        ], 201);


    }


    public function login (Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        
        // Chargement des relations selon le rôle
        if ($user->role === 'eleve') {
            $user->load('eleve');
        } else {
            $user->load('enseignant');
        }

        // Création du token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Connexion réussie',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie'
        ]);
    }

    
}
