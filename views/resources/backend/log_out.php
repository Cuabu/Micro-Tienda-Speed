<?php
session_start(); // Iniciar la sesión

// Destruir la sesión actual
session_destroy();

// Redireccionar a la página de inicio de sesión o a donde consideres apropiado
header('Location: /Micro-Tienda-Speed/views/resources/paginas/index.html');
exit();
?>


