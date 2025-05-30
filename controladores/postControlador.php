<?php
require_once("../modelos/post.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger datos
    $titulo = $_POST["titulo"] ?? '';
    $contenido = $_POST["contenido"] ?? '';
    $tema = $_POST["tema"] ?? '';
    $usuario_id = $_POST["usuario_id"] ?? 0;

    // Subida de imagen (opcional)
    $rutaImagen = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $directorioDestino = "../assets/img/";
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaCompleta = $directorioDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaCompleta)) {
            $rutaImagen = $rutaCompleta;
        }
    }

    // Llamar al modelo para guardar el post
    $resultado = crearPost($titulo, $contenido, $tema, $usuario_id, $rutaImagen);

    if ($resultado) {
        header("Location: ../vistas/perfil/indexperfil.php?mensaje=Post creado con éxito");
        exit;
    } else {
        echo "Error al crear el post.";
    }
}

