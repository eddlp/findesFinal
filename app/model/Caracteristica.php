<?php

namespace app\model;

class Caracteristica
{
    private $id;
    private $nombre;
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

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
        return $this;
    }

    public function getidEstado()
    {
        return $this->idEstado;
    }
}
