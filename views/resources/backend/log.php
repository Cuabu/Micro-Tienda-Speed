<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Aquí deberías realizar la validación del usuario en tu base de datos
    // Por ejemplo, verificar si el usuario y contraseña son correctos
    // Si la validación es exitosa, puedes almacenar información del usuario en la sesión
    // Por ejemplo:
    if ($email == 'usuario@example.com' && $password == 'contraseña') {
        $_SESSION['usuario'] = $email; // Almacenar el email del usuario en la sesión
        header('Location: dashboard.html'); // Redireccionar a la página principal
        exit();
    } else {
        // Si la validación falla, mostrar un mensaje de error
        echo '<script>alert("Correo electrónico o contraseña incorrectos. Intenta de nuevo."); window.location.href = "tu_pagina_de_login.php";</script>';
        exit();
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario, redirigir al formulario de inicio de sesión
    header('Location: tu_pagina_de_login.php');
    exit();
}
?>
