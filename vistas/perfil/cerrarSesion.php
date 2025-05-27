<?php
session_start(); // Iniciar la sesión para destruirla

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio o login
header("Location: ../../index.php"); // O redirigir a la página principal
exit;
?>