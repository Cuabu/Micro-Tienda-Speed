<?php
	  ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Administrador</title>

	<link rel="stylesheet" href="views/resources/css/materialize.css">
	<link rel="stylesheet" href="views/resources/css/estilos.css">
	<link rel="stylesheet" href="views/resources/css/material-icons.css">
	
</head>
<body>

	<div class="navbar-fixed">
		<nav class="purple">
			<div class="nav-wrapper">
				<div class="container">
					<a href="#" class="brand-logo">Portal Administrador</a>
					<ul class="right">
						<li>
							<?php
								if (isset($_SESSION['LOGIN'])){
		                        		echo $_SESSION['NOMBRE_USUARIO'];
								}else{
									echo 'Sesion no iniciada';
								}
		                    ?>	                    	
		                 </li>
						<li><a href="index.php?action=cerrarSesion">Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<br>

	<?php
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
    ?>


	<script type="text/javascript" src="views/resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="views/resources/js/materialize.js"></script>
	<script type="text/javascript" src="views/resources/js/myScript.js"></script>


</body>
</html>

<?php
  ob_end_flush();
?>