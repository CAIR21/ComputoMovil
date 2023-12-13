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
  .CarruselImagen{
    transition: transform 0.3s ease, border 0.3s ease; /* Transiciones suaves */
  }
  .CarruselImagen:hover{
    transform: scale(0.9); /* Hacer que la imagen sea un 10% más grande */
    border: 2px solid white; /* Agregar un borde blanco de 2px */
    transition: transform 0.3s ease, border 0.3s ease; /* Agregar transiciones suaves */
  }
    </style>
    <script>
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

      document.addEventListener('DOMContentLoaded', function() {
     
        //Generar carrousel
        function generacion(Datos, i){
          // Encuentra el elemento antes del cual deseas agregar el nuevo contenido
            var referencia = document.getElementById('Referencia');

        var carouselHtml = `
        <h1 class="text-white mt-3 text-center">${Categorias[i]}</h1>
        <div id="carouselExample${i}" class="carousel slide mx-auto">
            <div class="carousel-inner mt-3 mb-5 overflow-y-visible" id="CarruselInferior${i}">
                <!-- Aquí van los elementos generados -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample${i}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample${i}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    `;

    // Agrega el contenido justo antes del elemento de referencia
    referencia.insertAdjacentHTML('beforebegin', carouselHtml);
    var carruselinferior1 = document.getElementById('CarruselInferior' + i);
        for (var i = 0; i < 8; i++) {
            if (i%4 == 0){
              var nuevoDiv = document.createElement('div');
              if(i == 0){
              nuevoDiv.className = 'carousel-item active text-center';
            }
            else{
              nuevoDiv.className = 'carousel-item text-center';
            }
            }
              var nuevoImg = document.createElement('img');
              var nuevoA = document.createElement('a');
              nuevoImg.src = Datos[i].Poster_Pelicula;
              nuevoImg.className = 'CarruselImagen d-inline shadow rounded-4 mx-2';
              nuevoImg.alt = Datos[i].Titulo;
              nuevoImg.style = "height: 250px; width: auto; cursor:pointer;";
              nuevoA.href = '<?= base_url('peliculas') ?>/' + Datos[i].ID_Peliculas;
              nuevoA.appendChild(nuevoImg);
              nuevoDiv.appendChild(nuevoA);
            carruselinferior1.appendChild(nuevoDiv);
        }
        }
        //Generar carrousel

      // Función para realizar una solicitud Ajax utilizando fetch y devolver una promesa
function fetchData(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: '<?= base_url('Categoria') ?>/' + Categorias[id],
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        console.log(`Solicitud completada para el ID ${id}`, data);
        generacion(data, id);
        // Puedes realizar acciones adicionales con los datos aquí
        resolve(data); // Resuelve la promesa
      },
      error: function(error) {
        console.error(`Error en la solicitud para el ID ${id}`, error);
        reject(error); // Rechaza la promesa en caso de error
      }
    });
  });
}

// Función para iterar mediante el uso de async/await
async function iterateAsync() {
  for (let i = 0; i <= 8; i++) {
    try {
      await fetchData(i); // Espera hasta que la solicitud se complete
    } catch (error) {
      console.error('Error en la solicitud:', error);
    }
  }
  console.log('Todas las solicitudes completadas');
}

// Llamar a la función que realiza la iteración
const Categorias = ['Accion', 'Terror', 'Animacion', 'Suspenso', 'Drama', 'Comedia', 'Misterio', 'Infantiles', 'Anime'];
iterateAsync();

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
    <h1 class="text-white mt-3 text-center">Categorias</h1>
    <!-- carruseles inferiores -->
    
   <!-- footer -->
   <div class="container mt-5" id="Referencia">
      <div class="row border-top text-bg-dark">
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