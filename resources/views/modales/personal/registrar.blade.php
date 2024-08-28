<form action="{{route('registrarper.store')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modaleagregar" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>    
          </div>
          <div class="modal-body">
              @csrf
  
                                  <form class="user">
                                      <div class="form-group">
                                          <input type="text" class="form-control form-control-user" name="cod"
                                              placeholder="DNI" required>

                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                              <input type="text" class="form-control form-control-user" name="nom"
                                                  placeholder="Nombres" required>
                                          </div>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control form-control-user" name="ape"
                                                  placeholder="Apellidos" required>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="per" class="form-control" placeholder="Perfil">
                                                @foreach ($perfil as $per)
                                                    <option value="{{ $per->id_perfil }}">{{ $per->descripcion }}</option>
                                                @endforeach
                                               
                                            </select>
                                          </div>
                                          <div class="col-sm-6">
                                            <select name="ar" class="form-control" placeholder="Area">
                                                @foreach ($area as $ar)
                                                    <option value="{{ $ar->id_area }}">{{ $ar->descripcion_A }}</option>
                                                @endforeach
                                               
                                                </select>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" id="pass" class="form-control form-control-user"
                                                name="cla"  placeholder="Clave">
                                                <div id="text1Message" class="text-danger mt-2"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" id="rpass" class="form-control form-control-user"
                                                name="rcla" placeholder="Repita Clave">
                                                <div id="text2Message" class="text-danger mt-2"></div>
                                        </div>
                                        
                                    </div>
                                     
                                  </form>


                                  
                    
  
          <div class="modal-footer">
              <a href="{{route('personal.index')}}" class="btn btn-info">
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
    const text1 = document.getElementById('pass');
    const text2 = document.getElementById('rpass');
    const text1Message = document.getElementById('textBox1Message');
    const text2Message = document.getElementById('textBox2Message');
  
    text1.addEventListener('input', compareTextBoxes);
    text2.addEventListener('input', compareTextBoxes);
  
    function compareTextBoxes() {
      const text1Value = text1.value;
      const text2Value = text2.value;
  
      const match = text1Value === text2Value;
  
      if (match) {
        text1Message.textContent = '';
        text2Message.textContent = '';
      } else {
        text1Message.textContent = '¡No coinciden!';
        text2Message.textContent = '¡No coinciden!';
      }
    }
  </script>