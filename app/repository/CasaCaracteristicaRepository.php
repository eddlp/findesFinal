<?php

namespace app\repository;

use app\model\CasaCaracteristica;
use ArrayObject;
use mysqli;

class CasaCaracteristicaRepository
{
    public function getOne($id) {
        $casaCaracteristica = new CasaCaracteristica();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_caracteristica, descripcion FROM casa_caracteristica WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idCasa,$idCaracteristica,$descripcion);
            $statement->fetch();
            $casaCaracteristica->setId($ids);
            $casaCaracteristica->setIdCasa($idCasa);
            $casaCaracteristica->setIdCaracteristica($idCaracteristica);
            $casaCaracteristica->setDescripcion($descripcion);
        }
        $statement->close();
        $mysqli->close();
        return $casaCaracteristica;
    }

    public function getAll() {
        $casaCaracteristicas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_caracteristica, descripcion FROM casa_caracteristica";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $casaCaracteristica = new CasaCaracteristica();
            $casaCaracteristica->setId($fila['id']);
            $casaCaracteristica->setIdCasa($fila['id_casa']);
            $casaCaracteristica->setIdCaracteristica($fila['id_caracteristica']);
            $casaCaracteristica->setDescripcion($fila['descripcion']);
            $casaCaracteristicas->append($casaCaracteristica);
        }
        $mysqli->close();
        return $casaCaracteristicas;
    }

    public function insert(CasaCaracteristica $casaCaracteristica) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO casa_caracteristica (id_casa, id_caracteristica, descripcion) VALUES(?,?,?)";
        $statement = $mysqli->prepare($query);
        $idCasa = $casaCaracteristica->getIdCasa();
        $idCaracteristica = $casaCaracteristica->getIdCaracteristica();
        $descripcion = $casaCaracteristica->getDescripcion();
        $statement->bind_param("iis",$idCasa,$idCaracteristica,$descripcion);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(CasaCaracteristica $casaCaracteristica) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE casa_caracteristica SET id_casa=?, id_caracteristica=?, descripcion=? where id=?";
        $statement = $mysqli->prepare($query);
        $idCasa = $casaCaracteristica->getIdCasa();
        $idCaracteristica = $casaCaracteristica->getIdCaracteristica();
        $descripcion = $casaCaracteristica->getDescripcion();
        $id = $casaCaracteristica->getId();
        $statement->bind_param("iisi",$idCasa,$idCaracteristica,$descripcion,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM casa_caracteristica WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function getAllByCasa($idCasa) {
        $casaCaracteristicas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_caracteristica, descripcion FROM casa_caracteristica WHERE id_casa=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$idCasa);
        $statement->execute();
        $statement->bind_result($id,$idCasas,$idCaracteristica,$descripcion);
        while($statement->fetch()) {
            $casaCaracteristica = new CasaCaracteristica();
            $casaCaracteristica->setId($id);
            $casaCaracteristica->setIdCasa($idCasas);
            $casaCaracteristica->setIdCaracteristica($idCaracteristica);
            $casaCaracteristica->setDescripcion($descripcion);
            $casaCaracteristicas->append($casaCaracteristica);
        }
        $mysqli->close();
        return $casaCaracteristicas;
    }

    public function getOneByCasaAndCaracteristica($idCasa, $idCaracteristica)
    {
        $casaCaracteristica = new CasaCaracteristica();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_casa, id_caracteristica, descripcion FROM casa_caracteristica
                  WHERE id_casa=? and id_caracteristica=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("ii",$idCasa,$idCaracteristica);
        if($statement->execute()){
            $statement->bind_result($id,$idCasas,$idCaracteristicas,$descripcion);
            $statement->fetch();
            $casaCaracteristica->setId($id);
            $casaCaracteristica->setIdCasa($idCasas);
            $casaCaracteristica->setIdCaracteristica($idCaracteristicas);
            $casaCaracteristica->setDescripcion($descripcion);
        }
        $statement->close();
        $mysqli->close();
        return $casaCaracteristica;
    }
}
