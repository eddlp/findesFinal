<?php

namespace app\model;

class Caracteristica
{
    private $id;
    private $nombre;
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
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
