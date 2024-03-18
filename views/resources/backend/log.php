<?php
// Iniciar la sesión
session_start();

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "speed_store";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Consultar la base de datos para verificar el correo y la contraseña
    $sql = "SELECT * FROM usuarios WHERE email = '$login_email' AND password = '$login_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $login_email;
        $_SESSION['fullname'] = $row['fullname'];

        // Cerrar la conexión
        $conn->close();

        // Mostrar mensaje con contador regresivo antes de redirigir
        echo "<script>
            let count = 4;
            setInterval(function() {
                count--;
                if (count <= 0) {
                    window.location.href = 'dashboard.html'; // Redirigir al dashboard
                } else {
                    document.getElementById('countdown').innerText = count;
                }
            }, 1000);
        </script>";
        echo "<div>¡Inicio de sesión exitoso! Redireccionando en <span id='countdown'>5</span> segundos...</div>";
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Correo electrónico o contraseña incorrectos');</script>";
        echo "<script>window.location.href = '../index.html';</script>";
    }
} else {
    // Si se intenta acceder al script directamente sin enviar datos por POST, redirigir al usuario a la página de inicio de sesión
    header("Location: ../index.html");
    exit();
}
?>
