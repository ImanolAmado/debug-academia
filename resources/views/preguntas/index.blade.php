@extends('layouts.debugAcademia')
@section('tituloWeb', 'Index')
@section('enlaceCSS')
    <link rel="stylesheet" href="{{ asset('css/estiloGeneral.css') }}">   
@endsection
@section('contenido')
<div class="row mt-4">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <h3>Gestión de Preguntas</h3>
  </div>  
</div><br>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <a href="{{ route('pregunta.create')}}">
  <button class="btn btn-primary">Añadir Pregunta</button>
  </a>
</div>
<!-- Tabla -->
<div class="row mt-4">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<table class="table table-striped">
    <thead>
      <tr>      
        <th scope="col">Id</th>
        <th scope="col">Pregunta</th>
        <th scope="col">Respuesta 1</th>
        <th scope="col">Respuesta 2</th>
        <th scope="col">Respuesta Correcta</th>
        <th scope="col">Categoría</th>
        <th scope="col">Imagen</th>   
        <th scope="col" colspan="2">Gestión</th>       
      </tr>
    </thead>
    <tbody>    
    @foreach ($preguntas as $pregunta)    
      <tr class=tablaLinea>     
        <td>{{$pregunta->id}}</td>
        <td>{{$pregunta->pregunta}}</td>
        <td>{{$pregunta->respuesta1}}</td>
        <td>{{$pregunta->respuesta2}}</td>        
        <td>{{$pregunta->respuesta_correcta}}</td>
        <td>{{$pregunta->categoria}}</td>
        <td>{{$pregunta->imagen}}</td>        
       
        <td><a href="{{route('pregunta.edit',$pregunta)}}"><input type="image" src="{{ asset('images/editar.png') }}" alt="Editar" style="width: 20px; height: 20px;"></a></td>
        <td>
          <form id="borrado" action="{{ route('pregunta.destroy', $pregunta) }}" method="post">
            @csrf
            @method('delete')
            <input type="image" src="{{ asset('images/bin.png') }}" alt="Eliminar" style="width: 20px; height: 20px;">
        </form></td>            
      </tr>  
    @endforeach   
    </tbody>
</table>
 {{$preguntas->links('pagination::bootstrap-5')}} 
  </div>
</div>
@endsection 