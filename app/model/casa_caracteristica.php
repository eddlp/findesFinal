<?php

namespace app\model;

class casa_caracteristica
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

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set casa
     *
     * @param \AppBundle\Entity\casa $casa
     *
     * @return casa_caracteristica
     */
    public function setCasa(\AppBundle\Entity\casa $casa = null)
    {
        $this->casa = $casa;

        return $this;
    }

    /**
     * Get casa
     *
     * @return \AppBundle\Entity\casa
     */
    public function getCasa()
    {
        return $this->casa;
    }

    /**
     * Set caracteristica
     *
     * @param \AppBundle\Entity\caracteristica $caracteristica
     *
     * @return casa_caracteristica
     */
    public function setCaracteristica(\AppBundle\Entity\caracteristica $caracteristica = null)
    {
        $this->caracteristica = $caracteristica;

        return $this;
    }

    /**
     * Get caracteristica
     *
     * @return \AppBundle\Entity\caracteristica
     */
    public function getCaracteristica()
    {
        return $this->caracteristica;
    }
}
