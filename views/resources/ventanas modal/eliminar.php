<?php
// Verificar si se recibió el parámetro ID del producto a eliminar
if(isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
    // Obtener el ID del producto desde el parámetro POST
    $id_producto = $_POST['id_producto'];

    // Datos de conexión a la base de datos
    $servername = "localhost"; // Nombre del servidor MySQL
    $username = "root"; // Nombre de usuario de la base de datos
    $password = ""; // Contraseña de la base de datos
    $dbname = "gitactividad"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos WHERE codigo = $id_producto";

    // Imprimir el query para depuración
    echo "Query SQL: " . $sql . "<br>";

    if ($conn->query($sql) === TRUE) {
        echo "El producto ha sido eliminado exitosamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "No se especificó el ID del producto a eliminar.";
}
?>
