<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .producto {
            margin-bottom: 20px;
        }
        .imagen-producto {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resultado de la Consulta</h2>
    <hr>
    <?php
    // Aquí iría el código PHP para obtener los datos del producto y la imagen
    ?>
    <div class="producto">
        <p>ID: 1<br>
        Nombre: Producto de Ejemplo<br>
        Descripción: Esta es una descripción de ejemplo del producto.<br>
        Precio: $50.00</p>
        <!-- Botón para ver la imagen en una ventana emergente -->
        <a href="imagen.php" class="btn btn-primary btn-block">Ver Imagen</a>
    </div>
    <a href="javascript:history.go(-1)" class="btn btn-primary">Volver atrás</a>
</div>

<script>
    function verImagen() {
        // Ruta de la imagen
        var rutaImagen = 'ruta_de_la_imagen.jpg'; // Reemplaza 'ruta_de_la_imagen.jpg' por la ruta de la imagen real
        // Abrir la imagen en una nueva ventana emergente
        window.open(rutaImagen, '_blank', 'width=800,height=600');
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
