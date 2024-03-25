<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "gitactividad");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$codigo = $_POST['codigoModificar']; 
$nombre = $_POST['nombreModificar'];
$descripcion = $_POST['descripcionModificar'];
$precio = $_POST['precioModificar'];

// Consulta SQL para actualizar el producto
$sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio'  WHERE codigo='$codigo'";

// Imprimir el query para depuración
echo "Query SQL: " . $sql . "<br>";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Producto actualizado correctamente.";
} else {
    echo "Error al actualizar el producto: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
