<?php
	require_once (__DIR__."/../mdb/mdbUsuario.php");
          
	if(isset($_POST['submit'])){
		echo "<br>Se presiono boton sumit";
		$errMsg = '<br>';

		$id = $_POST['id'];
		$cc = $_POST['ccEditar'];
		$nombre = $_POST['nombreEditar'];
		$apellido = $_POST['apellidoEditar'];
		$fecha_nacimiento = $_POST['fechaEditar'];
		$sexo = $_POST['sexoEditar'];
		$email = $_POST['emailEditar'];
		$telefono = $_POST['telefonoEditar'];
		$usuario = $_POST['usuarioEditar'];
		$password = $_POST['passwordEditar'];
		$idTipoUsuario = $_POST['idTipoUsuarioEditar'];


        $user = modificarUsuarioMdbUsuario($id, $cc, $nombre, $apellido, $fecha_nacimiento, $sexo, $email, $telefono, $usuario, $password, $idTipoUsuario);

        if ($user != 0){
        	header("location: ../../index.php?action=cambio");  
        	echo $user;
        }else{
        	echo $user;
        }
	}

?>