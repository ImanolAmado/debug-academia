<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partida;
use App\Models\Pregunta;

use \Auth;

class UserController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate([        
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'nickname' => 'required|string|max:15',
            'fecha_nacimiento' => 'required',
            'email' => 'required|email',
            'password' => 'required',            
        ]);

             
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;

        // Miramos si existe nickname y email en la BBDD
        // antes de guardar datos. Enviamos error 402 y 403
        $existeNickname = User::where('nickname', $request->nickname)->exists(); 
        if($existeNickname){
            return response()->json(['messaje' => '¡Error, ese nickname ya existe'], 402);
        } else {
        $user->nickname = $request->nickname;
        }

        $existeEmail = User::where('email', $request->email)->exists(); 
        if($existeEmail){
            return response()->json(['messaje' => '¡Error, ese email ya existe'], 403);
        } else {
        $user->email = $request->email;
        }

        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $user->role = 'user';
        $user->avatar = 'images/avatares/avatar1.png';
        $user->password = bcrypt($request->password);         
        $user->save();       
        return response()->json($user, 201);   
    }


    public function getUserStats(){
        $user = Auth::user();

        // Número partidas usuario
        $partidas = Partida::where('user_id',$user->id)->get();        
        $numPartidas = count($partidas);

        // Preguntas acertadas
        $partida = Partida::where('user_id', $user->id)->get();
        $partida_pregunta = [];
        foreach($partida as $p){
        array_push($partida_pregunta,$p->preguntas);
        }

        return response()->json($partida_pregunta);   

    }
}
