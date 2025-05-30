<?php

require_once(__DIR__ . '/../config/config.php');

function crearPost($titulo, $contenido, $tema, $usuario_id, $imagen = null) {
    $config = Configuracion::getInstance();
    $conn = $config->getConexion();

    $stmt = $conn->prepare("INSERT INTO post (titulo, contenido, tema, usuario_id, imagen, fecha_creacion)
                            VALUES (?, ?, ?, ?, ?, NOW())");

    // 🔧 AQUÍ está el error: tienes 6 letras "sssiss" y solo 5 variables
    // CAMBIA esto:
    // $stmt->bind_param("sssiss", $titulo, $contenido, $tema, $usuario_id, $imagen);

    // ✅ POR esto:
    $stmt->bind_param("sssis", $titulo, $contenido, $tema, $usuario_id, $imagen);

    $resultado = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $resultado;
}

/**
 * Obtiene todos los posts del foro (o los de un usuario si pasas $usuario_id).
 * Devuelve un array de filas asociativas.
 */
function obtenerPosts($usuario_id = null) {
    require_once(__DIR__ . '/../config/config.php');
    $config = Configuracion::getInstance();
    $conn   = $config->getConexion();

    if ($usuario_id) {
        $stmt = $conn->prepare("
            SELECT id, titulo, contenido, tema, imagen, fecha_creacion
            FROM post
            WHERE usuario_id = ?
            ORDER BY fecha_creacion DESC
        ");
        $stmt->bind_param("i", $usuario_id);
    } else {
        $stmt = $conn->prepare("
            SELECT id, titulo, contenido, tema, imagen, fecha_creacion
            FROM post
            ORDER BY fecha_creacion DESC
        ");
    }

    $stmt->execute();
    $res = $stmt->get_result();
    $posts = $res->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();

    return $posts;
}

