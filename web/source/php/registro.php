<?php
// Configuración de la base de datos
$host = "localhost"; // Cambia al host de tu base de datos
$username = "root"; // Cambia al nombre de usuario de tu base de datos
$password = ""; // Cambia a la contraseña de tu base de datos
$dbname = "speed_store"; // Cambia al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Variables del usuario a insertar (cambia estos valores según tus necesidades)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id_tienda = $_POST["id_tienda"];

    // Insertar los datos del usuario en la tabla "usuario"
    $sql = "INSERT INTO usuario (nombre, apellido, email, password, id_tienda) VALUES ('$nombre', '$apellido', '$email', '$password', '$id_tienda')";

    if ($conn->query($sql) === TRUE) {
        // Mensaje de éxito con Bootstrap alert
        echo '<div class="alert alert-success" role="alert">';
        echo "Registro de usuario exitoso!";
        echo '</div>';
        // Botón para ir a otra página web
        echo '<a href="../pages/dashboard.html" class="btn btn-primary">Ir a otra página</a>';
    } else {
        // Mensaje de error con Bootstrap alert
        echo '<div class="alert alert-danger" role="alert">';
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo '</div>';
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
