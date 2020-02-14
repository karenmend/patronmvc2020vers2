@extends('layouts.admin')

@section('titulo','Administración | Usuarios')
@section('titulo2','Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')
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
                    <h3 class="card-title">Lista de usuarios</h3>
                </div>
                <div class="card-body">

                    <a href="{{route('usuarios.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>Agregar Usuario
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí van las noticias -->
                            @foreach($usuario as $usuario)
                                <tr>
                                    <td>{{$usuario->name}}</td>
                                    <td>

                                            <a
                                            href="{{route('usuarios.show',$usuario->id)}}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button  onclick="modal({{$usuario->id}})"
                                                class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                <i class="fas fa-times"></i>
                                            </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
        <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
    <form name="newForm" method="POST" >
                                            @csrf
                                            @method('DELETE')
        <button type="submit" class="btn btn-danger" >Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </form>
    </div>
    </div>

</div>
</div>
<script>
    function modal(id)
    {
        var id = id;
        var url = '{{ route("usuarios.destroy", ":id") }}';
        url = url.replace(':id', id);
        document.newForm.action = url;
    }
</script>
@endsection

@section('scripts')
@endsection

@section('estilos')
@endsection
