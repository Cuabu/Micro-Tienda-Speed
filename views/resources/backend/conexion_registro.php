<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fullname"], $_POST["email"], $_POST["password"])) {
    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Reemplaza "tu_usuario" por tu nombre de usuario de MySQL
    $password = ""; // Reemplaza "tu_contraseña" por tu contraseña de MySQL
    $dbname = "speed_store"; // Reemplaza "tu_base_de_datos" por el nombre de tu base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener y limpiar los datos del formulario
    $fullname = clean_input($_POST["fullname"]);
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);

    // Verificar si el usuario ya existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El usuario ya existe, mostrar mensaje de error
        echo "<p>El usuario ya está registrado.</p>";
    } else {
        // El usuario no existe, insertar datos en la base de datos
        $sql = "INSERT INTO usuarios (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $fullname, $email, $password);

        if ($stmt->execute()) {
            // Mostrar mensaje de éxito
            echo "<p>Usuario registrado exitosamente.</p>";
        } else {
            // Mostrar mensaje de error si hay un error en la inserción
            echo "<p>Error al registrar el usuario.</p>";
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Mostrar mensaje de error si no se recibieron datos del formulario
    echo "<p>No se recibieron datos del formulario.</p>";
}

// Función para limpiar los datos del formulario
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
