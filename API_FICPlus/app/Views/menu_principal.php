<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.0/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>FIC+</title>
    <style>
.carousel-inner{
    width: 100%;
    height: 100%;
}

.carousel-item{
    width: 100%;
    height: 100%;
}

.carousel-item div{
    width: 100%;
    left: 0;
    bottom: 0;
    text-align: center;
    background: rgb(0,0,0);
    background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
}

.card-img-overlay{
    width: 50%;
    text-align: left;
}

.titulo {
	font-size: 1.12em;
}

.carousel-item div h5{
    font-size: 4.5vh;
}

.carousel-item div p{
    margin-bottom: 3vh;
}

.d-block{
    width: 100%;
    height: 100%;
}
body{
  background: rgb(37,37,37);
     background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgb(37,37,37) 100%);
} 

    </style>
</head>
<body>
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
            nuevoDiv.className = 'carousel-item active';
            var nuevoImg = document.createElement('img');
            nuevoImg.src = 'IMG/' + DatosJson[i].Banner_Pelicula;
            nuevoImg.className = 'd-block';
            
            nuevoImg.alt = DatosJson[i].Titulo;
            nuevoDiv.appendChild(nuevoImg);
            contenedor.appendChild(nuevoDiv);
        }
        // Carruseles superiores
         }
    </script>

<div class="offcanvas offcanvas-start bg-dark text-bg-white" style="width:18vw" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <!-- <img src="..." width="60" height="50" alt="Imagen Logo" class="logo_central offcanvas-title"> -->
            <button type="button" class="btn-close text-reset btn-close-white px-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <li class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mb-2 px-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="IMG/82.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">nombre perfil</span>
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
                <li>
                <form class="d-flex align-items-center px-3 py-3" style="Color: White" role="search" action="../Paginas/Busqueda.php" method="post">
                        <button class="btn btn-outline-secondary me-2" type="submit"><i class="fa fa-search" style="font-size:20px"></i></button>
                        <input class="form-control" type="search" name="Suchen" placeholder="Search" aria-label="Search">
                    </form>
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

    <div style="height: 75vh;"id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" 
            data-bs-slide-to="0"aria-current="true" class="active" aria-label="Slide 0"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" 
            data-bs-slide-to="1"aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" 
            data-bs-slide-to="2"aria-current="true" aria-label="Slide 2"></button>
        </div>
        <!--Carruseles Superiores-->
        <div class="carousel-inner" id="CarruselSuperior">
          <!--Esta linea de codigo Lee lo que se obtuvo de la base de datos-->
                <!-- <div href="../Paginas/peliculas.php?id" class="carousel-caption d-none d-md-block">
                  <h1>Bienvenido de Vuelta</h1>
                  <h5>titulo</h5>
                  <p>descripcion</p>
                </div> -->
          </div>
        </div>
      </div>
      
      <!--Carruseles inferiores-->
      <h3 Style="Color:white;">No te lo puedes perder</h3>
      <div id="carouselExampleInterval" class="carousel slide" style="overflow:hidden" data-bs-ride="carousel">
        <div class="carousel-inner ms-1">
        <div class="carousel-item active" data-bs-interval="10000">
          <!-- <?php //while($info5 = mysqli_fetch_array($carrouselinferior)){ ?>
            <?php //if ($ii % 8 == 0 && $ii != 0){?>
              </div>
              <div class="carousel-item">
            <?php //}?>
            <a href="../Paginas/peliculas.php?pelicula=<?php //echo $info5['id'];?>"><img src="<?php //echo $info5['poster_pelicula']; ?>" class="d-inline " style="height:250px; width: 160px;"alt="..."></a>
          <?php //$ii++; } ?> -->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
      <h3 Style="Color:white;">Recientes</h3>
      <div id="carouselExampleInterval2" class="carousel slide"  style="overflow:hidden" data-bs-ride="carousel">
        <div class="carousel-inner ms-1">
        <div class="carousel-item active" data-bs-interval="10000">
          <!-- <?php //while($infoR = mysqli_fetch_array($info_recientes)){ ?>
            <?php //if ($i % 8 == 0 && $i != 0){?>
              </div>
              <div class="carousel-item">
            <?php //}?>
            <a href="../Paginas/peliculas.php?pelicula=<?php //echo $infoR['id'];?>"><img src="<?php //echo $infoR['poster_pelicula']; ?>" class="d-inline " style="height:250px; width: 160px;"alt="..."></a>
          <?php //$i++; } ?> -->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
          <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <h3 Style="Color:white;">Jovenes</h3>
      <div id="carouselExampleInterval3" class="carousel slide"  style="overflow:hidden" data-bs-ride="carousel">
        <div class="carousel-inner ms-1">
        <div class="carousel-item active" data-bs-interval="10000">
          <!-- <?php //while($infoj = mysqli_fetch_array($info_joven)){ ?>
            <?php //if ($j % 8 == 0 && $j != 0){?>
              </div>
              <div class="carousel-item">
            <?php //}?>
            <a href="../Paginas/peliculas.php?pelicula=<?php //echo $infoj['id'];?>"><img src="<?php //echo $infoj['poster_pelicula']; ?>" class="d-inline " style="height:250px; width: 160px;"alt="..."></a>
          <?php //$j++; } ?> -->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval3" data-bs-slide="prev">
          <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval3" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



    <div class="container-fluid" style="position: fixed; top: 0; left:0; ">
        <div class="row">
            <div class="col-1 py-3">
                <!-- toggler -->
                <button class="btn btn-dark float-start" data-bs-toggle="offcanvas" style= "width: 5vw; "data-bs-target="#offcanvas" role="button">
                    <i class="fal fa-bars"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
                </button>
            </div>
    </div>
</body>
</html>
