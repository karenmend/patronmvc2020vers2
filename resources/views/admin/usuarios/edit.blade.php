@extends('layouts.admin')

@section('titulo','Administración | Editar Usuario')
@section('titulo2','Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')
<a class="btn btn-primary btn-sm"
    style="margin-bottom: 10px;"
    href="{{route('usuarios.index')}}">
    <i class="fas fa-arrow-left"></i>
    Volver a lista de usuarios</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('exito'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                    {{Session::get('exito')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Error!</h5>
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar usuario: {{$usuario->id}}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" 
                        action="{{route('usuarios.update',$usuario->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" value="{{$usuario->name}}"
                                name="txtNombre" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email"
                                 name="txtEmail" disabled value="{{$usuario->email}}"/>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control"  type="password"
                                rows="12" name="txtContrasena"/>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input class="form-control"  type="password"
                                rows="12" name="txtContrasenaVerf"/>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

@section('estilos')
@endsection