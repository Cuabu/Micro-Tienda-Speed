<?php
// Iniciar la sesión
session_start();

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"], $_POST["descripcion"], $_POST["precio"])) {
    // Capturar los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

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

    // Consulta para insertar el producto en la tabla
    $sql = "INSERT INTO producto (nombre, descripcion, precio) VALUES (?, ?, ?)";
    
    // Preparar la consulta SQL para evitar la inyección de SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $nombre, $descripcion, $precio); // 's' para string, 'd' para double

    if ($stmt->execute()) {
        // Cerrar la conexión y el statement
        $stmt->close();
        $conn->close();

        // Mostrar mensaje de éxito con estilo Bootstrap
        echo "<div class='alert alert-success' role='alert'>
                ¡Producto agregado exitosamente! Redireccionando en <span id='countdown'>5</span> segundos...
            </div>";

        // Redireccionar al dashboard después de un tiempo determinado
        echo "<script>
            let count = 5;
            setInterval(function() {
                count--;
                if (count <= 0) {
                    window.location.href = './mensaje_insertar_producto.html'; // Redirigir al dashboard
                } else {
                    document.getElementById('countdown').innerText = count;
                }
            }, 1000);
        </script>";
    } else {
        // Mostrar mensaje de error con estilo Bootstrap
        echo "<div class='alert alert-danger' role='alert'>
                Error al agregar el producto: " . $conn->error . "
            </div>";
    }
} else {
    // Si se intenta acceder al script directamente sin enviar datos por POST, redirigir al usuario a la página de inicio de sesión
    header("Location: ../index.html");
    exit();
}
?>
