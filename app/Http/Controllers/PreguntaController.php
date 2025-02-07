<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use \Auth;

class PreguntaController extends Controller
{

    public function index()
    {        
    // Todos los usuarios ordenados por fecha de creación
    $preguntas=Pregunta::orderBy('created_at','desc')->paginate();    
    return view('preguntas.index', compact('preguntas')); 

    }


    public function edit(Pregunta $pregunta){   
    return view('preguntas.edit', compact('pregunta'));

    }

    

    function update(Request $request, Pregunta $pregunta){    
               
        $request->validate([        
            'pregunta' => 'required',
            'respuesta1' => 'required|string|max:250',
            'respuesta2' => 'required|string|max:250',
            'respuesta_correcta' => 'required|string|max:250',
            'categoria' => 'required|in:Programación,BBDD,Lenguaje de marcas,Entornos de desarrollo,Sistemas informáticos,FOL,Inglés técnico',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'    
        ]);

        $pregunta->pregunta = $request->pregunta;
        $pregunta->respuesta1 = $request->respuesta1;
        $pregunta->respuesta2 = $request->respuesta2;
        $pregunta->respuesta_correcta = $request->respuesta_correcta;
        $pregunta->categoria = $request->categoria;
           
        
        // https://www.youtube.com/watch?v=wLA649wUPP4
        // Si existe el archivo, se guarda en la ruta images/preguntas
         if ($request->hasFile('imagen')) {
           $imagenPath = $request->file('imagen')->store('images/preguntas', 'public');
           
            $pregunta->imagen = $imagenPath;       
        }

        $pregunta->save();
       
       return redirect()->route('pregunta.index');
    }


    public function create(){
        return view('preguntas.create');       
    
    }



    public function store(Request $request, Pregunta $pregunta){

        $request->validate([        
            'pregunta' => 'required',
            'respuesta1' => 'required|string|max:250',
            'respuesta2' => 'required|string|max:250',
            'respuesta_correcta' => 'required|string|max:250',
            'categoria' => 'required|in:Programación,BBDD,Lenguaje de marcas,Entornos de desarrollo,Sistemas informáticos,FOL,Inglés técnico',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'    
        ]);

        $pregunta->pregunta = $request->pregunta;
        $pregunta->respuesta1 = $request->respuesta1;
        $pregunta->respuesta2 = $request->respuesta2;
        $pregunta->respuesta_correcta = $request->respuesta_correcta;
        $pregunta->categoria = $request->categoria;
           
        
        // https://www.youtube.com/watch?v=wLA649wUPP4
        // Si existe el archivo, se guarda en la rutaimages/preguntas
         if ($request->hasFile('imagen')) {
           $imagenPath = $request->file('imagen')->store('images/preguntas', 'public');
           
            $pregunta->imagen = $imagenPath;
        } else {
            $pregunta->imagen = 'images/preguntas/00.jpg';
        }

        $pregunta->save();                    
       
       return redirect()->route('pregunta.index');
          
    }


    public function destroy(Pregunta $pregunta){

        $pregunta->delete();
        return redirect()->route('pregunta.index');

    }



}