<!DOCTYPE html>
<html>
<head>
  <title>FIC+</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
  html, body {
    height: 100%;
    margin: 0;
}
  body{
    background-image: radial-gradient(farthest-corner at 60% 55%,rgb(24, 24, 24),rgba(0, 0, 0, 0)) ,linear-gradient(135deg, rgba(0, 0, 0, 0)10%,rgb(24, 24, 24) 70%),url('<?= base_url('IMG') ?>/pxfuel.jpg');

    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<script>
  function sesion(){
    var nuevaUrl = '<?= base_url('inicio') ?>';
     window.location.href = nuevaUrl;
  }
  function registro(){
    var nuevaUrl = '<?= base_url('Registro') ?>';
     window.location.href = nuevaUrl;
  }
</script>
<body>
  <div class="d-flex flex-column position-absolute bottom-0 end-0 justify-content-end me-5 mb-5 w-25">
    <button type="button" onclick="sesion()" class="btn btn-primary me-5 mb-2 ">Iniciar Sesión</button>
    <button type="button" onclick="registro()" class="btn btn-warning me-5 mb-5">Registrar</button>
  </div>
    </div>
  </div>
</body>
</html>
