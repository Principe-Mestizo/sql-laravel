@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingreso Personal</h6>
                  
                    
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
                                <th>Hora Ingreso</th>
                                <th>Estado</th>
                                
                                <th>Ubicacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->marcar_ingreso}}</td>
                                <td>
                                    <?php
                                    $horaingreso =$item->hora_ingreso;
                                    $horamarcar=$item->marcar_ingreso;

                                    if($horaingreso>$horamarcar){
                                        echo ' <button type="button" class="btn btn-success btn-circle"> </button>';

                                    }else{
                                        echo ' <button type="button" class="btn btn-danger btn-circle"> </button>';

                                    }
                                    ?>
                                </td>
                                
                                <td>
                                    <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#modalmapa"
                                    data-latitud="{{$item->latitud}}" data-longitud="{{$item->longitud}}">
   
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>
                                    @include('modales.asistencia.mapa')


                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        


 

        
 @endsection