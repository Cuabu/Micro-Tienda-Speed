<?php
  ob_start();
?>
<div class="container">
	<div class="row">
		<div class="col s12 offset-m1 m10 offset-l2 l8">
			<div class="card-panel grey lighten-3 z-depth-3">
	            <form method="post"  action="controllers/SERVICES/serv_registro.php" role="form">
	            	<div class="row">
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="nombre" id="nombre" required>
		            		<label for="nombre">nombre</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="segundoNombre" id="segundoNombre" required>
		            		<label for="segundoNombre">segundoNombre</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="apellido" id="apellido" required>
		            		<label for="apellido">apellido</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="segundoApellido" id="segundoApellido" required>
		            		<label for="segundoApellido">segundoApellido</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="number" name="codigo" id="codigo" required>
		            		<label for="codigo">codigo</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="number" name="identificacion" id="identificacion" required>
		            		<label for="identificacion">identificacion</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="email" name="email" id="email" required>
		            		<label for="email">email</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="text" name="telefono" id="telefono" required>
		            		<label for="telefono">telefono</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<input type="password" name="password" id="password" required>
		            		<label for="password">password</label>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<select name="Programa_idPrograma" id="Programa_idPrograma">
		            			<option value="" disabled selected>Programa</option>
		            			<option value="1">Ingenieria de sistemas</option>
		            			<option value="2">Ingenieria electronica</option>
		            		</select>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<select name="Estado_idEstado" id="Estado_idEstado">
		            			<option value="" disabled selected>Estado</option>
		            			<option value="1">Estado 1</option>
		            			<option value="2">Estado 2</option>
		            		</select>
		            	</div>
		            	<div class="input-field col s12 m6">
		            		<select name="Rol_idRol" id="Rol_idRol">
		            			<option value="" disabled selected>Rol</option>
		            			<option value="1" disabled="">Administrador</option>
		            			<option value="2">Votante</option>
		            		</select>
		            	</div>
		             		
	            	</div>
	            	<div class="center">
	            		<button class="btn waves-effect waves-light" name="submit">Guardar</button>
	            	</div>
				</form>

	          	<?php
	            	if(isset($_GET["action"])){
	            	  	if($_GET["action"] == "ok"){
		    	            echo '<br><div class="card-panel green">Registro exitoso!!</div>' ;
		              	}
		            }
	          	?>
				
			</div>
		</div>
	</div>
</div>
