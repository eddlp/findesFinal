<?php

namespace app\model;

class Reserva
{
    private $id;
    private $fechaDesde;
    private $fechaHasta;
    private $valor;
    private $observacion;
    private $casa;
    private $persona_reserva;
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
        return $this;
    }

    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;
        return $this;
    }

    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
        return $this;
    }

    public function getObservacion()
    {
        return $this->observacion;
    }

    public function setCasa(Casa $casa = null)
    {
        $this->casa = $casa;
        return $this;
    }

    public function getCasa()
    {
        return $this->casa;
    }

    public function setPersonaReserva(Persona $personaReserva = null)
    {
        $this->persona_reserva = $personaReserva;
        return $this;
    }

    public function getPersonaReserva()
    {
        return $this->persona_reserva;
    }

    public function setEstado(Estado $estado = null)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }
}
