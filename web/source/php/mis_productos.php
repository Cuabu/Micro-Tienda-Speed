<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "speed_store";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// ID del usuario del cual se desea obtener los datos (obtenido de la variable de sesión)
$id_usuario = $_SESSION['id_usuario'];

// Consulta SQL para obtener los datos del usuario y sus productos comprados con la tienda asociada
$sql = "SELECT 
            u.nombre AS nombre_usuario,
            u.apellido AS apellido_usuario,
            u.email AS email_usuario,
            p.id_producto,
            p.nombre AS nombre_producto,
            p.descripcion AS descripcion_producto,
            p.precio AS precio_producto,
            t.id_tienda,
            t.nombre AS nombre_tienda,
            t.ubicacion AS ubicacion_tienda,
            t.telefono AS telefono_tienda
        FROM 
            usuario u
        INNER JOIN 
            compra c ON u.id_usuario = c.id_usuario
        INNER JOIN 
            producto p ON c.id_producto = p.id_producto
        INNER JOIN 
            tienda t ON p.id_tienda = t.id_tienda
        WHERE 
            u.id_usuario = $id_usuario";

// Imprimir el query para depuración
echo "Query SQL: " . $sql . "<br>";

// Ejecutar la consulta
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Imprimir los datos obtenidos
    while ($fila = $resultado->fetch_assoc()) {
        echo "Nombre del Usuario: " . $fila["nombre_usuario"] . " " . $fila["apellido_usuario"] . "<br>";
        echo "Correo Electrónico: " . $fila["email_usuario"] . "<br>";
        echo "ID del Producto: " . $fila["id_producto"] . "<br>";
        echo "Nombre del Producto: " . $fila["nombre_producto"] . "<br>";
        echo "Descripción del Producto: " . $fila["descripcion_producto"] . "<br>";
        echo "Precio del Producto: $" . $fila["precio_producto"] . "<br>";
        echo "ID de la Tienda: " . $fila["id_tienda"] . "<br>";
        echo "Nombre de la Tienda: " . $fila["nombre_tienda"] . "<br>";
        echo "Ubicación de la Tienda: " . $fila["ubicacion_tienda"] . "<br>";
        echo "Teléfono de la Tienda: " . $fila["telefono_tienda"] . "<br>";
        echo "--------------------------------------<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
