<?php
namespace aprendamosPHP;
use usuarioPHP\Usuario;

class Administrador extends Usuario {
    private $listaInstructoresPlaforma;
    private $listaCursos;

    public function __construct($nombre, $apellido, $edad, $correoElectronico, $contrasena)
    {
        parent::__construct($nombre, $apellido, $edad, $correoElectronico, $contrasena);
    }


}