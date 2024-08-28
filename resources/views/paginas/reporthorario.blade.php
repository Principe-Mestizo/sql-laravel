@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Horario Personal</h6>

                    
                    
                </div>
                
            <div class="card-body">

                <button type="button" id="exportExcel" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Exportar Informacion</span>
                    
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
            fetch('/reporthor/all')
                .then(response => response.json())
                .then(data => {
                    const headers = [
                        "DNI",
                        "NOMBRES",
                        "APELLIDOS",
                        "FECHA",
                        "MARCA ENTRADA",
                        "HORA ENTRADA",
                        "MARCA SALIDA",
                        "HORA SALIDA"
                        
                    ];
                    
                    const allData = data.map(item => [
                        item.codigo,
                        item.nombres,
                        item.apellidos,
                        item.fecha,
                        item.marcar_entrada,
                        item.hora_entrada,
                        item.marcar_salida,
                        item.hora_salida
                        
                    ]);
        
                    // Add headers at the beginning of allData
                    allData.unshift(headers);
        
                    const ws = XLSX.utils.aoa_to_sheet(allData);
                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Hoja1');
                    XLSX.writeFile(wb, 'personalhorario.xlsx');
                });
        });
        </script>
 
   
        
 @endsection
