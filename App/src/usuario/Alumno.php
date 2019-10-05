<?php
namespace aprendamosPHP;
require_once ('Usuario.php');
class Alumno extends \Usuario{
    private $cursosIncritos = array();
    private $cursosContratados = array();
    private $cursosSolicitados = array();
    private $CursosAprobados = array();

    public function __construct($nombre, $apellido, $edad, $email, $contrasena)
    {
        parent::construc($nombre, $apellido, $edad,$email, $contrasena);
    }

    public function agregarCursoInscrito($nuevoCurso){
        if($nuevoCurso != "")
            $this->cursosIncritos[] = $nuevoCurso;
    }

    public function agregarCursosContratados($nuevoCurso){
        if($nuevoCurso != "")
            $this->cursosContratados[] = $nuevoCurso;
    }

    public function agregarCursoSolicitados($solicitud){
        if($solicitud != null)
            $this->cursosSolicitados[] = $solicitud;
        }
    public function agregarCursoAprovado($cursoAprobado){
            $this->CursosAprobados[] = $cursoAprobado;
    }
}