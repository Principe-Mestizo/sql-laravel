<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <form action="{{route('login.show')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12 text-center" style="max-width: 100%; max-height:300px; overflow:hidden;">
                                <img src="/img/img.jpg" style="width:100%; height:auto; object-fit:cover;" alt="">
                            </div>
                            
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Acceso al Sistema</h1>
                                    </div>
                                    <!--

                                    @if (session()->has('error'))
                                            <div id="error-message" class="alert alert-danger">
                                            {{ session('error') }}
                                            </div>
                                    @endif

                                        -->

                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="cod" aria-describedby="emailHelp"
                                                placeholder="Ingrese Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="pass" placeholder="Ingrese Clave" required>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block" type="submit" id="login-btn">Ingresar</button>
                                       
                                        

                                        
                                       
                                    </form>
                                    
                                   
                                    
                                </div>
                            </div>
                        </div>   
                            
                        
                        
                    </div>
                </div>

            </div>

        </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="resources/js/errormodal.js"></script>
    


    <!-- 
    <script>
        const errorMessageElement = document.getElementById('error-message');
    
        setTimeout(() => {
            errorMessageElement.style.opacity = 1; // Inicializar opacidad a 1
            errorMessageElement.style.transition = 'opacity 0.3s ease'; // Definir la transición
    
            setTimeout(() => {
                errorMessageElement.style.opacity = 0; // Establecer opacidad a 0
                errorMessageElement.style.display = 'none'; // Ocultar el elemento
            }, 3000); // Tiempo de desvanecimiento en milisegundos (5 segundos)
        }, 1000); // Tiempo de espera antes de iniciar el desvanecimiento (2 segundos)
    </script> -->

    <div class="modal fade" id="errorMessageModal" tabindex="-1" aria-labelledby="errorMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title" id="errorMessageModalLabel">Error de Inicio</h5>
              
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <i class="fas fa-exclamation-triangle fa-6x"> </i>

                    </div>
                    <div class="col-8 text-center">
                        <h3><p id="errorMessageContent"></p></h3>

                    </div>
                </div>
                
            
            
            
              
            </div>
            <div class="modal-footer">
                <a href="{{route('login.index')}}" class="btn btn-info">
                    <span class="fas fa-undo"></span> OK          
                </a>
            </div>
          </div>
        </div>
      </div>


      <script>
        $(document).ready(function() {
            if ('{{ session('error') }}') {
                $('#errorMessageContent').text('{{ session('error') }}');
                $('#errorMessageModal').modal('show');
            }
        });
    </script>
      





    

    

</body>

</html>