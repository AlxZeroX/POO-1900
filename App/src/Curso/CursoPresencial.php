<?php


namespace cursoPHP;


class CursoPresencial extends \Curso
{
    private $planificaion;
    private $lugar;

    function __construct($nombre, $planificaion, $lugar)
    {
        parent::__construct($nombre);
        $this->planificaion = $planificaion;
        $this->lugar = $lugar;
    }
    public function setPlanificaion($planificacion){
        $this->planificaion = $planificacion;
    }
    public function setLugar($lugar){
        $this->lugar = $lugar;
    }
    public function getPlanificaion(){
        return $this->planificaion;
    }

    public function getLugar(){
        return $this->lugar;
    }
}