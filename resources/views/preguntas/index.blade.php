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
</div>
<div class="row d-flex">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <a href="{{ route('pregunta.create')}}">
    <button class="btn btn-primary">Añadir Pregunta</button></a>
    <a href="{{ route('pregunta.api')}}">
      <button class="btn btn-primary m-3">Consumir Api</button></a>
  </div>
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
          <form class="borrado-form" action="{{ route('pregunta.destroy', $pregunta) }}" method="post">
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
@section('misAlertas')
<!-- Script para sacar alertas de SweetAlert. Captura evento de envío
    del formulario para eliminar registro y pide confirmación al usuario -->

<!-- VIDEO:  https://www.youtube.com/watch?v=QdnYTOuze1s  -->
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.borrado-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "La pregunta será eliminada",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>
@endsection 