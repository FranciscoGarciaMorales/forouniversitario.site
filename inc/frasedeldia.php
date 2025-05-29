<?php
$frases = [
    "Cada línea de código es una nueva oportunidad para mejorar.",
    "No depures los días, haz que los días compilen.",
    "El éxito es la suma de commits constantes cada día.",
    "Haz hoy el código que tu yo del futuro no querrá refactorizar.",
    "La constancia en el código supera al talento sin disciplina.",
    "Cree en tu lógica, estás a mitad del algoritmo.",
    "Aprender un nuevo lenguaje cada día te hace mejor desarrollador.",
    "La mejor forma de predecir el futuro es programarlo.",
    "No compares tu progreso con otros repos, cada proyecto es único.",
    "Los bugs enseñan más que los programas que corren sin errores.",
    "La motivación inicializa el proyecto, el hábito lo mantiene.",
    "El cambio comienza con una línea de código.",
    "Rodéate de código limpio y compañeros que documenten.",
    "No esperes el framework perfecto, empieza a desarrollar.",
    "Refactoriza tu mente y tu mundo cambiará.",
    "Hazlo con miedo a los errores, pero hazlo.",
    "Una acción vale más que mil ideas sin compilar.",
    "Sé valiente para iniciar un proyecto, y persistente para subirlo a producción.",
    "Un commit a la vez también construye un gran sistema.",
    "No hay atajos en el código que vale la pena mantener.",
    "Sé el desarrollador que quieres ver en el equipo.",
    "Lo que no lanza excepciones, no mejora tus habilidades.",
    "Agradece el código funcional y lucha contra el legacy.",
    "Donde hay voluntad, hay un script.",
    "Haz de cada función tu obra maestra.",
    "No hay fracaso, solo logs para analizar.",
    "El esfuerzo de hoy es el despliegue exitoso de mañana.",
    "Las metas no funcionan sin push al repo.",
    "Tú eres el programador de tu destino.",
    "Si puedes imaginar la app, puedes desarrollarla.",
    "Nunca es tarde para un nuevo proyecto en tu GitHub."
];

$dia = (int)date('j'); /*  devuelve el dia del mes actual sin los ceros adelante */
$fraseDelDia = $frases[($dia - 1) % count($frases)];
?>