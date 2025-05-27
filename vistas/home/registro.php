<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>

<body>
  
<div class="container d-flex flex-column min-vh-100">   
<main class="form-signin w-50 m-auto">
  <form method="POST" action="../../controladores/usuarioControlador.php" id="registroForm" novalidate>
    <div class="container text-center">
      <div class="row">
        <div class="col align-self-center">
            <img class="mb-4" src="../../assets/img/robot_foro.png" alt="img logo" width="150" height="100">
        <h1 class="h3 mb-3 fw-normal h1-new-user">Registro</h1>
        </div>
      </div>
    </div>

    <div class="form-floating p-2">
      <input type="text" class="form-control" id="floatingName" name="nombre" placeholder="Name" required maxlength="30">
      <label for="floatingName" >Nombre</label>
    </div>
    <div class="form-floating p-2">
      <input type="text" class="form-control" id="floatingLastname" name="apellidos" placeholder="Lastname" required maxlength="30">
      <label for="floatingLastname">Apellidos</label>
    </div>
    <div class="form-floating p-2">
      <input type="date" class="form-control" id="floatingdate" name="fecha_nacimiento" required>
      <label for="floatingdate">Fecha de nacimiento</label>
    </div>
    <div class="form-floating p-2">
      <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
      <label for="floatingEmail">Email</label>
    </div>
    <div class="form-floating p-2">
      <input type="text" class="form-control" id="floatingNick" name="nick" placeholder="Nickname" required minlength="6" maxlength="10">
      <label for="floatingNick">Nick</label>
    </div>
    <div class="form-floating p-2">
      <input type="password" class="form-control" id="floatingPassword" name="contrasena" placeholder="Password" required>
      <label for="floatingPassword">Contraseña</label>
    </div>

    <div class="container text-center">
      <div class="row justify-content-md-center">
        <div class="col-md-auto align-self-center">
          <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault">
              Acepto los <a href="../../inc/terminos.html" target="_blank">Términos y Condiciones </a>
            </label>
          </div>
        </div>
      </div>
  </div>
  <input type="hidden" name="accion" value="registrar">
  <button id="registrarUsuario" name="registrarUsuario" class="btn btn-primary w-100 py-2" type="submit">Confirmar</button>
  </form>
</main>
</div>

<?php

/* FOOTER */
    require_once ("../../inc/footer.php");  

?>
<!--Script rEgistro-->
<script src="../../assets/js/validacionRegistro.js"></script>
<!--Script bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>