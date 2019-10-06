<?php
namespace usuarioPHP;
class Usuario
{
    /**
     * @var string
     */
    protected $nombre;
    protected $apellido;
    protected $contrasena;
    protected $email;
    protected $edad;

    public function __construct($nombre, $apellido, $edad, $correoElectronico,$contrasena)
    {
            $this->email = $correoElectronico;
            $this->contrasena = password_hash($contrasena,PASSWORD_DEFAULT);
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
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
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return$this->email;
    }
    public function getContrasena(){
        return $this->contrasena;
    }
}
