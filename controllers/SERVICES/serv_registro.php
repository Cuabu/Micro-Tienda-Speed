<?php
	require_once (__DIR__."/../MDB/mdbUsuario.php");
          
	if(isset($_POST['submit'])){
		echo "<br>Se presiono boton sumit";
		$errMsg = '<br>';

		$nombre = $_POST['nombre'];
		$segundoNombre = $_POST['segundoNombre'];
		$apellido = $_POST['apellido'];
		$segundoApellido = $_POST['segundoApellido'];
		$codigo = $_POST['codigo'];
		$identificacion = $_POST['identificacion'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$password = $_POST['password'];
		$Programa_idPrograma = $_POST['Programa_idPrograma'];
		$Estado_idEstado = $_POST['Estado_idEstado'];
		$Rol_idRol = $_POST['Rol_idRol'];

        $user = insertarUsuarioMdbUsuario(0, $nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol);

        if ($user != 0){
        	header("location: ../../index.php?action=ok");  
        	echo $user;
        }else{
        	echo $user;
        }
	}

?>