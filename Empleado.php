<?php

Class Empleado {

    protected $nombreEmpleado;
    protected $edadEmpleado;
    protected $sueldoEmpleado; 
    protected $numTel; 
    protected $afiliado;
    protected $idUsuarioActual;

    public function __construct($nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliadoCompleto, $idUsuarioActual) {

        $this->nombreEmpleado = $nombreEmpleado;
        $this->edadEmpleado = $edadEmpleado;
        $this->sueldoEmpleado = $sueldoEmpleado;
        $this->numTel = $numTel;
        $this->afiliadoCompleto = $afiliadoCompleto;
        $this->idUsuarioActual = $idUsuarioActual;

    }
    public function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }
    public function getEdadEmpleado() {
        return $this->edadEmpleado;
    }
    public function getSueldoEmpleado() {
        return $this->sueldoEmpleado;
    }
    public function getNumTel() {
        return $this->numTel;
    }
    public function getAfiliado() {
        if ($this->afiliadoCompleto == "s") {
            $this->afiliadoCompleto = "Si";
        }
        else if ($this->afiliadoCompleto == "n") {
            $this->afiliadoCompleto = "No";
        }
        else if ($this-> afiliadoCompleto == "ns") {
            $this->afiliadoCompleto ="Sin especificar";
        }
        return $this->afiliadoCompleto;
    }
    public function getIdUsuarioActual() {
        return $this->idUsuarioActual;
    }
}