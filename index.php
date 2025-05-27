<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="b-example-divider"></div>

    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-6 text-center text-lg-start">
          <img src="assets/img/robot_foro.png" alt="Foro Universitario" class="logo img-fluid mx-auto d-block">
          <h1 class="display-3 fw-bold lh-1 text-body-emphasis mb-3 h1-tecno text-center fs-1 fs-md-2 fs-lg-3">  Foro_Universitario  </h1> 
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form action="controladores/usuarioControlador.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">  <!--ERROR EN RUTA ANTERIOR-->
            <div class="form-floating mb-3">
              <input name="email"type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input name="contrasena" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Recuerdame
              </label>
            </div>
            <!--<a href="../../vistas/perfil/index.php" class="w-100 btn btn-lg btn-primary">Iniciar Sesión</a>-->
            <!--Hemos creado esto para que se pueda pasar el boton por el POST-->
            <input type="hidden" name="accion" value="login">
            <button type="submit" class="w-100 btn btn-lg btn-primary" >Iniciar sesión</button>
            <div class="d-flex justify-content-center align-items-center" style="margin: 0;">
                <span class="fw-bold fs-5">o</span>
              </div>
            <a href="vistas/home/registro.php" class="w-100 btn btn-lg btn-secondary mt-3 text-center">Crear cuenta</a>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>


<?php
    /*FOOTER-*/

    require_once ("inc/footer.php");

?>
    <!--Script JS-->
    <script src="assets/js/validacionSesion.js"></script>
    <!--Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>