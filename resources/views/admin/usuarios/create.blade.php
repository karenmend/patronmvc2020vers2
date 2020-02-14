@extends('layouts.admin')

@section('titulo','Administración | Crear usuario')
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
     <div class="alert alert-danger alert-dismissible" name="newDiv"  style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Error!</h5>
                    <script>
                        document.write(confirmacion);
                 </script>
                </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear usuario</h3>
                </div>
                <div class="card-body">
                    <form method="POST" name="newForm"  action="{{route('usuarios.store')}}"
                       >
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" 
                                name="txtNombre" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Correo Electronico</label>
                                <input type="email" 
                                    name="txtEmail" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                                <input type="password" type="password"
                                    name="txtContrasena" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                                <input type="password" 
                                    name="txtContrasenaVerf" class="form-control"  />
                        </div>
                        <div class="form-group">
                            <button  
                            onclick="verificarContrasena()"
                                class="btn btn-primary" name="newButton">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function verificarContrasena()
    {
        console.log(contra1)
            console.log(contra2)
        var contra1 = document.getElementsByName("txtContrasena")[0].value;
        var contra2 = document.getElementsByName("txtContrasenaVerf")[0].value;
        
        if(contra1.value != contra2.value)
        {
            console.log(contra1)
            console.log(contra2)
            var confirmacion = "Las contraseñas no coinciden."
            var display = "display: block;"
            var btn = "button"
            document.newDiv.style = display;  
            document.newButton.type = btn; 
           
        }
        else
        {
             document.newButton.type = "submit"; 
        }
         
    }
    </script>
</div>

@endsection

@section('scripts')
@endsection

@section('estilos')
@endsection