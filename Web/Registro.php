<!DOCTYPE html>
<html lang="ea">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Fic+ | Inicio Sesion</title>
</head>
<body class="container-fluid bg-dark m-0 p-0">
    <p class="text-white mt-5 fs-1 text-center">Registrarme</p>
    <section class="container-fluid mt-5 w-50 border border-warning border-3 rounded text-white">
        <form action="" class="text-center">
            
            <!--
            <label for="exampleFormControlInput1" class="form-label m-1 fs-5">Ingresa tu Correo Electronico</label>
            <input type="email" class="form-control m-1" id="exampleFormControlInput1" placeholder="name@example.com">
            <label for="exampleFormControlInput1" class="form-label m-1 fs-5">Ingresa tu Contraseña</label>
            <input type="password" id="inputPassword5" class="form-control m-1" aria-describedby="passwordHelpBlock" placeholder="Ingresa tu contraseña">
            -->

            <!--Nombres Usuario-->
            <div class="input-group flex-nowrap mt-4 mb-2">
                <span class="input-group-text" id="addon-wrapping"><img src="ICON/usuarios.png" alt="Icono Usuario" style="width: 2vw;"></span>
                <input type="text" minlength="2" maxlength="50" class="form-control" placeholder="Nombre(s)" aria-label="Ingresar Nombres" aria-describedby="addon-wrapping">
            </div>
            <!--Nombres Usuario-->

            <!--Apellidos Usuario-->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="addon-wrapping"><img src="ICON/usuarios.png" alt="Icono Usuario" style="width: 2vw;"></span>
                <input type="text" minlength="2" maxlength="50" class="form-control" placeholder="Apellido(s)" aria-label="Ingresar Apellidos" aria-describedby="addon-wrapping">
            </div>
            <!--Apellidos Usuario-->

            <!--Correo Usuario-->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="addon-wrapping"><img src="ICON/email.png" alt="Icono Usuario" style="width: 2vw;"></span>
                <input type="email" minlength="15" maxlength="60" class="form-control" placeholder="Correo Electronico" aria-label="Ingresar Correo Electronico" aria-describedby="addon-wrapping">
            </div>
            <!--Correo Usuario-->

            <!--Contraseña Usuario-->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="addon-wrapping"><img src="ICON/password.png" alt="Icono Usuario" style="width: 2vw;"></span>
                <input type="text" minlength="8" maxlength="20" class="form-control" placeholder="Crear Contraseña" aria-label="Crear Contraseña" aria-describedby="addon-wrapping">
            </div>
            <!--Contraseña Usuario-->

            <!--Contraseña Usuario-->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="addon-wrapping"><img src="ICON/password.png" alt="Icono Usuario" style="width: 2vw;"></span>
                <input type="password" minlength="8" maxlength="20" class="form-control" placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña" aria-describedby="addon-wrapping">
            </div>
            <!--Contraseña Usuario-->
            

            <!--Aceptar Terminos y Condiciones-->
            <div class="form-check text-start m-1">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Acepto los Terminos y Condiciones
                </label>
            </div>
            <!--Aceptar Terminos y Condiciones-->

            <button type="submit" class="btn btn-dark mb-3 mt-3">Ya tengo Cuenta</button>
            <button type="submit" class="btn btn-warning mb-3 mt-3">Registrarme</button>
        </form>
    </section>
    
</body>
</html>