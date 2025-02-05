<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use \Auth;

class UserController extends Controller
{

    public function index()
    {        
    // Todos los usuarios ordenados por fecha de creación
    $usuarios=User::orderBy('created_at','desc')->paginate();    
    return view('usuarios.index', compact('usuarios'));
        
    }


    public function edit(User $usuario){   

    return view('usuarios.edit', compact('usuario'));
    }


    

    function update(Request $request, User $usuario){    
        
        $request->validate([        
            'nombre' => 'required|string|max:100|min:3',
            'apellido' => 'required|string|max:100|min:3',
            'nickname' => 'required|string|max:15|min:3',
            'fecha_nacimiento' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',            
            'role' => 'required|in:user,admin'    
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->nickname = $request->nickname;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->role = $request->role;
        $usuario->password = $request->password;

     
                
        $correcto = 5;
        try {
        $usuario->save();
        } catch (Exception $e) {
            $correcto=6;
        }
        return redirect()->route('user.index')->with('correcto',$correcto);
    }







    public function store(User $usuario){

      
    
    }



}