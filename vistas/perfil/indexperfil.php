<?php
session_start();
if (isset($_SESSION['nick'])) {
$user = [
    'nombre' => $_SESSION['nick']
];
}
// Ejemplo para las publicaciones del usuario
$posts = [
    [
        'titulo' => 'Avances en la inteligencia artificial',
        'contenido' => 'La inteligencia artificial está evolucionando a pasos agigantados...',
        'imagen' => '../../assets/img/publicacion1.jpg',
        'likes' => 35,
        'comentarios' => 10,
        'comentarios_lista' => [
            ['autor' => 'Carlos', 'contenido' => 'Muy interesante el artículo'],
            ['autor' => 'Ana', 'contenido' => 'Me encanta tu contenido']
        ]
    ],
    [
        'titulo' => 'Los mejores álbumes de los 2000',
        'contenido' => 'Hoy les traigo una lista con los mejores álbumes del año...',
        'imagen' => '../../assets/img/publicacion2.jpg',
        'likes' => 22,
        'comentarios' => 5,
        'comentarios_lista' => [
            ['autor' => 'Luis', 'contenido' => 'Están buenos los álbumes']
        ]
    ],
    [
        'titulo' => 'La última película de ciencia ficción',
        'contenido' => 'Una crítica sobre la última película que está arrasando en taquilla...',
        'imagen' => '../../assets/img/publicacion3.jpg',
        'likes' => 40,
        'comentarios' => 15,
        'comentarios_lista' => [
            ['autor' => 'Marta', 'contenido' => 'Este domingo iré a verla'],
            ['autor' => 'Jorge', 'contenido' => 'La trama me parece muy intrigante.']
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
    <?php require_once("../../inc/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <h4 class="">Temas</h4>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Tecnología</a>
                    <a href="#" class="list-group-item list-group-item-action">Música</a>
                    <a href="#" class="list-group-item list-group-item-action">Películas y TV</a>
                    <a href="#" class="list-group-item list-group-item-action">Naturaleza</a>
                    <a href="#" class="list-group-item list-group-item-action">Interesante</a>
                    <a href="#" class="list-group-item list-group-item-action">Cultura</a>
                    <a href="#" class="list-group-item list-group-item-action">Ocio</a>
                </div>
            </div>

            <!-- Columna central (Publicaciones del usuario) -->
            <div class="col-md-6">
                <h3>Publicaciones de <?php echo $user['nombre']; ?></h3>

                <?php foreach ($posts as $index => $post): ?>
                    <div class="card mb-3">
                        <img src="<?php echo $post['imagen']; ?>" class="card-img-top" alt="Imagen de publicación">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['titulo']; ?></h5>
                            <p class="card-text"><?php echo $post['contenido']; ?></p>
                            
                            <!-- Likes y comentarios -->
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="badge bg-primary btn-primary"><?php echo $post['likes']; ?> Likes</span>
                                    <span class="badge bg-success btn-primary"><?php echo $post['comentarios']; ?> Comentarios</span>
                                </div>
                                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#comentarios<?php echo $index; ?>" aria-expanded="false" aria-controls="comentarios<?php echo $index; ?>">
                                    Ver comentarios
                                </button>
                            </div>

                            <!-- Sección de comentarios -->
                            <div class="collapse" id="comentarios<?php echo $index; ?>">
                                <div class="mt-3">
                                    <?php foreach ($post['comentarios_lista'] as $comentario): ?>
                                        <div class="mb-2">
                                            <strong><?php echo $comentario['autor']; ?></strong>
                                            <p><?php echo $comentario['contenido']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                    <textarea class="form-control" rows="2" placeholder="Escribe un comentario..."></textarea>
                                    <button class="btn btn-primary mt-2">Responder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Notificaciones-->
            <div class="col-md-3">
                <h4 class="">Notificaciones</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Nuevo comentario en tu publicación: "Avances en la inteligencia artificial"</a>
                    <a href="#" class="list-group-item list-group-item-action">Tu publicación "Los mejores álbumes de los 2000" ha recibido 5 likes</a>
                    <a href="#" class="list-group-item list-group-item-action">Nuevo comentario en tu publicación: "La última película de ciencia ficción"</a>
                    <a href="#" class="list-group-item list-group-item-action">Tu publicación "La última película de ciencia ficción" ha recibido 3 likes</a>
                </div>
            </div>
        </div>
    </div>

    <!--Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>