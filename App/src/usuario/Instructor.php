<?php
namespace aprendamosPHP;
class Instructor extends Usuario{
    private $certificados;
    private $cursosAsignados;

    public function __construct($nombre, $apellido, $edad, $email, $contrasena){
        parent::__construct($nombre, $apellido, $edad, $email, $contrasena);
        $this->certificados = array();
        $this->cursosAsignados = array();
    }
    public function agregarCertificado($certificado){
        $this->certificados[] = $certificado;
    }
    public function agregarCursoAsignados($curso){
        $this->cursosAsignados[] = $curso;
    }


}