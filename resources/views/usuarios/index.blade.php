@extends('layouts.debugAcademia')
@section('tituloWeb', 'Index')
@section('enlaceCSS')
    <link rel="stylesheet" href="{{ asset('css/estiloGeneral.css') }}">   
@endsection
@section('contenido')
<div class="row mt-4">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <h3>Gestión de usuarios</h3>
  </div>  
</div><br>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <a href="{{ route('user.create')}}">
  <button class="btn btn-primary">Añadir User</button>
  </a>
</div>
<!-- Tabla -->
<div class="row mt-4">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<table class="table table-striped">
    <thead>
      <tr>        
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Nickname</th>
        <th scope="col">Nacimiento</th>
        <th scope="col">Avatar</th>
        <th scope="col">Role</th>          
        <th scope="col" colspan="2">Gestionar</th>  
      </tr>
    </thead>
    <tbody>
    @php $index=0; @endphp
    @foreach ($usuarios as $usuario)    
      <tr class=tablaLinea>       
        <td>{{$usuario->nombre}}</a></td>
        <td>{{$usuario->apellido}}</td>
        <td>{{$usuario->email}}</td>        
        <td>{{$usuario->nickname}}</td>
        <td>{{$usuario->fecha_nacimiento}}</td> 
        <td><img src={{ asset('storage/' . $usuario->avatar) }} width="30px"></td>    
        <td>{{$usuario->role}}</td>
        <td><a href="{{route('user.edit',$usuario)}}"><input type="image" src="{{ asset('images/editar.png') }}" alt="Eliminar" style="width: 20px; height: 20px;"></a></td>
        <td>
          <form class="borrado-form" action="{{ route('user.destroy', $usuario) }}" method="post">
            @csrf
            @method('delete')
            <input type="image" src="{{ asset('images/bin.png') }}" alt="Eliminar" style="width: 20px; height: 20px;">
        </form></td>         
      </tr>  
    @endforeach   
    </tbody>
</table>
 {{$usuarios->links('pagination::bootstrap-5')}} 
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
                    text: "El usuario será eliminado",
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