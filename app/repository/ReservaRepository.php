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
        $statement->bind_param("iiiiids",$idCasa,$idPersonaReserva,$idEstado,$fechaDesde->getTimestamp(),
            $fechaHasta->getTimestamp(),$valor,$observacion);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(reserva $reserva) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE reserva SET id_casa=?, id_persona_reserva=?, id_estadp=?, fecha_desde=FROM_UNIXTIME(?),
                  fecha_hasta=FROM_UNIXTIME(?), valor=?, observacion=? where id=?";
        $statement = $mysqli->prepare($query);
        $idCasa = $reserva->getIdCasa();
        $idPersonaReserva = $reserva->getIdPersonaReserva();
        $idEstado = $reserva->getIdEstado();
        $fechaDesde = $reserva->getFechaDesde();
        $fechaHasta = $reserva->getFechaHasta();
        $valor = $reserva->getFechaHasta();
        $observacion = $reserva->getObservacion();
        $id = $reserva->getId();
        $statement->bind_param("iiiiidsi",$idCasa,$idPersonaReserva,$idEstado,$fechaDesde->getTimestamp(),
            $fechaHasta->getTimestamp(),$valor,$observacion,$id);
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

    public function getAllByPersona($idPersona)
    {
        $reservas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva WHERE id_persona_reserva=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$idPersona);
        $statement->execute();
        $statement->bind_result($id,$idCasa,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
        while($statement->fetch()) {
            $reserva = new Reserva();
            $reserva->setId($id);
            $reserva->setIdCasa($idCasa);
            $reserva->setIdPersonaReserva($idPersonaReserva);
            $reserva->setIdEstado($idestado);
            $reserva->setFechaDesde($fechaDesde);
            $reserva->setFechaHasta($fechaHasta);
            $reserva->setValor($valor);
            $reserva->setObservacion($observacion);
            $reservas->append($reserva);
        }
        $statement->close();
        $mysqli->close();
        return $reservas;
    }

    public function getAllByCasas($casas)
    {
        $reservas = new ArrayObject();
        foreach($casas as $c) {
            $idCasa = $c->getId();
            $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
            $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva WHERE id_casa=?";
            $statement = $mysqli->prepare($query);
            $statement->bind_param("i", $idCasa);
            $statement->execute();
            $statement->bind_result($id,$idCasas,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
            while ($statement->fetch()) {
                $reserva = new Reserva();
                $reserva->setId($id);
                $reserva->setIdCasa($idCasas);
                $reserva->setIdPersonaReserva($idPersonaReserva);
                $reserva->setIdEstado($idestado);
                $reserva->setFechaDesde($fechaDesde);
                $reserva->setFechaHasta($fechaHasta);
                $reserva->setValor($valor);
                $reserva->setObservacion($observacion);
                $reservas->append($reserva);
            }
            $statement->close();
            $mysqli->close();
        }
        return $reservas;
    }

    public function countAll()
    {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva";
        $result = $mysqli->query($query);
        $total = mysqli_num_rows($result);
        $mysqli->close();
        return $total;
    }

    public function countAllByCasas($casas)
    {
        $reservas = $this->getAllByCasas($casas);
        $total = $reservas->count();
        return $total;
    }

    public function getAllByPage($inicio, $cantidadPorPagina)
    {
        $reservas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva LIMIT ?,?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("ii", $inicio,$cantidadPorPagina);
        $statement->execute();
        $statement->bind_result($ids,$idCasa,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
        while($statement->fetch()) {
            $reserva = new Reserva();
            $reserva->setId($ids);
            $reserva->setIdCasa($idCasa);
            $reserva->setIdPersonaReserva($idPersonaReserva);
            $reserva->setIdEstado($idestado);
            $reserva->setFechaDesde($fechaDesde);
            $reserva->setFechaHasta($fechaHasta);
            $reserva->setValor($valor);
            $reserva->setObservacion($observacion);
            $reservas->append($reserva);
        }
        $statement->close();
        $mysqli->close();
        return $reservas;
    }

    public function getAllByCasasAndPage($casas, $inicio, $cantidadPorPagina)
    {
        $reservas = $this->getAllByCasas($casas);
        $reservasPage = new ArrayObject();
        $i = 0;
        foreach($reservas as $r) {
            if ($i>=$inicio && $i<($inicio + $cantidadPorPagina)) {
                $reservasPage->append($this->getOne($r->getId()));
            }
            $i++;
        }
        return $reservasPage;
    }

    public function countAllByPersona($idPersona)
    {
        $reservas = $this->getAllByPersona($idPersona);
        $total = $reservas->count();
        return $reservas;
    }

    public function getAllByPersonaAndPage($idPersona, $inicio, $cantidadPorPagina)
    {
        $reservas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
                  FROM reserva WHERE id_persona_reserva=? LIMIT ?,?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("iii",$idPersona, $inicio, $cantidadPorPagina);
        $statement->execute();
        $statement->bind_result($ids,$idCasa,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
        while($statement->fetch()) {
            $reserva = new Reserva();
            $reserva->setId($ids);
            $reserva->setIdCasa($idCasa);
            $reserva->setIdPersonaReserva($idPersonaReserva);
            $reserva->setIdEstado($idestado);
            $reserva->setFechaDesde($fechaDesde);
            $reserva->setFechaHasta($fechaHasta);
            $reserva->setValor($valor);
            $reserva->setObservacion($observacion);
            $reservas->append($reserva);
        }
        $statement->close();
        $mysqli->close();
        return $reservas;
    }

    public function getAllByCasaId($idCasa) {
        $reservas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_persona_reserva, id_estado, fecha_desde, fecha_hasta, valor, observacion
              FROM reserva WHERE id_casa=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i", $idCasa);
        $statement->execute();
        $statement->bind_result($id,$idCasas,$idPersonaReserva,$idestado,$fechaDesde,$fechaHasta,$valor,$observacion);
        while ($statement->fetch()) {
            $reserva = new Reserva();
            $reserva->setId($id);
            $reserva->setIdCasa($idCasas);
            $reserva->setIdPersonaReserva($idPersonaReserva);
            $reserva->setIdEstado($idestado);
            $reserva->setFechaDesde($fechaDesde);
            $reserva->setFechaHasta($fechaHasta);
            $reserva->setValor($valor);
            $reserva->setObservacion($observacion);
            $reservas->append($reserva);
        }
        $statement->close();
        $mysqli->close();
        return $reservas;
    }
}
