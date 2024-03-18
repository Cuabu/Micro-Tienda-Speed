<?php
// Iniciar la sesión
session_start();

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir el ID del producto a eliminar
    $id_producto = $_POST["id_producto"];

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

    // Query para eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id_producto='$id_producto'";

    // Verificar si la consulta se ejecutó correctamente
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Producto eliminado exitosamente');</script>";
        echo "<script>window.location.href = '../dashboard.html';</script>";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si se intenta acceder al script directamente sin enviar datos por POST, redirigir al usuario a la página de inicio
    header("Location: ../index.html");
    exit();
}
?>
