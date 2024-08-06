<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

        // Validation
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $token = auth()->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if(!$token){

            return response()->json([
                "status" => false,
                "message" => "Données de connexion invalides"
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "L'utilisateur s'est connecté avec succès",
            "token" => $token,
            // "expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }


    // Refresh Token API - GET (JWT Auth Token)
    public function refreshToken(){

        $token = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "Nouveau token d'accès",
            "token" => $token,
            //"expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }

    // Logout API - GET (JWT Auth Token)
    public function logout(){
        
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "L'utilisateur s'est déconnecté avec succès"
        ]);
    }

}
