<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Servicio de Streaming</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <style>
    #video-background {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1000;
    }
    #login-container {
      position: relative;
      z-index: 1;
    }
    .card {
      background-color: #f8f9fa;
      border-radius: 15px; /* Añade esquinas redondeadas a la tarjeta */
    }
  </style>
</head>
<body class="container-fluid">

<video autoplay muted loop id="video-background">
  <!-- Aquí debes proporcionar la ruta del video en formato compatible -->
  <source src="/VID/Marvel2.mp4" type="video/mp4">
  Tu navegador no soporta el elemento de video.
</video>

<div class="opacity-25 container-fluid" style="margin-top: 45vh;">
  <div class="row h-100 justify-content-center align-items-center" id="login-container">
    <div class="col-sm-6 col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">FIC+ | Iniciar Sesión</h5>
          <form id="formulario" method="post">
            <div class="form-group">
              <label for="username">Correo Electronico</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu usuario">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <div class="input-group">
                <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i  class="fa fa-eye" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
            </div>
            <button type="submit" onclick="Iniciar()" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </form>
          <button onclick="registro()" class="btn btn-warning btn-block">Registrarme</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Script para alternar la visibilidad de la contraseña
  document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('password');
    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  });

  function registro(){
    window.location.href='<?= base_url('Registro')?>';

  }
  function Iniciar(){
    console.log("Entró");
    var correo = $('#email').val();
    var password = $('#password').val();
    $.ajax({
            type: 'POST',
            url: '<?= base_url("login") ?>',
            data: { email: correo, password: password },
            dataType: 'json',
            success: function(response) {
                if (response.estatus === 200) {
                    console.log(response.estatus);
                    alert("Sesion iniciada correctamente");
                    window.location.href = '<?= base_url('Principal') ?>';
                    // Redirigir o realizar acciones después del inicio de sesión exitoso
                } else {
                    console.log(response.estatus);
                    alert(JSON.stringify(response.mensaje.error));
                    window.location.href = '<?= base_url('inicio') ?>';
                    // Manejar el caso de credenciales inválidas
                }
            },
            error: function() {
                alert('Error al procesar la solicitud.');
                window.location.href = '<?= base_url('inicio') ?>';
            }
        });
  }
</script>
</body>
</html>
