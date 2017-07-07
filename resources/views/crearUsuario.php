@extends('master')
@section('title')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Nuevo Usuario</div>
                @include('errores')
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuarios') }}">
                        {{ csrf_field() }} 
                      <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" >
                            </div>
                     </div>

                     <div class="form-group">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido" >
                            </div>
                     </div>

                     <div class="form-group">
                            <label for="rut" class="col-md-4 control-label">Rut</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rut" >
                            </div>
                     </div>

                     <div class="form-group">
                            <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input type="integer" class="form-control" name="telefono" >
                            </div>
                     </div>

                                              
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a class="btn btn-default btn-md" href='/usuarios'>Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    Crear Usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
