<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por ID</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            padding: 20px;
        }
        .container {
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Consulta por ID</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-4">
            <div class="form-group">
                <label for="id_producto">ID del Producto:</label>
                <input type="text" id="id_producto" name="id_producto" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Buscar Producto</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Datos de conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "speed_store";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener el ID del producto desde el formulario
            $id_producto = $_POST['id_producto'];

            // Consulta SQL
            $sql = "SELECT nombre, descripcion, precio FROM productos WHERE id = $id_producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Imprimir datos de la fila
                $row = $result->fetch_assoc();
                echo "<div class='mt-4'>";
                echo "<h2>Resultado de la consulta:</h2>";
                echo "<p><strong>Nombre:</strong> " . $row["nombre"]. "</p>";
                echo "<p><strong>Descripción:</strong> " . $row["descripcion"]. "</p>";
                echo "<p><strong>Precio:</strong> $" . $row["precio"]. "</p>";
                echo "</div>";
            } else {
                echo "<p class='mt-4'>No se encontró ningún producto con ese ID.</p>";
            }

            // Cerrar conexión
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
