<?php

namespace app\repository;

use app\model\Reserva;
use ArrayObject;
use mysqli;

class ReservaRepository
{
    public function getOne($id) {
        $reserva = new Reserva();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idCasa,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
            $statement->fetch();
            $reserva->setId($ids);
            $reserva->setIdCasa($idCasa);
            $reserva->setIdPersonaReserva($idPersonaReserva);
            $reserva->setIdEstado($idestado);
            $reserva->setFechaDesde($fechaDesde);
            $reserva->setFechaHasta($fechaHasta);
            $reserva->setValor($valor);
            $reserva->setObservacion($observacion);
        }
        $statement->close();
        $mysqli->close();
        return $reserva;
    }

    public function getAll() {
        $reservas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $reserva = new Reserva();
            $reserva->setId($fila['id']);
            $reserva->setIdCasa($fila['id_casa']);
            $reserva->setIdPersonaReserva($fila['id_persona_reserva']);
            $reserva->setIdEstado($fila['id_estado']);
            $reserva->setFechaDesde($fila['fecha_desde']);
            $reserva->setFechaHasta($fila['fecha_hasta']);
            $reserva->setValor($fila['valor']);
            $reserva->setObservacion($fila['observacion']);
            $reservas->append($reserva);
        }
        $mysqli->close();
        return $reservas;
    }

    public function insert(Reserva $reserva) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO reserva (id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion)
                  VALUES(?,?,?,FROM_UNIXTIME(?),FROM_UNIXTIME(?),?,?)";
        $statement = $mysqli->prepare($query);
        $idCasa = $reserva->getIdCasa();
        $idPersonaReserva = $reserva->getIdPersonaReserva();
        $idEstado = $reserva->getIdEstado();
        $fechaDesde = $reserva->getFechaDesde();
        $fechaHasta = $reserva->getFechaHasta();
        $valor = $reserva->getFechaHasta();
        $observacion = $reserva->getObservacion();
        $statement->bind_param("iiiiids",$idCasa,$idPersonaReserva,$idEstado,$fechaDesde,$fechaHasta,$valor,$observacion);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(reserva $reserva) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE reserva SET id_casa=?, id_persona_reserva=?, id_estadp=?, fecha_desde=?,
                  fecha_hasta=?, valor=?, observacion=? where id=?";
        $statement = $mysqli->prepare($query);
        $idCasa = $reserva->getIdCasa();
        $idPersonaReserva = $reserva->getIdPersonaReserva();
        $idEstado = $reserva->getIdEstado();
        $fechaDesde = $reserva->getFechaDesde();
        $fechaHasta = $reserva->getFechaHasta();
        $valor = $reserva->getFechaHasta();
        $observacion = $reserva->getObservacion();
        $id = $reserva->getId();
        $statement->bind_param("iiiiidsi",$idCasa,$idPersonaReserva,$idEstado,$fechaDesde,$fechaHasta,$valor,$observacion,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM reserva WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

}
