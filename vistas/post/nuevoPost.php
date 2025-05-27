<?php
// simulación de usuario conectado
$user = [
    'nombre' => 'Javier Martin',
    'id' => 1 // para cuando se conecte al backend
];

// Temas disponibles
$temas = ["Tecnología", "Música", "Películas y TV", "Naturaleza", "Interesante", "Cultura", "Ocio"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nuevo post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body class="bg-black text-light">
<?php require_once("../../inc/header.php"); ?>

<div class="container mt-5">
    <h2 class="mb-4">Crear nuevo post</h2>

    <form id="formNuevoPost" method="post" action="../../controladores/postControlador.php" enctype="multipart/form-data" class="bg-body-tertiary p-4 rounded">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título del post</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <select class="form-select" id="tema" name="tema" required>
                <option selected disabled>Selecciona un tema</option>
                <?php foreach ($temas as $tema): ?>
                    <option value="<?= $tema ?>"><?= $tema ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">
        </div>

        <input type="hidden" name="usuario_id" value="<?= $user['id'] ?>">

        <button type="submit" class="btn btn-primary">Publicar</button>
        <a href="../perfil/index.php" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>