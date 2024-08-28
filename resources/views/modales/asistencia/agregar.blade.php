<form action="{{route('rasistencia.store')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modalingreso" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ingreso</h1>    
            </div>
            <div class="modal-body">
                @csrf
                <p id="fecha-hora"></p>   
                    
                <p>Latitud: <span id="latitud" name="lat"></span></p>
                <p>Longitud: <span id="longitud" name="lon"></span></p>
                <p>Precisión: <span id="precision" name="pre"></span> metros</p>
                <input type="text" id="latitudInput" name="lat" readonly>
                <input type="text" id="longitudInput" name="lon" readonly>
                <input type="text" id="precisionInput" name="pre" readonly>
               
  
                
            <div class="modal-footer">
                <a href="" class="btn btn-info">
                    <span class="fas fa-undo"></span> Regresar          
                </a>
                <button class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Ingreso
                </button>
            </div>
          </div>
        </div>
      </div> 



    
    
  </form>

