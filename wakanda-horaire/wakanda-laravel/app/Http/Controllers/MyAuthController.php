<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;


class MyAuthController extends Controller
{

    //controller pour gérer la réception et le controle des données de connexion reçues depuis la vue
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Auth::user();
        }

        return "error";
    }


    //fonction pour controller si la personne est connectée
    public function isLogged()
    {
        if (Auth::check()) {
            return Auth::user();
        } else {
            return response()->json("");
        }
    }


    //fonction pour déconnecter l'utilisateur
    public function deconnexion()
    {
        Auth::logout();
        return response()->json("");
    }
    
}
