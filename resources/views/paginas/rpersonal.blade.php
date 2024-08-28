@extends('plantilla/plantilla')

@section("tituloPagina", "Inicio")


@section('contenido')



        <div class="container container-fluid">
       
            <div class="card shadow mb-4 position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal</h6>

                    
                    
                </div>
                
            <div class="card-body">

                @if (session()->has('error'))
                <div id="error-message" class="alert alert-danger floating-error">
                {{ session('error') }}
                </div>
                @endif

                @if (session()->has('success'))
                <div id="error-message" class="alert alert-success floating-success">
                {{ session('success') }}
                </div>
                @endif

                <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modaleagregar">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Agregar Personal</span>
                    <input type="hidden" id="errorInput" name="error" value="{{ session('error') }}">
                    
                </button>
                
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Perfil</th>
                                <th>area</th>
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
                                <td>{{$item->descripcion}}</td>
                                <td>{{$item->descripcion_A}}</td>
                                                                
                                <td>
                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modaleactualizar{{$item->codigo}}">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        
                                    </button>
                                    @include('modales.personal.actualizar')
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modaleliminar{{$item->codigo}}">
                                        <i class="fas fa-trash"></i>
                                        
                                    </button>
                                    @include('modales.personal.eliminar')
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        

        @include('modales.personal.registrar')


    

       
@endsection

