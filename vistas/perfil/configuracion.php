<?php
// Simulación de datos actuales del usuario
$user = [
    'nombre' => 'Javier Martin',
    'nickname' => 'javimartin',
    'email' => 'javiermatin@correo.com',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
    <?php require_once("../../inc/header.php"); ?>

    <div class="container mt-5">
        <div class="container-custom">
            <h2 class="mb-4">Configuración de cuenta</h2>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $user['nombre']; ?>">
                </div>

                <div class="mb-3">
                    <label for="nickname" class="form-label">Nickname</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $user['nickname']; ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="tema" class="form-label">Tema favorito</label>
                    <select class="form-select" id="tema" name="tema">
                        <option value="">Selecciona uno</option>
                        <option value="Tecnología">Tecnología</option>
                        <option value="Música">Música</option>
                        <option value="Películas y TV">Películas y TV</option>
                        <option value="Naturaleza">Naturaleza</option>
                        <option value="Cultura">Cultura</option>
                        <option value="Ocio">Ocio</option>
                    </select>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="notificaciones" name="notificaciones" checked>
                    <label class="form-check-label" for="notificaciones">Recibir notificaciones por email</label>
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="index.php" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>