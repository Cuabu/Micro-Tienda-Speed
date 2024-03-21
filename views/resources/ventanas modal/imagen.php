<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "gitactividad");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}

// Consulta SQL para obtener las imágenes
$sql = "SELECT imagen FROM productos"; // Cambia "productos" por el nombre de tu tabla

$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontraron imágenes
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar las imágenes
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Mostrar la imagen utilizando la etiqueta <img>
        echo '<img src="data:image/jpeg;base64,'.base64_encode($fila['imagen']).'" alt="Imagen de Producto">';
    }
} else {
    echo "No se encontraron imágenes.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
