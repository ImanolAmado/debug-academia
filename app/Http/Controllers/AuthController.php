<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class AuthController extends Controller
{

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('App')->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user]);
        }
        return response()->json(['messaje' => 'no autorizado'], 401);
    }
    
    
    public function logout(Request $request){
    
        // revoca el token del usuario
        $request->user()->tokens->each(function ($token){
            $token->delete();
        });
    
        return response()->json(['messaje' => 'logout exitoso']);
    }
}
