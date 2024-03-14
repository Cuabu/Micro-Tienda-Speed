<?php
       
    require_once (__DIR__."/../MDB/mdbUsuario.php");
        // $home = "..";
        
	if(isset($_POST['submit'])){
        echo "<br>Se presiono boton sumit";

		$errMsg = '<br>';
		//username and password sent from Form
		$cedula = $_POST['cedula'];
		$contrasena = $_POST['contrasena'];
        $user = autenticarUsuario($cedula, $contrasena);
        
		if($user != NULL){
            if ($user->getRol_idRol() == 1){

                session_start();
                
                $_SESSION["LOGIN"] = true;

                $_SESSION['ID_USUARIO'] = $user->getIdUsuario();
                $_SESSION['NOMBRE_USUARIO'] = $user->getnombre();
                $_SESSION['APELLIDO_USUARIO'] = $user->getapellido();
                $_SESSION['ROL_USUARIO'] = $user->getRol_idRol();
                $_SESSION['IDENTIFICACION']= $user->getIdentificacion();

                header("Location: ../../index.php");
                
            }
            else{
                 header("Location: ../../views/usuarios/nopage.php");
            }


		}else{
            $errMsg .= 'No se encontro ningun usuario con estas credenciales';
            echo $errMsg;    
            header("location: ../../index.php?action=fallo");                
            // header("Location: ../../index.php");
   
		}
        
	}

        
                
?>
