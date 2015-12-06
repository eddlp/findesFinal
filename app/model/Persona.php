<?php

namespace app\model;

class Persona
{
    private $id;
    private $dni;
    private $nombre;
    private $apellido;
    private $direccion;
    private $localidad;
    private $telefono;
    private $telefono2;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    public function getDni()
    {
        return $this->dni;
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

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
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

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
        return $this;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;
        return $this;
    }

    public function getTelefono2()
    {
        return $this->telefono2;
    }
}

