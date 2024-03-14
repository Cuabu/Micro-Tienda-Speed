<div class="row">
	
	<div class="col m12">
		<table class="striped responsive-table highlight">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>2do Nombre</th>
					<th>Apellido</th>
					<th>2do Apellido</th>
					<th>Codigo</th>
					<th>CC/TI</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Contraseña</th>
					<th>Rol</th>
				</tr>
			</thead>
			<tbody>
				 <?php
                    $vistaUsuario = new MvcController();
                    $vistaUsuario -> vistaUsuariosController();
                    $vistaUsuario -> borrarUsuarioController();
                ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row center"> 
	Crear un Nuevo Usuario <a href="index.php?action=formulario" class="btn waves-effect blue btn-floating waves-light"><i class="material-icons">add</i></a>
</div>
<div class="container">
	
	<?php

        if (isset($_GET["action"])){
            if($_GET["action"] == "ok"){
            	$mensaje = ' Se a registrado un nuevo usuarios! ';
            	$color = 'teal';
           	
				$alerta = '<div class="card-panel '.$color.'">Notificacion : '.$mensaje.'</div>';
              	echo $alerta;
            }
        }
        if (isset($_GET["seBorro"])){
            if($_GET["seBorro"] == "true"){
            	$mensaje = ' Eliminacion exitosa! ';
            	$color = 'green';
            }else if($_GET["seBorro"] == "true"){
            	$mensaje = ' No se pudo eliminar! ';
            	$color = 'red';
            }
			$alerta = '<div class="card-panel '.$color.'">Notificacion : '.$mensaje.'</div>';
              echo $alerta;
        }
    ?>	
</div>