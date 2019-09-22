<?php
namespace usuarioPHP;
class Usuario
{
    /**
     * @var string
     */
    private $nombre;
    private $apellido;
    private $contrasena;
    private $correoElectronico;
    private $edad;

    public function __construct($correoElectronico,$contrasena)
    {
            $this->correoElectronico = $correoElectronico;
            $this->contrasena = password_hash($contrasena,PASSWORD_DEFAULT);
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido( $apellido){
        $this->apellido = $apellido;
    }
    public function setEdad($edad){
        $this->edad = $edad;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }
    public function setCorreoElectronico($correoElectronico){
        $this->correoElectronico = $correoElectronico;
    }
    public function getCorreoElectronico(){
        return$this->correoElectronico;
    }
}
