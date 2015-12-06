<?php

namespace app\model;

class Reserva
{
    private $id;
    private $fechaDesde;
    private $fechaHasta;
    private $valor;
    private $observacion;
    private $idCasa;
    private $idPersonaReserva;
    private $idEstado;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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

    public function setIdCasa($idCasa)
    {
        $this->idCasa = $idCasa;
        return $this;
    }

    public function getIdCasa()
    {
        return $this->idCasa;
    }

    public function setIdPersonaReserva($idPersonaReserva)
    {
        $this->idPersonaReserva = $idPersonaReserva;
        return $this;
    }

    public function getIdPersonaReserva()
    {
        return $this->idPersonaReserva;
    }

    public function setIdEstado($idEstado = null)
    {
        $this->idEstado = $idEstado;
        return $this;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }
}
