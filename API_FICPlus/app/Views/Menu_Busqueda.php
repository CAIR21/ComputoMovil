<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.0/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
  .resultado{
    transition: transform 0.3s ease, border 0.3s ease; /* Transiciones suaves */
  }
  .resultado:hover{
    transform: scale(0.9); /* Hacer que la imagen sea un 10% más grande */
    border: 2px solid white; /* Agregar un borde blanco de 2px */
    transition: transform 0.3s ease, border 0.3s ease; /* Agregar transiciones suaves */
  }
    </style>
    <script>
      function redirigir() {
            var valorCajaTexto = document.getElementById('Busqueda').value;
            if (valorCajaTexto.trim() !== '') {
                // Construir la nueva URL y redirigir
                var nuevaUrl = '<?= base_url('busqueda') ?>/' + valorCajaTexto;
                window.location.href = nuevaUrl;
            } else {
                alert('Por favor, introduce un valor antes de redirigir.');
            }
        }
        $.ajax({
            type: 'GET',
            url: '<?= base_url('usuarios') ?>/' + 1, // Ruta al controlador y método
            dataType: 'json',
              success: function(response) {
                // Maneja la respuesta del servidor
              var h = document.getElementById('usuario');
              h.textContent =  response.Nombre_Usuario;
              console.log(response);
              procesarDatos(response);
              },
              error: function(error) {
                // Maneja errores de la solicitud
              console.log(error);
              alert('Error al procesar el formulario');
              }
         });

      $.ajax({
            type: 'GET',
            url: '<?= base_url('busquedaPeliculas') ?>/' + '<?= $Suchen ?>', // Ruta al controlador y método
            dataType: 'json',
              success: function(response) {
                // Maneja la respuesta del servidor
              console.log(response);
              var h = document.getElementById('Such');
              h.textContent =  '<?= $Suchen ?>';
              procesarDatos(response);
              },
              error: function(error) {
                // Maneja errores de la solicitud
              console.log(error);
              var h = document.getElementById('Such');
              h.textContent = 'No hubo coincidencias';
              }
         });

         function procesarDatos(Datos){
          miDiv = document.getElementById('Elementos');

          for(var i = 0;i < Datos.length; i++){
            var nuevoImg = document.createElement('img');
            var nuevoA = document.createElement('a');
            nuevoImg.className = "resultado p-1 rounded-4";
            nuevoImg.src = Datos[i].Poster_Pelicula;
            nuevoImg.alt = Datos[i].Titulo;
            nuevoImg.style = "height: 250px; width: auto; cursor:pointer;";
            nuevoA.href = '<?= base_url('peliculas') ?>/' + Datos[i].ID_Peliculas;
            nuevoA.appendChild(nuevoImg);
            miDiv.appendChild(nuevoA);
          }
          
         }
      
    </script>
</head>
<body class="bg-dark m-0 p-0">
    <!-- sidebar -->
    <div class="offcanvas offcanvas-start bg-black bg-gradient text-bg-white rounded-end-4 shadow-lg" style="width:18vw" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <!-- <img src="..." width="60" height="50" alt="Imagen Logo" class="logo_central offcanvas-title"> -->
            <button type="button" class="btn-close text-reset btn-close-white px-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <li class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-2 px-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src='<?= base_url('IMG') ?>/batman.png' alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1" id="usuario">Batman</span>
                    </a>
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-2 px-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src='<?= base_url('IMG') ?>/Plus.png' alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">Añadir perfil</span>
                </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="../Paginas/usuarios.php">Cambiar Perfil</a></li>
                        <li><a class="dropdown-item" href="../Paginas/AdminCuenta.php">Cuenta</a></li>
                        <li><a class="dropdown-item" href="https://drive.google.com/file/d/19yZboVrSkL9N32auK7AOJ-6o9M-pL7Mz/view?usp=share_link" target="_blank">Ayuda</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../cerrar_sesion.php">Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a style ="Color: White;" href='<?= base_url('Principal') ?>' class="nav-link text-truncate">
                        <i class="material-icons d-none d-sm-inline" style="font-size:36px">home</i><span class="ms-1 d-none d-sm-inline">Menu principal</span>
                    </a>
                    
                </li>
                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-truncate">
                        <i class="fs-4 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline" style="color: White">Categorias</span></a>
                    <ul class="collapse nav flex-column" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href='<?= base_url('BusquedaCat') ?>/Accion' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Acción</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Terror' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Terror</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Animacion' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Animacion</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Suspenso' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Suspenso</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Drama' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Drama</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Comedia' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Comedia</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Misterio' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Misterio</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Infantiles' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Infantiles</span></a>
                            <a href='<?= base_url('BusquedaCat') ?>/Anime' class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Anime</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a style ="Color: White;" href="../Paginas/Guardados.php" class="nav-link text-truncate">
                        <i class="fa fa-bookmark ms-1 d-none pe-2 d-sm-inline" style="font-size:24px"></i><span class="ms-1 d-none d-sm-inline">Guardados</span></a>
                </li>
            </ul>
            
        </div>
        <div class="dropdown pb-4">
            <a href="#" class="nav-link px-5" style="Color: white" id="dropdownUser1">
                <span class="d-none d-sm-inline mx-1">o</span>
            </a>
        </div>
    </div>
    <!-- sidebar -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark bg-gradient w-100 sticky-top" >
        <div class="container-fluid">
          <a class="navbar-brand text-white" href='<?= base_url('Principal') ?>'>FIC+</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white px-4" aria-current="page"href='<?= base_url('Principal') ?>'><strong>Inicio</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white px-4" href='<?= base_url('Categorias') ?>'><strong>Categorias</strong></a>
              </li>
            </ul>
            <div class="d-flex align-items-center " style="Color: White">
              <button class="btn btn-outline-light me-2" onclick="redirigir();"type="submit"><i class="fa fa-search" style="font-size:20px"></i></button>
              <input class="form-control" type="search" name="Suchen" placeholder="Search" aria-label="Search" id="Busqueda">
            </div>
          </div>
        </div>
      </nav>
    <!-- navbar -->
    <!-- Peliculas -->
    <h1 class="text-bg-dark text-center" id="Such"><?= $Suchen ?></h1>
    <section class="container-fluid text-center m-0 p-0">
        <div class="d-flex flex-wrap text-center" id="Elementos">

        </div>
    </section>
    
    <!-- Peliculas -->
   
    <!-- footer -->
    <div class="container mt-5">
      <div class="row border-top  text-bg-dark">
        <div class="col mb-5 ">FicPlus™</div>
        <div class="col mb-5">Acerda de.</div>
        <div class="col mb-5">Propiedad de "Los Aldapas"</div>
      </div>
    </div>
    <!-- footer -->

<div class="container-fluid" style="position: fixed; top: 50px; left:0; ">
        <div class="row">
            <div class="col-1 py-3">
                <!-- toggler -->
                <button class="btn btn-secondary float-start shadow-lg" data-bs-toggle="offcanvas" style= "width: 5vw; "data-bs-target="#offcanvas" role="button">
                    <i class="fal fa-bars"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
                </button>
            </div>
    </div>
    
</body>

</html>