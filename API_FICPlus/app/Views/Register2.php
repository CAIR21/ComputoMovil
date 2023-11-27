<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro - Servicio de Streaming</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    body {
      background-color: #061a21; /* Fondo similar al de esta plataforma */
    }
    #register-container {
      position: relative;
      z-index: 1;
    }
    .card {
      border-radius: 15px; /* Añade esquinas redondeadas a la tarjeta */
    }
  </style>


</head>
<body>

<div class="container-fluid h-100 mt-4">
  <div class="row h-100 justify-content-center align-items-center" id="register-container">
    <div class="col-sm-6 col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Registro</h5>
          <form id="FormularioR" class="text-center">

            <!--Nombres Usuario-->
            <div class="form-group">
              <label for="Nombre_Usuario">Nombre(s)</label>
              <input id="Nombre_Usuario" name="Nombre_Usuario" type="text" minlength="2" maxlength="50" type="text" class="form-control" placeholder="Ingresa tu(s) Nombre(s)">
            </div>
            <!--Nombres Usuario-->

            <!--Apellidos Usuario-->
            <div class="form-group">
              <label for="Apellido_Usuario">Apellido(s)</label>
              <input id="Apellido_Usuario" name="Apellido_Usuario" type="text" minlength="2" maxlength="50" type="text" class="form-control"  placeholder="Ingresa tu(s) Apellido(s)">
            </div>
            <!--Apellidos Usuario-->

            <!--Correo Usuario-->
            <div class="form-group">
              <label for="Correo">Correo Electrónico</label>
              <input id="Correo" name="Correo" type="email" minlength="15" maxlength="60" class="form-control" placeholder="Ingresa tu correo electrónico">
            </div>
            <!--Correo Usuario-->
            
            <!--Contraseña Usuario-->
            <div class="form-group">
                <label for="Contrasenia">Contraseña</label>
                <div class="input-group">
                  <input type="text" id="Contrasenia" name="Contrasenia" minlength="8" maxlength="20" type="password" class="form-control"  placeholder="Ingresa tu contraseña">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
            </div>
            <!--Contraseña Usuario-->

            <!--Confirmar contraseña Usuario-->
            <div class="form-group">
              <label for="Contrasenia2">Confirmar Contraseña</label>
              <input type="password" id="Contrasenia2" minlength="8" maxlength="20" class="form-control" placeholder="Confirma tu contraseña">
            </div>
            <!--Confirmar contraseña Usuario-->

            <!--Aceptar Terminos y Condiciones-->
            <div class="form-check text-start m-1">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Acepto los Terminos y Condiciones
                </label>
            </div>
            <!--Aceptar Terminos y Condiciones-->

            <button type="button" onclick="enviarFormulario()" class="btn btn-warning btn-block">Registrarse</button>
            <button type="button"  class="btn btn-primary btn-block">Ya tengo cuenta</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  // Script para alternar la visibilidad de la contraseña
  document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('password');
    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  });





  function enviarFormulario() {
        var contrasena1 = $('#Contrasenia').val();
        var contrasena2 = $('#Contrasenia2').val();

        if(contrasena1 == contrasena2){
            
            var formData = $('#FormularioR').serialize();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('usuarios') ?>', // Ruta al controlador y método
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Maneja la respuesta del servidor
                    console.log(response);

                    // Recupera el estatus y muestra un alert en función de ese estatus
                    if (response.estatus === 201) {
                        alert("¡Te haz Registrado Correctamente!");
                    } else {
                        alert('Error al procesar el formulario');
                    }
                },
                error: function(error) {
                    // Maneja errores de la solicitud
                    console.error(error);
                }
            });



        }else{
            alert("Verifica las Contraseñas");
        }

        
    }
</script>




</body>
</html>
