<form action="{{route('actualizarper.update')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modaleactualizar{{$item->codigo}}" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Usuario</h1>    
          </div>
          <div class="modal-body">
              @csrf
  
                                  <form class="user">
                                      <div class="form-group">
                                          <input type="text" class="form-control form-control-user" name="cod"
                                              value={{$item->codigo}} @readonly(true)>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                              <input type="text" class="form-control form-control-user" name="nom"
                                                  value={{$item->nombres}}>
                                          </div>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control form-control-user" name="ape"
                                                    value={{$item->apellidos}}>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="per" class="form-control" placeholder="Perfil" value={{$item->descripcion}}>
                                                @foreach ($perfil as $per)
                                                    <option value="{{ $per->id_perfil }}">{{ $per->descripcion }}</option>
                                                @endforeach
                                               
                                            </select>
                                          </div>
                                          <div class="col-sm-6">
                                            <select name="ar" class="form-control" placeholder="Area" value={{$item->descripcion_A}}>
                                                @foreach ($area as $ar)
                                                    <option value="{{ $ar->id_area }}">{{ $ar->descripcion_A }}</option>
                                                @endforeach
                                               
                                                </select>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                              <input type="password" id="p" class="form-control form-control-user"
                                                  name="cla"  placeholder="Clave">
                                                  <div id="textBox1Message" class="text-danger mt-2"></div>
                                          </div>
                                          <div class="col-sm-6">
                                              <input type="password" id="rp" class="form-control form-control-user"
                                                  name="rcla" placeholder="Repita Clave">
                                                  <div id="textBox2Message" class="text-danger mt-2"></div>
                                          </div>
                                          
                                      </div>
                                     
                                  </form>
                                  
                    
  
          <div class="modal-footer">
              <a href="" class="btn btn-info">
                  <span class="fas fa-undo"></span> Regresar          
              </a>
              <button class="btn btn-primary">
                  <span class="fas fa-user-plus"></span> Actualizar
              </button>
          </div>
        </div>
      </div>
    </div> 

    <script>
      const textBox1 = document.getElementById('p');
      const textBox2 = document.getElementById('rp');
      const textBox1Message = document.getElementById('textBox1Message');
      const textBox2Message = document.getElementById('textBox2Message');
    
      textBox1.addEventListener('input', compareTextBoxes);
      textBox2.addEventListener('input', compareTextBoxes);
    
      function compareTextBoxes() {
        const textBox1Value = textBox1.value;
        const textBox2Value = textBox2.value;
    
        const match = textBox1Value === textBox2Value;
    
        if (match) {
          textBox1Message.textContent = '';
          textBox2Message.textContent = '';
        } else {
          textBox1Message.textContent = '¡No coinciden!';
          textBox2Message.textContent = '¡No coinciden!';
        }
      }
    </script>

 



  </form>