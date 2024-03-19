<?php
// Iniciar la sesión
session_start();

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_email"], $_POST["login_password"])) {
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

    // Preparar la consulta SQL para evitar la inyección de SQL
    $sql = "SELECT * FROM usuario WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_email, $login_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['nombre'];

        // Cerrar la conexión
        $stmt->close();
        $conn->close();

        // Mostrar mensaje de inicio de sesión exitoso con estilo Bootstrap
        echo "<div class='alert alert-success' role='alert'>
                ¡Inicio de sesión exitoso! Redireccionando en <span id='countdown'>5</span> segundos...
            </div>";
        
        // Redireccionar al dashboard después de un tiempo determinado
        echo "<script>
            let count = 5;
            setInterval(function() {
                count--;
                if (count <= 0) {
                    window.location.href = 'dashboard.html'; // Redirigir al dashboard
                } else {
                    document.getElementById('countdown').innerText = count;
                }
            }, 1000);
        </script>";
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

// Mostrar mensaje de inicio de sesión exitoso con estilo Bootstrap
echo "<div class='alert alert-success' role='alert'>
        ¡Inicio de sesión exitoso! Redireccionando en <span id='countdown'>5</span> segundos...
    </div>";
    
// Redireccionar al usuario a la página de mensaje de éxito después de mostrar el mensaje
header("Location: ./mensaje_confirmacion.html");



?>
