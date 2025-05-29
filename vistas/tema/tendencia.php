<?php
function obtenerTendencias(array $posts): array {
    $todasPalabras = [];

    foreach ($posts as $post) {
        $titulo = quitarTildes(strtolower($post['titulo']));
        $palabras = explode(' ', preg_replace('/[^\w\s]/', '', $titulo)); // quitar signos de puntuación
        foreach ($palabras as $palabra) {
            if (strlen($palabra) > 3) { // ignoramos palabras muy cortas
                $todasPalabras[] = $palabra;
            }
        }
    }

    // Contar frecuencia
    $tendencias = array_count_values($todasPalabras);

    // Ordenar y cortar
    arsort($tendencias);
    return array_slice($tendencias, 0, 5, true);
}