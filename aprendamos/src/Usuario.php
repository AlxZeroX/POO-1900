<?php
namespace aprendamosPHP;
class Usuario
{
    /**
     * @var string
     */
    private $nombre;
    private $apellido;
    private $contrasena;
    private $correoElectronico;

    public function __construct($correoElectronico,$contrasena)
    {
            $this->correoElectronico = $correoElectronico;
            $this->contrasena = password_hash($contrasena,PASSWORD_DEFAULT);
    }
    public function seNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
}
