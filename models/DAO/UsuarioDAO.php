<?php


require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Usuario.php");

class UsuarioDAO {

    public function autenticarUsuario($id, $pass){
        echo "<br>autenticarUsuario en UsuarioDAO ".$id."  ".$pass;
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM Usuario WHERE identificacion = :id AND password = :pass", array(':id'=>$id,':pass'=>$pass));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario (
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["segundoNombre"], 
                        $data_table[$indice]["apellido"], 
                        $data_table[$indice]["segundoApellido"], 
                        $data_table[$indice]["codigo"], 
                        $data_table[$indice]["identificacion"], 
                        $data_table[$indice]["email"], 
                        $data_table[$indice]["telefono"], 
                        $data_table[$indice]["password"], 
                        $data_table[$indice]["Programa_idPrograma"], 
                        $data_table[$indice]["Estado_idEstado"], 
                        $data_table[$indice]["Rol_idRol"]
                );
                  
            }
           
        } 
        
        return $usuario;
    }
    
    public function contarUsuariosUsuarioDao(){
        $data_source = new DataSource();

        $numero_de_usuarios = $data_source->contarColumnasDataSource("SELECT * FROM usuario");

        return $numero_de_usuarios;
    }

    public function selectTipoUsuarioUsuarioDao(){

        require_once (__DIR__."/../entidad/TipoUsuario.php");

        $data_source = new DataSource();

        // $data_table = $data_source->getRegistros("SELECT * FROM tipousuario");
         $data_table = $data_source->ejecutarConsulta("SELECT * FROM tipousuario");

        $tipoUsuario=null;
        $tiposUsuarios = [];
        foreach($data_table as $indice => $valor){
                $tipoUsuario = new TipoUsuario (
                $data_table[$indice]["idTipoUsuario"],
                $data_table[$indice]["nombre"], 
                $data_table[$indice]["descripcion"]
                );
                array_push($tiposUsuarios,$tipoUsuario);
        }
        
        return $tiposUsuarios;

    }

    public function buscarUsuarioPorId($id){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE idUsuario = :id", array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }    
    public function buscarUsuarioPorEmail($email){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE email = :email", 
                                                    array(':email'=>$email));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }    

    
    
    public function leerUsuarios(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM Usuario");
        $usuario=null;
        $usuarios=array();
        foreach($data_table as $indice=>$valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["segundoNombre"],
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["segundoApellido"],
                        $data_table[$indice]["codigo"],
                        $data_table[$indice]["identificacion"], 
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["Programa_idPrograma"],
                        $data_table[$indice]["Estado_idEstado"],
                        $data_table[$indice]["Rol_idRol"]
                        );
                array_push($usuarios,$usuario);
        }
        return $usuarios;   
    }
    
    public function insertarUsuarioUsuarioDAO(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "INSERT INTO Usuario (nombre, segundoNombre, apellido, segundoApellido, codigo, identificacion, email, telefono, password, Programa_idPrograma, Estado_idEstado, Rol_idRol) VALUES (:nombre, :segundoNombre, :apellido, :segundoApellido, :codigo, :identificacion, :email, :telefono, :password, :Programa_idPrograma, :Estado_idEstado, :Rol_idRol)";
        
        $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':nombre'=>$usuario->getnombre(),
            ':segundoNombre'=>$usuario->getsegundoNombre(),
            ':apellido'=>$usuario->getapellido(),
            ':segundoApellido'=>$usuario->getsegundoApellido(),
            ':codigo'=>$usuario->getcodigo(),
            ':identificacion'=>$usuario->getidentificacion(),
            ':email'=>$usuario->getemail(),
            ':telefono'=>$usuario->gettelefono(),
            ':password'=>$usuario->getpassword(),
            ':Programa_idPrograma'=>$usuario->getPrograma_idPrograma(),
            ':Estado_idEstado'=>$usuario->getEstado_idEstado(),
            ':Rol_idRol'=>$usuario->getRol_idRol()
            )
        );
        
        return $resultado;
    }
    
    
    public function modificarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "UPDATE usuario SET cc= :cc, "
                . " nombre= :nombre, "
                . " apellido= :apellido, "
                . " fecha_nacimiento= :fecha_nacimiento, "
                . " sexo= :sexo, "
                . " email= :email, "
                . " telefono= :telefono, "
                . " usuario= :usuario, "
                . " password= :password, "
                . " idTipoUsuario= :idTipoUsuario "
                . " WHERE idUsuario= :idUsuario ";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
               	':idUsuario'=>$usuario->getIdUsuario(),
            	':cc'=>$usuario->getCc(),
            	':nombre'=>$usuario->getNombre(),
            	':apellido'=>$usuario->getApellido(),
            	':fecha_nacimiento'=>$usuario->getFecha_Nacimiento(),
            	':sexo'=>$usuario->getSexo(),
            	':email'=>$usuario->getEmail(),
            	':telefono'=>$usuario->getTelefono(),
            	':usuario'=>$usuario->getUsuario(),
            	':password'=>$usuario->getPassword(),
            	':idTipoUsuario'=>$usuario->getIdTipoUsuario()
            )
        );
        
       
        return $resultado;
    }
    
    public function borrarUsuario($id){
        echo "<br>borrarUsuario en UsuarioDAO id=".$id;
        $data_source = new DataSource();
        // $usuario =  buscarUsuarioPorId($id);
        $resultado = $data_source->eliminar("Usuario", "idUsuario", $id);
        // $resultado = $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE idUsuario = :id", array('id'=>$id));
   
        return $resultado;
    }
    
    
    
}
