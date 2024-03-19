<?php
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"], $_POST["password"])) {
    // Obtener los datos del formulario de inicio de sesión
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password_db = ""; // ¡Recuerda establecer tu contraseña!
    $database = "speed_store";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password_db, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows == 1) {
        // Iniciar sesión
        $row = $result->fetch_assoc();
        $_SESSION['idUsuario'] = $row['id_usuario'];

        // Redirigir al mismo script para evitar el reenvío del formulario
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } else {
        // Mensaje de error si las credenciales son incorrectas
        $error_message = "Email o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $conn->close();
}

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    // Si no se ha iniciado sesión, mostrar formulario de inicio de sesión
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </body>
    </html>
    <?php
    exit();
}

// ID de usuario de la sesión
$idUsuario = $_SESSION['idUsuario'];

// Conexión a la base de datos
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

// Consulta SQL para obtener los productos del usuario
$sqlProductos = "SELECT * FROM producto WHERE id_usuario = $idUsuario";
$resultProductos = $conn->query($sqlProductos);

// Verificar si se encontraron resultados
if ($resultProductos->num_rows > 0) {
    // Mostrar los productos en una tabla
    echo "<table border='1'>
    <tr>
    <th>ID Producto</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    </tr>";

    while ($rowProducto = $resultProductos->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowProducto["id_producto"] . "</td>";
        echo "<td>" . $rowProducto["nombre"] . "</td>";
        echo "<td>" . $rowProducto["descripcion"] . "</td>";
        echo "<td>" . $rowProducto["precio"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron productos para este usuario.";
}

// Cerrar la conexión
$conn->close();
?>
