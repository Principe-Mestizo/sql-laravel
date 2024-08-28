@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Salida Personal</h6>
                  
                    
                </div>
                
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <button  type="button" id="exportExcel" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Exportar Informacion</span>
                            
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        
                        <a href="{{route('reportsalida.reportout')}}" class="btn btn-warning">
                            <span class="fas fa-undo"></span> limpiar filtro         
                        </a>

                    </div>
                </div>
                <hr>
                <form action="{{route('filtrosalida.filtroout')}}" method="GET">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-6"> <label for="start_date">Fecha de inicio:</label> </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">  <input type="date"  name="fechain" class="form-control block"> </div>
                        <div class="col-lg-2 col-md-2 col-sm-6"> <label for="end_date">Fecha de fin:</label></div>
                        <div class="col-lg-4 col-md-4 col-sm-6"> <input type="date"  name="fechaout" class="form-control block"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar por fechas</button>
                </form>
                <hr>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha</th>
                                <th>Marca Salida</th>
                                <th>Hora Salida</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->marcar_salida}}</td>
                                <td>{{$item->hora_salida}}</td>
                                <td>{{$item->latitud1}}</td>
                                <td>{{$item->longitud1}}</td>
                                

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>


        <script>
            document.getElementById('exportExcel').addEventListener('click', function () {
            fetch('/reportout/all')
                .then(response => response.json())
                .then(data => {
                    const headers = [
                        "DNI",
                        "NOMBRES",
                        "APELLIDOS",
                        "FECHA",
                        "MARCA SALIDA",
                        "HORA SALIDA",
                        "LATITUD",
                        "LONGITUD"
                    ];
                    
                    const allData = data.map(item => [
                        item.codigo,
                        item.nombres,
                        item.apellidos,
                        item.fecha,
                        item.marcar_salida,
                        item.hora_salida,
                        item.latitud1,
                        item.longitud1
                    ]);
        
                    // Add headers at the beginning of allData
                    allData.unshift(headers);
        
                    const ws = XLSX.utils.aoa_to_sheet(allData);
                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Hoja1');
                    XLSX.writeFile(wb, 'personalsalida.xlsx');
                });
        });
        </script>



 @endsection