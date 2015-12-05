<?php

namespace app\model;

class Casa_caracteristica
{
    private $id;
    private $descripcion;
    private $casa;
    private $caracteristica;

    public function getId()
    {
        return $this->id;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
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

    public function setCaracteristica(Caracteristica $caracteristica = null)
    {
        $this->caracteristica = $caracteristica;
        return $this;
    }

    public function getCaracteristica()
    {
        return $this->caracteristica;
    }
}
