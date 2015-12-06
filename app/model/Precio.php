<?php

namespace app\model;

class Precio
{
    private $id;
    private $fechaDesde;
    private $valor;
    private $idCasa;

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

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setIdCasa($idCasa)
    {
        $this->idCasa = $idCasa;
        return $this;
    }

    public function getIdCasa()
    {
        return $this->Idcasa;
    }
}
