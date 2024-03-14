<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "speed_store";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email='$login_email' AND password='$login_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, redireccionar al panel de control
        header("Location: dashboard.php");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "Correo electrónico o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
