<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_email"], $_POST["login_password"])) {
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
    $login_email = clean_input($_POST["login_email"]);
    $login_password = clean_input($_POST["login_password"]);

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_email, $login_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, redireccionar al panel de control
        header("Location: dashboard.html?email=" . urlencode($login_email));
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "<p>Correo electrónico o contraseña incorrectos.</p>";
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
