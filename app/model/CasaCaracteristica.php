<?php

namespace app\model;

class CasaCaracteristica
{
    private $id;
    private $descripcion;
    private $idCasa;
    private $idCaracteristica;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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

    public function setIdCasa($idCasa)
    {
        $this->idCasa = $idCasa;
        return $this;
    }

    public function getIdCasa()
    {
        return $this->idCasa;
    }

    public function setIdCaracteristica($idCaracteristica)
    {
        $this->idCaracteristica = $idCaracteristica;
        return $this;
    }

    public function getIdCaracteristica()
    {
        return $this->idCaracteristica;
    }
}
