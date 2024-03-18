<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si no hay una sesión activa (usuario no autenticado)
if (!isset($_SESSION['email'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: ../index.html");
    exit(); // Finalizar el script después de la redirección
}
?>