<form action="{{route('personal.destroy')}}" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modaleliminar{{$item->codigo}}" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>    
          </div>
          <div class="modal-body">
              @csrf
  
                                  <form class="user">
                                      <div class="form-group">
                                          <input type="text" class="form-control form-control-user" name="cod"
                                              value={{$item->codigo}} @readonly(true)>
                                      </div>
                                     
                                     
                                  </form>
                                  
                    
  
          <div class="modal-footer">
              <a href="" class="btn btn-info">
                  <span class="fas fa-undo"></span> Regresar          
              </a>
              <button class="btn btn-danger">
                  <span class="fas fa-user-plus"></span> Eliminar
              </button>
          </div>
        </div>
      </div>
    </div> 

 



  </form>