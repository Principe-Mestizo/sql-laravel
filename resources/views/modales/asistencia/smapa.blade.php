<form action="" method="POST" enctype="multipart/form-data">
    <!-- Modal -->
    <div class="modal fade" id="modalsmapa" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubicacion</h1>    
            </div>
            <div class="modal-body">



                @csrf

                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
        
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12 text-center">

                                        

                                        <div id="map"></div>


                                     


                                         

                                    </div>

                                    

                                </div>


                               

                            </div>
                        </div>
                    </div>
                </div>

                

  
                
            <div class="modal-footer">
                <a href="{{route('salida.salida')}}" class="btn btn-info">
                    <span class="fas fa-undo"></span> Regresar          
                </a>

            </div>
          </div>
        </div>
      </div> 
    

      
    
  </form>
