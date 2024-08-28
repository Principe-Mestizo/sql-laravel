@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte Asistencia</h6>

                    
                    
                </div>
                
            <div class="card-body">

                <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modaleagregar">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Exportar Excel</span>
                    
                </button>
                
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Hora_ingreso</th>
                                <th>Hora_salida</th>
                                <th>Fecha</th>
                                <th>Horas_Trabajadas</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        

      

       
@endsection

