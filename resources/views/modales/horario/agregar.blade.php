<form action="{{route('reghorario.store')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modaleagregar" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Horario</h1>    
          </div>
          <div class="modal-body">
              @csrf
  
                                  <form class="user">
                                      <div class="form-group">
                                          <input type="text" class="form-control form-control-user" name="cod"
                                              placeholder="DNI">
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                              <input type="text" class="form-control form-control-user" name="hi"
                                                  placeholder="Hora Ingreso" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"
                                                  title="Por favor ingrese una hora válida en formato HH:MM" required>
                                                  
                                          </div>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control form-control-user" name="hs"
                                                  placeholder="Hora Salida" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"
                                                  title="Por favor ingrese una hora válida en formato HH:MM" required>
                                                  
                                          </div>
                                      </div>
                                      
                                     
                                  </form>
                                  
                    
  
          <div class="modal-footer">
              <a href="{{route('horario.index')}}" class="btn btn-info">
                  <span class="fas fa-undo"></span> Regresar          
              </a>
              <button class="btn btn-primary">
                  <span class="fas fa-user-plus"></span> Agregar 
              </button>
          </div>
        </div>
      </div>
    </div> 
  </form>

  <script>
    function validarHora(input) {
      const regex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
      if (!regex.test(input.value)) {
        input.setCustomValidity("Por favor ingrese una hora válida en formato HH:MM");
      } else {
        input.setCustomValidity("");
      }
    }
    </script>