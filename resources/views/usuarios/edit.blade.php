@extends('layouts.debugAcademia')
@section('tituloWeb', 'Index')
@section('enlaceCSS')
    <link rel="stylesheet" href="{{ asset('css/estiloGeneral.css') }}">   
@endsection
@section('contenido')

<div class="row mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="text-center">Editar usuario</h3>
    </div>
</div>

<div class="row mt-3 d-flex justify-center">
    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>

    <!-- Formulario -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <form action='{{route("user.update", $usuario)}}' method="post" enctype="multipart/form-data">
    @csrf  
    @method('put')
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input 
          type="text" 
          class="form-control" 
          id="nombre" 
          name="nombre"
          value="{{ $usuario->nombre}}"
          required>
        @error('nombre')
            <p style="color: red">{{ $message }}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input 
            type="text" 
            class="form-control" 
            id="apellido" 
            name="apellido" 
            value="{{ $usuario->apellido}}"
            required>
            @error('apellido')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            value="{{ $usuario->email}}"
            required>
            @error('email')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>       
        <div class="form-group">
            <label for="nickname">Nickname:</label>
            <input type="text" 
            class="form-control" 
            id="nickname" 
            name="nickname" 
            value="{{ $usuario->nickname}}"
            required>
            @error('nickname')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>        
        <div class="row">
            <div class="col">
                <label for="fecha_nacimiento">Fecha nacimiento:</label>
                <input type="date" 
                class="form-control" 
                id="fecha_nacimiento" 
                name="fecha_nacimiento" 
                value="{{ $usuario->fecha_nacimiento}}"
                required>  
                @error('fecha_nacimiento')
            <p style="color: red">{{ $message }}</p>
            @enderror             
            </div>
            <div class="col">
            <label for="role"></label>
            <select 
            class="form-control" 
            id="role" 
            name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>                     
            </select>
            </div>              
        </div>
        <div class="row">
            <div class="col">       
            <label for="password">Password</label>
            <input type="password" 
            class="form-control" 
            id="password" 
            name="password" 
            required>
            @error('password')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">       
            <label for="password_confirmation">Confirma Password</label>
            <input type="password" 
            class="form-control" 
            id="password_confirmation" 
            name="password_confirmation" 
            required>
            @error('password_confirmation')
            <p style="color: rgb(196, 171, 171)">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">                   
        </div>
        <div class="col">  
        <label for="avatar" class="mt-2">Selecciona Avatar</label><br>  
            <input type="file" id="avatar" name="avatar">
            @error('avatar')
        <p style="color: red">{{ $message }}</p>
        @enderror
        </div>       
    </div>              
        
    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>    

<div class="d-flex justify-content-center mt-4">   
    <a href="{{ route('user.index')}}">
        <button class="btn btn-secondary m-2" type="button">Volver</button>
    </a> 
    <button class="btn btn-primary m-2" type="submit">Enviar</button>
</div>
    </form>    
</div>            
@endsection

