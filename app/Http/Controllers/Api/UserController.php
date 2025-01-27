<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate([        
            'nombre' => 'required',
            'apellido' => 'required',
            'nickname' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|email',
            'password' => 'required',            
        ]);
              
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->nickname = $request->nickname;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);        
        
        $user->save();       
        return response()->json($user, 201);   
    }
}
