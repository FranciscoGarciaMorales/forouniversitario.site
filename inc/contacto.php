<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body class="light">
    <?php require_once("headerindex.php"); ?>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100 text-center">
    <form id="contactoForm" class="w-50" method="POST" action="enviarContacto.php">
        <div class="container p-5">
            <div class="row">
                <div class="col">
                        <img class="mb-4" src="../assets/img/robot_foro.png" alt="img logo" width="150" height="100">
                    <h1 class="h3 mb-3 fw-normal h1-new-user">Contacto</h1>
                </div>
            </div>       
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="tucorreo@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Escribe aquí...</label>
                        <textarea class="form-control" id="mensaje" rows="3" placeholder="..."required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </div>
            </div>
        </div> 
    </form>   
    </div>
    <?php
    require_once ("../inc/footer.php");
    ?>
    <!--Script validacionContacto-->
    <script src="../assets/js/boton.js"></script>
    <script src="../assets/js/validacionContacto.js"></script>
    <!--Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>