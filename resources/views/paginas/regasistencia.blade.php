<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asistencia</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 400px; }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

            @csrf
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
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
                        <div class="row">

                            
                            <div class="col-lg-12 text-center"><div id="map" name="local"></div></div>
                            
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registro Asistencia  </h1>
                                    </div>
                          
                                        
                                        <div class="form-group">
                                            <button class="btn btn-success btn-user btn-block" type="submit" id="login-btn" data-toggle="modal" data-target="#modalingreso">Marcar Ingreso</button>
                                            
                                        </div>
                                       

                                        <div class="form-group">
                                            <button class="btn btn-danger btn-user btn-block" type="submit" id="login-btn" data-toggle="modal" data-target="#modalsalida">Marcar Salida</button>
                                        </div>      
                                    
                                </div>
                            </div>
                        </div>   
                            
                        @include('modales.asistencia.agregar')
                        
                    </div>
                </div>

            </div>

        </div>
        
    </div>

 
    @include('modales.asistencia.salir')
   



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    

    <script>
        var map = L.map('map').setView([-12.0621,-77.0320], 13);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           maxZoom:19,
        }).addTo(map);
    
    
        map.locate({setView: true, maxZoom: 16});
    
        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(map)
                .bindPopup("Estás dentro de " + radius + " metros de este punto").openPopup();
            L.circle(e.latlng, radius).addTo(map);

            latitud = e.latlng.lat;
            longitud = e.latlng.lng;
            precision = e.accuracy;



        }

    
        map.on('locationfound', onLocationFound);

        

        $('#modalingreso').on('shown.bs.modal', function () {
        // Verificar si los datos de localización están disponibles y actualizar el modal
        if (latitud && longitud && precision) {
            $('#latitud').text(latitud);
            $('#longitud').text(longitud);
            $('#precision').text(precision);
             // Obtener la fecha y hora actual
                var fechaHora = new Date();
                var fecha = fechaHora.toLocaleDateString();
                var hora = fechaHora.toLocaleTimeString();
    
             // Mostrar la fecha y hora en el elemento HTML
                var fechaHoraElemento = document.getElementById("fecha-hora");
                fechaHoraElemento.textContent = "Fecha: " + fecha + " - Hora: " + hora;

                // Obtener el valor de la latitud desde el span dentro del modal
                var latitudValue = $('#modalingreso #latitud').text();
                var longitudValue = $('#modalingreso #longitud').text();
                var precisionValue = $('#modalingreso #precision').text();

            // Asignar el valor al campo de entrada de texto dentro del modal
                $('#modalingreso #latitudInput').val(latitudValue);
                $('#modalingreso #longitudInput').val(longitudValue);
                $('#modalingreso #precisionInput').val(precisionValue);

               
        }
        });

        $('#modalsalida').on('shown.bs.modal', function () {
            if (latitud && longitud && precision) {
            $('#latitud1').text(latitud);
            $('#longitud1').text(longitud);
            $('#precision1').text(precision);
             // Obtener la fecha y hora actual
                var fechaHora = new Date();
                var fecha = fechaHora.toLocaleDateString();
                var hora = fechaHora.toLocaleTimeString();
    
             // Mostrar la fecha y hora en el elemento HTML
                var fechaHoraElemento = document.getElementById("fecha-hora1");
                fechaHoraElemento.textContent = "Fecha: " + fecha + " - Hora: " + hora;

            // Obtener el valor de la latitud desde el span dentro del modal
                var latitudValue = $('#modalsalida #latitud1').text();
                var longitudValue = $('#modalsalida #longitud1').text();
                var precisionValue = $('#modalsalida #precision1').text();

            // Asignar el valor al campo de entrada de texto dentro del modal
                $('#modalsalida #latitudInput').val(latitudValue);
                $('#modalsalida #longitudInput').val(longitudValue);
                $('#modalsalida #precisionInput').val(precisionValue);

  
        }
        
        });



    </script>

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
</script>

<style>
    .floating-error {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        padding: 10px;
        background-color: #ffcccc;
        color: #cc0000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .floating-success {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        padding: 10px;
        background-color: #6fbb87;
        color: #066325;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
</style>

<script>
    // Tiempo en milisegundos para esperar la inactividad antes de cerrar la sesión (por ejemplo, 5 segundos)
    const tiempoInactividadCerrarSesion = 50000;
    let temporizadorInactividad;

    function reiniciarTemporizador() {
        if (temporizadorInactividad) {
            clearTimeout(temporizadorInactividad);
        }

        temporizadorInactividad = setTimeout(function() {
            window.location.href = "{{ route('login.destroy') }}";
        }, tiempoInactividadCerrarSesion);
    }

    // Escuchar eventos de actividad del usuario
    document.addEventListener('mousemove', reiniciarTemporizador);
    document.addEventListener('keypress', reiniciarTemporizador);

    // Iniciar el temporizador al cargar la página
    reiniciarTemporizador();
</script>

</body>

</html>