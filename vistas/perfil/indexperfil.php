<?php
session_start();
$user_nick = $_SESSION['nick'] ?? 'Invitado';
$user_id   = $_SESSION['id']   ?? null;

// Datos del usuario (sólo para mostrar el nombre, si quieres)
$user = [
    'nombre' => $_SESSION['nick'],
    'id'     => $_SESSION['id']
];

// Cargamos el modelo de posts
require_once(__DIR__ . '/../../modelos/post.php');
// Obtenemos **todos** los posts del foro
$posts = obtenerPosts();

// Función para quitar tildes
function quitarTildes($cadena) {
    $originales = ['á','é','í','ó','ú','Á','É','Í','Ó','Ú'];
    $sinTildes  = ['a','e','i','o','u','A','E','I','O','U'];
    return str_replace($originales, $sinTildes, $cadena);
}

// Filtro de búsqueda
if (!empty($_GET['q'])) {
    $q = quitarTildes(strtolower(trim($_GET['q'])));
    $posts = array_filter($posts, function($p) use ($q) {
        return strpos(quitarTildes(strtolower($p['titulo'])), $q) !== false;
    });
}
// Filtro por tema
if (!empty($_GET['tema'])) {
    $t = quitarTildes(strtolower($_GET['tema']));
    $posts = array_filter($posts, function($p) use ($t) {
        return quitarTildes(strtolower($p['tema'])) === $t;
    });
}

// Generamos tendencias
$todas = [];
foreach ($posts as $p) {
    $palabras = preg_split('/\W+/', quitarTildes(strtolower($p['titulo'])));
    foreach ($palabras as $w) {
        if (strlen($w) > 3) $todas[] = $w;
    }
}
$tendencias = array_count_values($todas);
arsort($tendencias);
$tendencias = array_slice($tendencias, 0, 5, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
  <style>
    .frase-estilo {
      background: linear-gradient(135deg,rgb(23,104,173),rgb(90,79,238));
      padding:20px; margin:20px 0; font-style:italic;
      border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);
      color:#fff; font-size:1.2rem; transition:transform .3s ease;
    }
    .frase-estilo:hover { transform:scale(1.02); }
  </style>
</head>
<body>
  <?php require_once("../../inc/header.php"); ?>
  <div class="container mt-5">
    <div class="row">
      <!-- Temas -->
      <div class="col-md-3">
        <h4>Temas</h4>
        <div class="list-group">
          <?php foreach (["Tecnología","Música","Películas y TV","Naturaleza","Interesante","Cultura","Ocio"] as $tema): ?>
            <a href="?tema=<?=urlencode($tema)?>" class="list-group-item list-group-item-action">
              <?=htmlspecialchars($tema)?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- Posts -->
      <div class="col-md-6">
        <h3>
          <?= isset($_GET['tema'])
              ? "Publicaciones - Tema: ".htmlspecialchars($_GET['tema'])
              : "Todas las publicaciones" ?>
        </h3>
        <?php if (empty($posts)): ?>
          <div class="alert alert-warning">No hay publicaciones.</div>
        <?php endif; ?>
        <?php foreach ($posts as $i => $post): ?>
          <div class="card mb-3">
            <?php if (!empty($post['imagen'])): ?>
              <img src="../../assets/img/<?=basename($post['imagen'])?>" class="card-img-top" alt="">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><?=htmlspecialchars($post['titulo'])?></h5>
              <p class="card-text"><?=nl2br(htmlspecialchars($post['contenido']))?></p>
              <div class="d-flex justify-content-between">
                <div>
                  <span class="badge bg-primary"><?=$post['likes'] ?? 0?> Likes</span>
                  <span class="badge bg-success"><?=$post['comentarios'] ?? 0?> Comentarios</span>
                </div>
                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#com<?=$i?>" aria-expanded="false">Ver comentarios</button>
              </div>
              <div class="collapse" id="com<?=$i?>">
                <div class="mt-3">
                  <?php foreach ($post['comentarios_lista'] ?? [] as $c): ?>
                    <strong><?=htmlspecialchars($c['autor'])?></strong>
                    <p><?=htmlspecialchars($c['contenido'])?></p>
                  <?php endforeach; ?>
                  <textarea class="form-control" rows="2" placeholder="Escribe un comentario..."></textarea>
                  <button class="btn btn-primary mt-2">Responder</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Tendencias y frase -->
      <div class="col-md-3">
        <h4>Tendencias</h4>
        <ul class="list-group">
          <?php foreach ($tendencias as $pal => $f): ?>
            <li class="list-group-item">#<?=ucfirst(htmlspecialchars($pal))?> (<?=$f?>)</li>
          <?php endforeach; ?>
        </ul>
        <?php include("../../inc/frasedeldia.php"); ?>
        <h4 class="mt-4">Frase del día</h4>
        <blockquote class="frase-estilo"><?=htmlspecialchars($fraseDelia ?? $fraseDelDia)?></blockquote>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
