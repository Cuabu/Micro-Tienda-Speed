<?php
// Verificar si se recibieron datos del formulario de manera segura
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fullname"], $_POST["email"], $_POST["password"])) {
    // Evitar la inyección de SQL utilizando consultas preparadas
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "speed_store";
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
        echo "<div style='text-align: center;'><div class='error-message' style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; display: inline-block;'>El usuario ya está registrado.</div></div>";
    } else {
        // El usuario no existe, insertar datos en la base de datos de manera segura
        $sql = "INSERT INTO usuarios (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $fullname, $email, $hashed_password);

        if ($stmt->execute()) {
            // Iniciar sesión y almacenar los datos del usuario en la sesión
            session_start();
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;

            // Redireccionar a la página de perfil después de un registro exitoso
            header("Location: http://localhost/Micro-Tienda-Speed/views/resources/paginas/login.html");
            exit; // Detener la ejecución del script PHP después de la redirección
        } else {
            // Mostrar mensaje de error si hay un error en la inserción
            echo "<div style='text-align: center;'><div class='error-message' style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; display: inline-block;'>Error al registrar el usuario.</div></div>";
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Mostrar mensaje de error si no se recibieron datos del formulario
    echo "<div style='text-align: center;'><div class='error-message' style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; display: inline-block;'>Error: No se recibieron datos del formulario.</div></div>";
}

// Función para limpiar los datos del formulario
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
