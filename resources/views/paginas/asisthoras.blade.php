@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Asistencia / Horas</h6>

                    
                    
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
                                <th>Marco Entrada</th>
                                <th>Hora Entrada</th>
                                <th>Marco Salida</th>
                                <th>Hora Salida</th>
                                <th>Horas Trabajadas</th>
                                <th>Estado Entrada</th>
                                <th>Estado Salida</th>
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
                                <td>{{$item->hora_ingreso}}</td>
                                <td>{{$item->marcar_salida}}</td>
                                <td>{{$item->hora_salida}}</td>
                                <td>
                                    <?php
                                    $horaingreso =$item->marcar_ingreso;
                                    $horasalida=$item->marcar_salida;

                                    $horas = strtotime($horasalida) - strtotime($horaingreso);
                                    $horas_diferencia = gmdate('H:i:s', $horas);

                                    echo '<h6>' . $horas_diferencia . '</h6>';

                                    
                                    ?>
                                </td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 
        
 @endsection