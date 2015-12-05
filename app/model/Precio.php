<?php

namespace app\model;

class Precio
{
    private $id;
    private $fechaDesde;
    private $valor;
    private $casa;

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

    public function setCasa(Casa $casa = null)
    {
        $this->casa = $casa;
        return $this;
    }

    public function getCasa()
    {
        return $this->casa;
    }
}
