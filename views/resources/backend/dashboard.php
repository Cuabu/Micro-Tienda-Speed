<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="icon" type="image/x-icon" href="../css/favicon_io/favicon-16x16.png">

</head>
<body>

<header>
    <div class="content">
        <nav>
            <div class="brand">Perfil</div>
            <ul>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Configuración</a></li>
                <li><button>Cerrar sesión</button></li>
            </ul>
        </nav>
        <div class="header-block2">
        <img src="" alt="Car" />
            <div class="text">
                <h2>Bienvenido</h2>
                <p>Este es tu panel de control personalizado.</p>
            </div>
            
        </div>
    </div>
</header>



    <!-- Formulario para agregar producto -->
    <div class="add-product-form">
        <h3>Agregar Producto</h3>
        <form action="agregar_producto.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
            <button type="submit">Agregar Producto</button>
        </form>
    </div>
</section>

<footer>
      <div class="main">
        <div class="content footer-links">
          <div class="footer-company">
            <h4>Compañia</h4>
            <h6>Conozcanos</h6>
            <h6>Repositorio oficial https://github.com/Has18Live/Proyecto-Sena.git</h6>
          </div>
          <div class="footer-rental">
            <h4>Renta servicio en la nube</h4>
            <h6>Buscar productos en descuento</h6>
            <h6>Requisitos minimos</h6>
            <h6>Ayuda</h6>
          </div>
          <div class="footer-social">
            <h4>Mantenerse conectado</h4>
            <div class="social-icons">
              <img src="../imagenes/instagram.png" alt="Instagram" />
              <img src="../imagenes/facebook.png" alt="Facebook" />
            </div>
          </div>
          <div class="footer-contact">
            <h4>Contactarnos</h4>
            <h6>+57 317 459 3537</h6>
            <h6>stormytrump@gmail.com</h6>
            <h6>Correo electronico</h6>
          </div>
        </div>
      </div>
      <div class="last">Todos los derechos reservados. 2024</div>
    </footer>
    <?php
// Leer el archivo de texto que contiene los datos del usuario registrado
$fileName = "registros_usuario.txt";
$fileContent = file_get_contents($fileName);

// Dividir el contenido del archivo en líneas
$lines = explode("\n", $fileContent);

// Mostrar los datos del usuario en la página
foreach ($lines as $line) {
    echo "<p>$line</p>";
}
?>

</body>
</html>