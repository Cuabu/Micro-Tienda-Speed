<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "gitactividad");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen']; // Suponiendo que la imagen se envía como un archivo

// Consulta SQL para insertar datos
$sql = "INSERT INTO productos (codigo, nombre, descripcion, precio, imagen) VALUES ('$codigo', '$nombre', '$descripcion', '$precio', '$imagen')";

// Imprimir el query para depuración
echo "Query SQL: " . $sql . "<br>";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar datos: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
