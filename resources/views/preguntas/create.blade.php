@extends('layouts.debugAcademia')
@section('tituloWeb', 'Create')
@section('enlaceCSS')
    <link rel="stylesheet" href="{{ asset('css/estiloGeneral.css') }}">   
@endsection
@section('contenido')

<div class="row mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="text-center">Nueva pregunta</h3>
    </div>
</div>

<div class="row mt-3 d-flex justify-center">
    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>

    <!-- Formulario -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <form action='{{route("pregunta.store")}}' method="post" enctype="multipart/form-data">
    @csrf    
        <div class="form-group">
          <label for="pregunta">Pregunta:</label>
          <input 
          type="text" 
          class="form-control" 
          id="pregunta" 
          name="pregunta"     
          required>
        @error('pregunta')
            <p style="color: red">{{ $message }}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="respuesta1">Respuesta 1:</label>
            <input 
            type="text" 
            class="form-control" 
            id="respuesta1" 
            name="respuesta1"          
            required>
            @error('respuesta1')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="respuesta2">Respuesta 2:</label>
            <input 
            type="text" 
            class="form-control" 
            id="respuesta2" 
            name="respuesta2"          
            required>
            @error('respuesta2')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>       
        <div class="form-group">
            <label for="respuesta_correcta">Respuesta Correcta:</label>
            <input type="text" 
            class="form-control" 
            id="respuesta_correcta" 
            name="respuesta_correcta"            
            required>
            @error('respuesta_correcta')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>        
        <div class="row">           
            <div class="col">
            <label for="categoria"></label>
            <select 
            class="form-control" 
            id="categoria" 
            name="categoria" required>
                <option value="Programación">Programación</option>
                <option value="BBDD">Bases de datos</option> 
                <option value="FOL">Formación orientación laboral</option>
                <option value="Inglés técnico">Inglés técnico</option> 
                <option value="Sistemas informáticos">Sistemas informáticos</option>
                <option value="Entornos de desarrollo">Entornos de desarrollo</option>
                <option value="Lenguaje de marcas">Lenguaje de marcas</option>
            </select>
            </div>         
            <div class="col">
            <label for="imagen" class="mt-2">Selecciona imagen</label><br>  
            <input type="file" id="imagen" name="imagen">
            @error('imagen')
            <p style="color: red">{{ $message }}</p>
            @enderror               
            </div>  
        </div>

        <div class="d-flex justify-content-center mt-4">   
            <button class="btn btn-primary m-2" type="submit">Enviar</button>
        </div>
    </form> 
    </div>
</div>            

@endsection
