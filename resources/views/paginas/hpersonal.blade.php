@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Horario Personal</h6>

                    
                    
                </div>
                
            <div class="card-body">

                <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modaleagregar">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Agregar Horario</span>
                    
                </button>
                
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Hora_ingreso</th>
                                <th>Hora_salida</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->hora_ingreso}}</td>
                                <td>{{$item->hora_salida}}</td>
                                
                                
                                
                                <td>
                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modaleactualizar{{$item->id_horario}}">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </button>
                                    @include('modales.horario.actualizar')
                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modaleeliminar{{$item->id_horario}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('modales.horario.eliminar')
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('modales.horario.agregar')
        
 @endsection

      

       

