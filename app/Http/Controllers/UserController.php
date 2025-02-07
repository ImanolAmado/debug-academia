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
            'nickname' => 'required|string|max:15|min:3|unique:users,nickname,' . $usuario->id,
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'required|confirmed|min:6',            
            'role' => 'required|in:user,admin',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048'    
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->nickname = $request->nickname;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->role = $request->role;
        $usuario->password = bcrypt($request->password);
        
        
        // https://www.youtube.com/watch?v=wLA649wUPP4
        // Si existe el archivo, se guarda en la rutaimages/avatares
         if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('images/avatares', 'public');
            $usuario->avatar = $avatarPath;
        } 

        $usuario->save();                          
       
       return redirect()->route('user.index');
    }


    public function create(){
        return view('usuarios.create');       
    
    }



    public function store(Request $request, User $usuario){

        $request->validate([        
            'nombre' => 'required|string|max:100|min:3',
            'apellido' => 'required|string|max:100|min:3',
            'nickname' => 'required|string|max:15|min:3',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',            
            'role' => 'required|in:user,admin',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048'    
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->nickname = $request->nickname;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->role = $request->role;
        $usuario->password = bcrypt($request->password);
        
        
        // https://www.youtube.com/watch?v=wLA649wUPP4
        // Si existe el archivo, se guarda en la rutaimages/avatares
         if ($request->hasFile('avatar')) {
           $avatarPath = $request->file('avatar')->store('images/avatares', 'public');
           
            $usuario->avatar = $avatarPath;
        } else {
            $usuario->avatar = 'images/avatares/avatar1.png';
        }

        $usuario->save();                          
       
       return redirect()->route('user.index');
      
    
    }


    public function destroy(User $usuario){

        $usuario->delete();
        return redirect()->route('user.index');

    }



}