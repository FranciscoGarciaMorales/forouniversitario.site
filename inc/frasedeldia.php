<?php
$frases = [
    "Cada día es una nueva oportunidad para brillar.",
    "No cuentes los días, haz que los días cuenten.",
    "El éxito es la suma de pequeños esfuerzos repetidos cada día.",
    "Haz hoy lo que tu futuro yo te agradecerá.",
    "La constancia supera al talento cuando el talento no se esfuerza.",
    "Cree en ti y estarás a mitad de camino.",
    "Aprender algo nuevo cada día te hace más sabio.",
    "La mejor forma de predecir el futuro es crearlo.",
    "No te compares, cada camino es único.",
    "De los errores nacen los mejores aprendizajes.",
    "La motivación te inicia, pero el hábito te mantiene.",
    "El cambio comienza con una decisión.",
    "Rodéate de energía que te sume.",
    "No esperes el momento perfecto, créalo.",
    "Cambia tus pensamientos y cambiarás tu mundo.",
    "Hazlo con miedo si es necesario, pero hazlo.",
    "La acción vence a la ansiedad.",
    "Sé valiente para comenzar, y persistente para continuar.",
    "Un paso a la vez también te lleva lejos.",
    "No hay atajos a cualquier lugar que valga la pena.",
    "Sé el cambio que quieres ver en el mundo.",
    "Lo que no te reta, no te transforma.",
    "Agradece lo que tienes y lucha por lo que sueñas.",
    "Donde hay voluntad, hay camino.",
    "Haz de cada día tu obra maestra.",
    "No hay fracaso, solo retroalimentación.",
    "El esfuerzo de hoy es el éxito de mañana.",
    "Las metas no funcionan sin acción.",
    "Tú controlas tu destino.",
    "Si puedes soñarlo, puedes lograrlo.",
    "Nunca es tarde para empezar de nuevo."
];

$dia = (int)date('j'); /*  devuelve el dia del mes actual sin los ceros adelante */
$fraseDelDia = $frases[($dia - 1) % count($frases)];
?>