<?php
	class EnlacesPaginas{

		public function enlacesPaginasModel($enlacesModel){

			if ($enlacesModel == 'inicio' || $enlacesModel == 'usuarios'){

				$module = "views/modules/".$enlacesModel.".php";

			}
			else if ($enlacesModel == "admin"){
				$module = "views/administrador/gestionar_usuarios.php";
			}
			else if ($enlacesModel == "formulario"){
				$module = "views/usuarios/formulario.php";
			}
			else if ($enlacesModel == "ok"){
				$module = "views/administrador/gestionar_usuarios.php";
			}
			else if ($enlacesModel == "fallo"){
				$module = "views/modules/ingresar.php";
			}
			else if ($enlacesModel == "cambio"){
				$module = "views/modules/usuarios.php";
			}
			else if ($enlacesModel == "nopage"){
				$module = "views/usuarios/nopage.php";
			}
			else if ($enlacesModel == "cerrarSesion"){
				$module = "controllers/SERVICES/serv_logout.php";
			}
			else{
				$module = "views/usuarios/login.php";
			}
			return $module;
		}

		public function direccionarTemplateModel($enlacesModel){
			if ($enlacesModel == 'template'){
				$module = "views/template.php";
				
			}else{
				$module = "";
			}
			return $module;
		}
	}
?>


