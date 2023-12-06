<!DOCTYPE html>
<html lang="en">
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
  .d-inline{
    transition: transform 0.3s ease, border 0.3s ease; /* Transiciones suaves */
  }
  .d-inline.hover{
    transform: scale(0.9); /* Hacer que la imagen sea un 10% más grande */
    border: 2px solid white; /* Agregar un borde blanco de 2px */
    transition: transform 0.3s ease, border 0.3s ease; /* Agregar transiciones suaves */
  }
    </style>
    <script>
      $.ajax({
            type: 'GET',
            url: '<?= base_url('peliculas') ?>', // Ruta al controlador y método
            dataType: 'json',
              success: function(response) {
                // Maneja la respuesta del servidor
              console.log(response);
              procesarDatos(response);
              },
              error: function(error) {
                // Maneja errores de la solicitud
              console.log(error);
              alert('Error al procesar el formulario');
              }
         });

        function procesarDatos(DatosJson){
        var cantidadElementos = DatosJson.length; // Puedes obtener esto desde la respuesta de la base de datos
        // Carruseles superiores
        // Obtén el contenedor donde deseas agregar los divs
        var contenedor = document.getElementById('CarruselSuperior');

        // Crea divs dinámicamente y añádelos al contenedor
        for (var i = 0; i < 3; i++) {
            var nuevoDiv = document.createElement('div');
            if(i == 0){
              nuevoDiv.className = 'carousel-item active';
            }
            else{
              nuevoDiv.className = 'carousel-item';
            }
            
            var nuevoImg = document.createElement('img');
            nuevoImg.src = DatosJson[i].Banner_Pelicula;
            nuevoImg.className = 'CarruselImagen d-block shadow-lg mx-auto w-75 rounded-4';
            
            nuevoImg.alt = DatosJson[i].Titulo;
            nuevoDiv.appendChild(nuevoImg);
            contenedor.appendChild(nuevoDiv);
        }
        // Carruseles superiores
        // Carruseles inferior 1
        var carruselinferior1 = document.getElementById('CarruselInferior1');
        for (var i = 0; i < 3; i++) {
            var nuevoDiv = document.createElement('div');
            if(i == 0){
              nuevoDiv.className = 'carousel-item active text-center';
            }
            else{
              nuevoDiv.className = 'carousel-item text-center';
            }

            for (var j = 0;j < 8; j++){
              var nuevoImg = document.createElement('img');
              nuevoImg.src = DatosJson[j].Poster_Pelicula;
              nuevoImg.className = 'CarruselImagen d-inline shadow rounded-4';
              nuevoImg.alt = DatosJson[j].Titulo;
              nuevoImg.style = "height: 250px; width: auto;";
              nuevoDiv.appendChild(nuevoImg);
            }
            carruselinferior1.appendChild(nuevoDiv);
        }
        // Carruseles inferior 1
        }

      document.addEventListener('DOMContentLoaded', function () {
        var carruselItems = document.querySelectorAll('CarruselImagen');
    
        carruselItems.forEach(function (item) {
          item.addEventListener('mouseenter', function () {
            item.classList.add('hover');
          });
    
          item.addEventListener('mouseleave', function () {
            item.classList.remove('hover');
          });
        });
      });
    </script>
</head>
<body class="bg-dark ">
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
                        <img src="IMG/batman.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Batman</span>
                    </a>
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-2 px-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="IMG/espiterman.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1">Spiderman</span>
                  </a>
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-2 px-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="IMG/Plus.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">Añadir perfil</span>
                </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="../Paginas/usuarios.php">Cambiar Perfil</a></li>
                        <li><a class="dropdown-item" href="../Paginas/AdminCuenta.php">Cuenta</a></li>
                        <li><a class="dropdown-item" href="https://drive.google.com/file/d/19yZboVrSkL9N32auK7AOJ-6o9M-pL7Mz/view?usp=share_link" target="_blank">Ayuda</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../cerrar_sesion.php" href="#">Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a style ="Color: White;" href="..." class="nav-link text-truncate">
                        <i class="material-icons d-none d-sm-inline" style="font-size:36px">home</i><span class="ms-1 d-none d-sm-inline">Menu principal</span>
                    </a>
                    
                </li>
                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-truncate">
                        <i class="fs-4 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline" style="color: White">Categorias</span></a>
                    <ul class="collapse nav flex-column" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="../Paginas/Categorias.php?Suchen=Accion" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Acción</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Ciencia Ficcion" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Ciencia Ficcion</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Animada" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Animadas</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Suspenso" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Suspenso</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Terror" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Terror</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Adultos" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Adultos</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Jovenes" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Jovenes</span></a>
                            <a href="../Paginas/Categorias.php?Suchen=Infantil" class="nav-link px-5" style="color: White"> <span class="d-none d-sm-inline">Infantiles</span></a>
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
    <nav class="navbar navbar-expand-lg bg-dark bg-gradient  w-100" >
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">FIC+</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white px-4" aria-current="page" href="#"><strong>Inicio</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white px-4" href="#"><strong>Buscar</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white px-4" href="#"><strong>Categorias</strong></a>
              </li>
            </ul>
            <form class="d-flex align-items-center " style="Color: White" role="search" action="../Paginas/Busqueda.php" method="post">
              <button class="btn btn-outline-light me-2" type="submit"><i class="fa fa-search" style="font-size:20px"></i></button>
              <input class="form-control" type="search" name="Suchen" placeholder="Search" aria-label="Search">
          </form>
          </div>
        </div>
      </nav>
    <!-- navbar -->
    <!-- Carruseles superiores -->
    <div class="container mt-4" >
        <div id="carouselExampleRide" class="carousel slide  rounded-4" data-bs-ride="true">
            <div class="carousel-inner overflow-y-visible" id="CarruselSuperior">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            </div>
    </div>
    <!-- Carrusel superior -->
    <h1 class="text-white mt-3 text-center">Recomendados</h1>
    <!-- carruseles inferiores -->
        <div id="carouselExample2" class="carousel slide mx-auto" >
                <div class="carousel-inner mt-2 overflow-y-visible" id="CarruselInferior1"><!-- no mover el width del inner -->
                    <div class="carousel-item active text-center" >
                      <img src="IMG/8.jpg" class="CarruselImagen d-inline shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
                    <div class="carousel-item text-center">
                      <img src="IMG/20.jpg" class="CarruselImagen d-inline mx-2 shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
                    <div class="carousel-item text-center">
                      <img src="IMG/18.jpg" class="CarruselImagen d-inline shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    <!-- carruseles inferiores -->
    <h1 class="text-white mt-3 text-center">Proximamente...</h1>
    <!-- carruseles inferiores 2 -->
        <div id="carouselExample3" class="carousel slide mx-auto" >
                <div class="carousel-inner mt-2 overflow-y-visible"><!-- no mover el width del inner -->
                    <div class="carousel-item active text-center" >
                     <img src="https://fic-plus.000webhostapp.com/IMG/13.jpg" class="CarruselImagen d-inline shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
                    <div class="carousel-item text-center">
                      <img src="IMG/20.jpg" class="CarruselImagen d-inline mx-2 shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
                    <div class="carousel-item text-center">
                      <img src="IMG/18.jpg" class="CarruselImagen d-inline mx-2 shadow rounded-4" alt="..." style="height: 250px; width: auto;">
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    <!-- carruseles inferiores 2 -->
    <!-- footer -->
    <div class="container mt-5">
      <div class="row border-top">
        <div class="col mb-5 text-bg-white">hola</div>
        <div class="col mb-5">hola</div>
        <div class="col mb-5">hola</div>
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