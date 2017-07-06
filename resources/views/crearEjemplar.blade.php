@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Nuevo Ejemplar</div>
                @include('errores')
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/ejemplares') }}">
                        {{ csrf_field() }} {{--  token necesario para realizar la consulta --}}

                      <div class="form-group">
                            <label for="libro_id" class="col-md-4 control-label">Seleccione Libro</label>
                            <div class="col-md-6">
                                <select class="form-control" name="libro_id" >
                                   @foreach ($libros as $libro)
                                         <option value="{{ $libro->libro_id }}">{{ $libro->titulo }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado_id" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                                <select class="form-control" name="estado_id" >
                                   @foreach ($estados as $estado)
                                         <option value="{{ $estado->estado_id }}">{{ $estado->descripcion }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="usuario_id" class="col-md-4 control-label">Seleccione usuario</label>
                            <div class="col-md-6">
                                <select class="form-control" name="usuario_id" >
                                   @foreach ($usuarios as $usuario)
                                         <option value="{{ $usuario->usuario_id }}">{{ $usuario->nombre }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="fecha_prestamo" class="col-md-4 control-label">Fecha de prestamo</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="fecha_prestamo" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fecha_devolucion" class="col-md-4 control-label">Fecha de devolución</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="fecha_devolucion" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	<a class="btn btn-default btn-md" href='/ejemplares'>Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    Crear Ejemplar
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
