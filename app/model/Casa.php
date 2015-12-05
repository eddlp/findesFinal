<?php

namespace app\model;

class Casa
{
    private $id;
    private $capacidad;
    private $ambientes;
    private $banios;
    private $superficie;
    private $direccion;
    private $dormitorios;
    private $persona;

    public function getId()
    {
        return $this->id;
    }

    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
        return $this;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function setAmbientes($ambientes)
    {
        $this->ambientes = $ambientes;
        return $this;
    }

    public function getAmbientes()
    {
        return $this->ambientes;
    }

    public function setBanios($banios)
    {
        $this->banios = $banios;
        return $this;
    }

    public function getBanios()
    {
        return $this->banios;
    }

    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;
        return $this;
    }

    public function getSuperficie()
    {
        return $this->superficie;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDormitorios($dormitorios)
    {
        $this->dormitorios = $dormitorios;
        return $this;
    }

    public function getDormitorios()
    {
        return $this->dormitorios;
    }

    public function setPersona(Persona $persona = null)
    {
        $this->persona = $persona;
        return $this;
    }

    public function getPersona()
    {
        return $this->persona;
    }
}
