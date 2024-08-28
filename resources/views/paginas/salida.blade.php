@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Salida Personal</h6>

                    
                    
                </div>
                
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha</th>
                                <th>Hora Salida</th>
                                <th>Estado</th>
                                <th>Ubicacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos1 as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->marcar_salida}}</td>
                                <td>
                                    <?php
                                    $horasalida=$item->hora_salida;
                                    $horamarcar=$item->marcar_salida;

                                    if($horasalida>$horamarcar){
                                        
                                        echo ' <button type="button" class="btn btn-danger btn-circle"> </button>';

                                    }else{
                                        echo ' <button type="button" class="btn btn-success btn-circle"> </button>';                                        

                                    }
                                    ?>




                                </td>
                                
                                
                                

                                <td>
                                    <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#modalsmapa"
                                    data-latitud="{{$item->latitud1}}" data-longitud="{{$item->longitud1}}">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>
                                    @include('modales.asistencia.smapa')
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 
        
 @endsection