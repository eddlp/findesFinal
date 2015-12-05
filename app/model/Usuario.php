<?php

namespace app\model;

class Usuario
{
    private $id;
    private $email;
    private $pass;
    private $username;
    private $habilitado;
    private $token;
    private $fechaToken;
    private $persona;

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;
        return $this;
    }

    public function getHabilitado()
    {
        return $this->habilitado;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setFechaToken($fechaToken)
    {
        $this->fechaToken = $fechaToken;
        return $this;
    }

    public function getFechaToken()
    {
        return $this->fechaToken;
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
