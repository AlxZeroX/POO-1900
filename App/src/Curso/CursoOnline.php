<?php


namespace cursoPHP;


class CursoOnline extends \Curso
{
    private $videoClases;

    public function __construct($nombreCurso)
    {
        parent::__construct($nombreCurso);
        $this->videoClases = array();
    }

    public function agregarVideoClase($clase){
        $this->videoClases[] = $clase;
    }
    public function getCantidadDeVideoClases(){
        return count($this->videoClases,1);
    }

    public function eliminarVideoClase($indice){
        if($indice>=0 && $indice<count($this->videoClases,1))
            unset($this->videoClases[$indice]);
    }
}