<?php

use app\model\Reserva;

require_once('../../model/Reserva.php');

class catalogoUtil
{
    public function validarReserva(Reserva $reserva, $fechaDesde, $fechaHasta, $disponible)
    {
        $fDesde = $reserva->getFechaDesde();
        $fHasta = $reserva->getFechaHasta();

        $fDesde = date("d-m-Y", strtotime($fDesde));
        $fHasta = date("d-m-Y", strtotime($fHasta));

        if (($fechaDesde >= $fDesde) && ($fechaDesde < $fHasta)) {
            $disponible = false;
            return $disponible;
        } else if (($fechaHasta > $fDesde) && ($fechaHasta <= $fHasta)) {
            $disponible = false;
            return $disponible;
        } else if (($fechaDesde < $fDesde) && ($fechaHasta > $fHasta)) {
            $disponible = false;
            return $disponible;
        }

        return $disponible;
    }
}

