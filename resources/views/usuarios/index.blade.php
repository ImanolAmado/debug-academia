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
<!-- Tabla -->
<div class="row">
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
        <th scope="col">Gestionar</th>  
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
        <td><img src={{ asset($usuario->avatar) }} width="30px"></td>    
        <td>{{$usuario->role}}</td>
        <th><a href="{{route('user.edit',$usuario)}}">Editar</a></th>

         @php $index=$index+1; @endphp
      </tr>  
    @endforeach   
    </tbody>
</table>
 {{$usuarios->links('pagination::bootstrap-5')}} 
  </div>
</div>
@endsection 