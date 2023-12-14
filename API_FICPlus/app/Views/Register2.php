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
          <form id="FormularioR" class="text-center" method="post">

            <!--Nombres Usuario-->
            <div class="form-group">
              <label for="Nombre_Usuario">Nombre(s)</label>
              <input id="Nombre_Usuario" name="Nombre_Usuario" type="text" minlength="2" maxlength="50" type="text" class="form-control" placeholder="Ingresa tu(s) Nombre(s)" required>
            </div>
            <!--Nombres Usuario-->

            <!--Apellidos Usuario-->
            <div class="form-group">
              <label for="Apellido_Usuario">Apellido(s)</label>
              <input id="Apellido_Usuario" name="Apellido_Usuario" type="text" minlength="2" maxlength="50" type="text" class="form-control"  placeholder="Ingresa tu(s) Apellido(s)" required>
            </div>
            <!--Apellidos Usuario-->

            <!--Correo Usuario-->
            <div class="form-group">
              <label for="Correo">Correo Electrónico</label>
              <input id="Correo" name="Correo" type="email" minlength="15" maxlength="60" class="form-control" placeholder="Ingresa tu correo electrónico" required>
            </div>
            <!--Correo Usuario-->
            
            <!--Contraseña Usuario-->
            <div class="form-group">
                <label for="Contrasenia">Contraseña</label>
                <div class="input-group">
                  <input type="password" id="Contrasenia" name="Contrasenia" minlength="8" maxlength="20" type="password" class="form-control"  placeholder="Ingresa tu contraseña" required>
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
              <input type="password" id="Contrasenia2" minlength="8" maxlength="20" class="form-control" placeholder="Confirma tu contraseña"required>
            </div>
            <!--Confirmar contraseña Usuario-->

            <!--Aceptar Terminos y Condiciones-->
            <div class="form-check text-start m-1">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"required>
                <label class="form-check-label" for="flexCheckDefault">
                  Acepto los Terminos y Condiciones
                </label>
            </div>
            <!--Aceptar Terminos y Condiciones-->

            <button type="submit" onclick="enviarFormulario(event)" class="btn btn-warning btn-block">Registrarse</button>
            </form>
            <button  onclick="sesion()" class="btn btn-primary btn-block">Ya tengo cuenta</button>
          
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  // Script para alternar la visibilidad de la contraseña
  document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('Contrasenia');
    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
  });

function sesion(){
  var nuevaUrl = '<?= base_url('inicio') ?>';
     window.location.href = nuevaUrl;
}



function enviarFormulario(event) {
  event.preventDefault();
  // Obtén los valores de los campos
  var nombreUsuario = $.trim($('#Nombre_Usuario').val());
  var apellidoUsuario = $.trim($('#Apellido_Usuario').val());
  var correo = $.trim($('#Correo').val());
  var contrasenia1 = $.trim($('#Contrasenia').val());
  var contrasenia2 = $.trim($('#Contrasenia2').val());

  // Verifica que ninguno de los campos esté vacío
  if (nombreUsuario === '' || apellidoUsuario === '' || correo === '' || contrasenia1 === '' || contrasenia2 === '') {
    alert('Todos los campos son obligatorios. Por favor, completa todos los campos.');
    return;
  }

  // Verifica que las contraseñas coincidan
  if (contrasenia1 !== contrasenia2) {
    alert('Las contraseñas no coinciden. Verifica las contraseñas.');
    return;
  }

  // Si llegamos aquí, todos los campos están completos y las contraseñas coinciden
  var formData = $('#FormularioR').serialize();
      
  if(contrasenia1 == contrasenia2){
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
            window.location.href ='<?= base_url('inicio') ?>';
        } else {
            alert('Error al procesar el formulario');
            window.location.href ='<?= base_url('Registro') ?>';
        }
    },
    error: function(error) {
        // Maneja errores de la solicitud
        alert('Error en la solicitud');
        window.location.href ='<?= base_url('Registro') ?>';
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
