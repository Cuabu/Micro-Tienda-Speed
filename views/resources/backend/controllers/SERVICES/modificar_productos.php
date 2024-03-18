<?php
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

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $id_producto = $_POST["id_producto"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    // Consulta para actualizar el producto en la tabla
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio WHERE id_producto=$id_producto";

    if ($conn->query($sql) === TRUE) {
        echo "Producto modificado correctamente.";
    } else {
        echo "Error al modificar el producto: " . $conn->error;
    }
} else {
    echo "No se recibieron datos del formulario.";
}

// Cerrar la conexión
$conn->close();
?>
