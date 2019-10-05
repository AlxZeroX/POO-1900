<?php
class Curso{
    protected $nombreCurso;
    protected $listaInstructores=array();
    protected $listaAlumnos = array();
    protected function __construct($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;
    }
    public function setNombreCurso($nombreCurso){
        $this->nombreCurso=$nombreCurso;
    }
    public function getNombreCurso(){
        return $this->nombreCurso;
    }
    public function agregarInstructor($nombre){
        $this->listaInstructores[] = $nombre;
    }
    public function eliminarInstructor($nombreInstructor){
        //implementar
        return true;
    }
    public function agregarAlumno($nuevoAlumno){
        $this->listaAlumnos[] = $nuevoAlumno;
    }
    public function eliminarAlumno($nombreAlumno){
        //implementar
    }
}