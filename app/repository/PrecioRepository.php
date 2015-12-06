<?php

namespace app\repository;

use app\model\Precio;
use ArrayObject;
use mysqli;

class PrecioRepository
{
    public function getOne($id) {
        $precio = new Precio();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, fecha_desde, valor FROM precio WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idCasa,$fechaDesde,$valor);
            $statement->fetch();
            $precio->setId($ids);
            $precio->setIdCasa($idCasa);
            $precio->setFechaDesde($fechaDesde);
            $precio->setValor($valor);
        }
        $statement->close();
        $mysqli->close();
        return $precio;
    }

    public function getAll() {
        $precios = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, fecha_desde, valor FROM precio";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $precio = new Precio();
            $precio->setId($fila['id']);
            $precio->setIdCasa($fila['id_casa']);
            $precio->setFechaDesde($fila['fecha_desde']);
            $precio->setValor($fila['valor']);
            $precios->append($precio);
        }
        $mysqli->close();
        return $precios;
    }

    public function insert(Precio $precio) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO precio (id_casa, fecha_desde, valor)  VALUES(?,FROM_UNIXTIME(?),?)";
        $statement = $mysqli->prepare($query);
        $idCasa = $precio->getIdCasa();
        $fechaDesde = $precio->getFechaDesde();
        $valor = $precio->getValor();
        $statement->bind_param("iid",$idCasa,$fechaDesde,$valor);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(Precio $precio) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE precio SET id_casa=?, fecha_desde=?, valor=? where id=?";
        $statement = $mysqli->prepare($query);
        $idCasa = $precio->getIdCasa();
        $fechaDesde = $precio->getFechaDesde();
        $valor = $precio->getValor();
        $id = $precio->getId();
        $statement->bind_param("iidi",$idCasa,$fechaDesde,$valor,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM precio WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }
}
