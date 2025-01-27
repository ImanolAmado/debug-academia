<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            $token = $user->createToken('debugApp')->plainTextToken;
            return response()->json(['token' => $token]);
        }
        return response()->json(['messaje' => 'No autorizado'], 401);
    }
    
    
    public function logout(Request $request){
    
        // revoca el token del usuario
        $request->user()->tokens->each(function ($token){
            $token->delete();
        });
    
        return response()->json(['messaje' => 'logout exitoso']);
    }
    

}
