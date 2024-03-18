<?php

    function autenticarUsuario($cedula, $contrasena){
        echo "<br>autenticarUsuario";
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $usuario = $dao->autenticarUsuario($cedula, $contrasena);
        return $usuario;
    }
    
    function buscarUsuarioPorId($id){
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->buscarUsuarioPorId( $id);
        return $usuario;
    }
    
    function buscarUsuarioPorEmail($email){
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->buscarUsuarioPorEmail($email);
        return $usuario;
    }
    
    function insertarUsuarioMdbUsuario($id, $nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol){

        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        require_once(__DIR__."/../../models/entidad/Usuario.php");

        $objectUsuario = new Usuario($id, $nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol);
        
        $dao = new UsuarioDAO();
        $resultado = $dao->insertarUsuarioUsuarioDAO($objectUsuario);
        return $resultado;
    }

    function modificarUsuarioMdbUsuario($nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol){
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        require_once(__DIR__."/../../models/entidad/Usuario.php");

        $objectUsuario = new Usuario($nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol);

        $dao=new UsuarioDAO();
        $resultado=$dao->modificarUsuario($objectUsuario);
        return $resultado;
    }

    
    function borrarUsuario($id){
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $resultado=$dao->borrarUsuario($id);
        return $resultado;
    }     
    
    function leerUsuarios(){
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $usuarios=$dao->leerUsuarios();
        return $usuarios;
    }     