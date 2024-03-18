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
    $id_usuario = $_POST["id_usuario"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta para actualizar el usuario en la tabla
    $sql = "UPDATE usuarios SET fullname='$fullname', email='$email', password='$password' WHERE ID_usuario='$id_usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario modificado correctamente.";
    } else {
        echo "Error al modificar el usuario: " . $conn->error;
    }
} else {
    echo "No se recibieron datos del formulario.";
}

// Cerrar la conexión
$conn->close();
?>
