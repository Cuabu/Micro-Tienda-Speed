<?php

    function agregarProducto($nombreproducto, $precioproducto, $tiendaproducto, $ubicacionproducto){
        echo "<br>AGREGAR PRODUCTO";
        require_once(__DIR__."/../../models/DAO/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $usuario = $dao->autenticarUsuario($cedula, $contrasena);
        return $usuario;
    }