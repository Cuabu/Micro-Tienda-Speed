<?php


/**
 * Usuario
 */
class Usuario
{
    protected $idUsuario;
    protected $nombre;
    protected $segundoNombre;
    protected $apellido;
    protected $segundoApellido;
    protected $codigo;
    protected $identificacion;
    protected $email;
    protected $telefono;
    protected $password;
    protected $Programa_idPrograma;
    protected $Estado_idEstado;
    protected $Rol_idRol;
    
    public function __construct($idUsuario, $nombre, $segundoNombre, $apellido, $segundoApellido, $codigo, $identificacion, $email, $telefono, $password, $Programa_idPrograma, $Estado_idEstado, $Rol_idRol){
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->segundoNombre = $segundoNombre;
        $this->apellido = $apellido;
        $this->segundoApellido = $segundoApellido;
        $this->codigo = $codigo;
        $this->identificacion = $identificacion;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->password = $password;
        $this->Programa_idPrograma = $Programa_idPrograma;
        $this->Estado_idEstado = $Estado_idEstado;
        $this->Rol_idRol = $Rol_idRol;
    	
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }
    
    public function getnombre(){
        return $this->nombre;
    }
    public function setnombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    
    public function getsegundoNombre(){
        return $this->segundoNombre;
    }
    public function setsegundoNombre($segundoNombre){
        $this->segundoNombre = $segundoNombre;
        return $this;
    }
    
    public function getapellido(){
        return $this->apellido;
    }
    public function setapellido($apellido){
        $this->apellido = $apellido;
        return $this;
    }
    
    public function getsegundoApellido(){
        return $this->segundoApellido;
    }
    public function setsegundoApellido($segundoApellido){
        $this->segundoApellido = $segundoApellido;
        return $this;
    }
    
    public function getcodigo(){
        return $this->codigo;
    }
    public function setcodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }
    
    public function getidentificacion(){
        return $this->identificacion;
    }
    public function setidentificacion($identificacion){
        $this->identificacion = $identificacion;
        return $this;
    }
    
    public function getemail(){
        return $this->email;
    }
    public function setemail($email){
        $this->email = $email;
        return $this;
    }
    
    public function gettelefono(){
        return $this->telefono;
    }
    public function settelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }
    
    public function getpassword(){
        return $this->password;
    }
    public function setpassword($password){
        $this->password = $password;
        return $this;
    }
    
    public function getPrograma_idPrograma(){
        return $this->Programa_idPrograma;
    }
    public function setPrograma_idPrograma($Programa_idPrograma){
        $this->Programa_idPrograma = $Programa_idPrograma;
        return $this;
    }
    
    public function getEstado_idEstado(){
        return $this->Estado_idEstado;
    }
    public function setEstado_idEstado($Estado_idEstado){
        $this->Estado_idEstado = $Estado_idEstado;
        return $this;
    }
    
    public function getRol_idRol(){
        return $this->Rol_idRol;
    }
    public function setRol_idRol($Rol_idRol){
        $this->Rol_idRol = $Rol_idRol;
        return $this;
    }
    
       
    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}

