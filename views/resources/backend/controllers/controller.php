<?php

	class MvcController{

		public function pagina(){
			 session_start();
			// session_destroy();

			if(!isset($_SESSION["LOGIN"])){
				echo "No has iniado sesion";
				// header("location: views/login.php");
				include (__DIR__ ."/../views/usuarios/login.php");
				exit();
			}else{
				// header("location: views/template.php");
				if ($_SESSION["LOGIN"]){
					include (__DIR__ ."/../views/template.php");
					// if ($_SESSION["ROL_USUARIO"] == 1){
					// 	include (__DIR__ ."/../index.php");
					// }else{
					// 	include (__DIR__ ."/../index.php");
					// }
				}
			}
		}

		public function enlacesPaginasController(){
			
			if (isset($_GET["action"])){
				$enlacesController = $_GET["action"];

			}else{
				$enlacesController = "login";
			}
			
			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);

			include $respuesta;
		}

	    public function selectTipoUsuarioController(){
	    	require_once(__DIR__."/../models/dao/UsuarioDAO.php");

	        $dao = new UsuarioDAO();
	        $ArrayTipoUsuario = $dao->selectTipoUsuarioUsuarioDao();

	        foreach ($ArrayTipoUsuario as $indice => $valor) {
	           	echo '<option value="'.$ArrayTipoUsuario[$indice]->getIdTipoUsuario().'">'.$ArrayTipoUsuario[$indice]->getNombre().'</option>';
	        }

	    }
	    

	   	public function vistaUsuariosController(){
			require_once "MDB/mdbUsuario.php";

			$respuesta = leerUsuarios();

			// foreach($respuesta as $indice=>$valor){
			// 	echo $respuesta[$indice]->getNombre();
			// }

			foreach ($respuesta as $indice => $valor) {
				echo '<tr>
						<td>'.$respuesta[$indice]->getIdUsuario().'</td>
						<td>'.$respuesta[$indice]->getnombre().'</td>
						<td>'.$respuesta[$indice]->getsegundoNombre().'</td>
						<td>'.$respuesta[$indice]->getapellido().'</td>
						<td>'.$respuesta[$indice]->getsegundoApellido().'</td>
						<td>'.$respuesta[$indice]->getcodigo().'</td>
						<td>'.$respuesta[$indice]->getidentificacion().'</td>
						<td>'.$respuesta[$indice]->getemail().'</td>
						<td>'.$respuesta[$indice]->gettelefono().'</td>
						<td>'.$respuesta[$indice]->getpassword().'</td>
						<td claa="rol">'.$respuesta[$indice]->getRol_idRol().'</td>
						<td><a href="index.php?action=editar&id='.$respuesta[$indice]->getIdUsuario().'" class="btn btn-floating"><i class="small material-icons">edit</i></a></td>
						<td><a href="index.php?action=admin&idBorrar='.$respuesta[$indice]->getIdUsuario().'" class="btn red btn-floating"><i class="small material-icons">delete_forever</i></a></td>	
					  </tr>';
			}


		}


		public function borrarUsuarioController(){
		
			require_once "MDB/mdbUsuario.php";
			if (isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				
				$dao = new UsuarioDAO();
		        $respuesta= $dao->borrarUsuario($datosController);

		        echo "<br>enController respuesta ".$respuesta;

				// $respuesta = Datos::borrarUsuarioModel($datosController, "usuario");

				if ($respuesta != 0){
					header("location: index.php?action=admin&seBorro=true");
				
				}else{
					header("location: index.php?action=admin&seBorro=false");
				}

			}
		}

		public function editarUsuarioController(){
			require_once "MDB/mdbUsuario.php";
			require_once (__DIR__."/../models/dao/UsuarioDAO.php");

			if (isset($_GET["id"])){
				$id = $_GET["id"];

				$dao = new UsuarioDAO();
				$objectUsuario = buscarUsuarioPorId($id);

				echo '<input type="number" name="id" class="hidden" value="'.$objectUsuario->getIdUsuario().'">
					   <div class="form-group">
                           <label for="ccEditar">Número de Cedula: <span></span></label>
                           <input type="number" name="ccEditar" class="form-control" value="'.$objectUsuario->getCc().'" placeholder="Número de Cedula" id="ccEditar" maxlength="45"  required>
                       </div>
                       <div class="form-group">
                           <label for="nombreEditar">Nombre:</label>
                           <input type="text" name="nombreEditar" class="form-control" value="'.$objectUsuario->getNombre().'"  placeholder="Nombre" id="nombreEditar" maxlength="15" required>
                       </div>
                       <div class="form-group">
                           <label for="apellidoEditar">Apellido:</label>
                           <input type="text" name="apellidoEditar" class="form-control" value="'.$objectUsuario->getApellido().'" placeholder="Apellido" id="apellidoEditar" maxlength="20" required>
                       </div>
                       <div class="form-group">
                           <label for="emailEditar">Correo Electrónico: <span></span></label>
                           <input type="email" name="emailEditar" class="form-control" value="'.$objectUsuario->getEmail().'" placeholder="Correo electronico" id="emailEditar" maxlength="30" required>
                       </div>
                       <div class="form-group">
                           <label for="usuarioEditar">Nombre de Usuario: <span></span></label>
                           <input type="text" name="usuarioEditar" class="form-control" value="'.$objectUsuario->getUsuario().'" placeholder="Username" id="usuarioEditar" maxlength="30" required>
                       </div>
                       <div class="form-group">
                           <label for="passwordEditar">Contraseña:</label>   
                           <input type="text" name="passwordEditar" class="form-control" value="'.$objectUsuario->getPassword().'" placeholder="Password" id="passwordEditar" maxlength="10" required>
                       </div>
                       <div class="form-group">
                           <label for="telefonoEditar">Télefono:</label>
                           <input type="text" name="telefonoEditar" class="form-control" value="'.$objectUsuario->getTelefono().'" placeholder="Telefono" id="telefonoEditar" maxlength="10" required>
                       </div>
                       <div class="form-group">
                            <label for="fechaEditar">Fecha de Nacimiento</label>
                             <div class="input-group date">
                                <input type="date" class="form-control" name="fechaEditar" id="fechaEditar"  value="'.$objectUsuario->getFecha_Nacimiento().'">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                       </div>
                       <div class="form-group">
                            <label for="sexoEditar">Sexo:</label>
                            <select class="form-control" name="sexoEditar" id="sexoEditar" required>
                                  <option value="M">Masculino</option>
                                  <option value="F">Femenino</option>
                            </select>
                         
                       </div>';

			}

		}
	}
?>