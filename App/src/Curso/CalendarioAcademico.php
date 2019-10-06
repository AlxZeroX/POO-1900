<?php


namespace cursoPHP;


class CalendarioAcademico
{
    private $fechaInicio;
    private $fechaFinal;
    private $horaInicio;
    private $horaFin;
    private $duracionDias;

    public function __construct($fechaInicio, $fechaFinal,$horaInicio,$horaFin)
    {
        $this->setFechaIncio($fechaInicio);
        $this->setFechaFinal($fechaFinal);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
    }

    public function setFechaIncio($fecha){
        $this->fechaInicio=$fecha;
    }
    public function setFechaFinal($fecha){
        $this->fechaFinal = $fecha;
    }
    public function setHoraInicio($hora){
        $this->horaInicio =$hora;
    }
    public  function setHoraFin($hora){
        $this->horaFin =$hora;
    }
    public function setDuracionDias($dias){
        $this->duracionDias = $dias;
    }
    public function getFechaIncio(){
        return $this->fechaInicio;
    }
    public function getFechaFin(){
        return $this->fechaFinal;
    }
    public function getHoraInicio(){
        return $this->horaInicio;
    }
    public function getHoraFin(){
        return $this->horaFin;
    }
    public function getDuracionDias(){
        return $this->duracionDias;
    }

}