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
    private $idPersona;
    private $img1;
    private $img2;
    private $img3;
    private $img4;
    private $img5;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
        return $this;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setImg1($img1)
    {
        $this->img1 = $img1;
        return $this;
    }

    public function getImg1()
    {
        return $this->img1;
    }

    public function setImg2($img2)
    {
        $this->img2 = $img2;
        return $this;
    }

    public function getImg2()
    {
        return $this->img2;
    }

    public function setImg3($img3)
    {
        $this->img3 = $img3;
        return $this;
    }

    public function getImg3()
    {
        return $this->img3;
    }

    public function setImg4($img4)
    {
        $this->img4 = $img4;
        return $this;
    }

    public function getImg4()
    {
        return $this->img4;
    }

    public function setImg5($img5)
    {
        $this->img5 = $img5;
        return $this;
    }

    public function getImg5()
    {
        return $this->img5;
    }
}
