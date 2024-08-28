<form action="{{route('sasistencia.update')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modalsalida" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Salida</h1>    
            </div>
            <div class="modal-body">
                @csrf
                <p id="fecha-hora1"></p>    
                        
                <p>Latitud: <span id="latitud1" ></span></p>
                <p>Longitud: <span id="longitud1" ></span></p>
                <p>Precisión: <span id="precision1" ></span> metros</p>
                <input type="text" id="latitudInput" name="lat" readonly>
                <input type="text" id="longitudInput" name="lon" readonly>
                <input type="text" id="precisionInput" name="pre" readonly>

                
                
                
  
                
            <div class="modal-footer">
                <a href="" class="btn btn-info">
                    <span class="fas fa-undo"></span> Regresar          
                </a>
                <button class="btn btn-danger">
                    <span class="fas fa-user-plus"></span> Salida
                </button>
            </div>
          </div>
        </div>
      </div> 

    
  </form>

