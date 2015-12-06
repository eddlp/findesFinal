<?php

namespace app\repository;

use app\model\Caracteristica;
use ArrayObject;
use mysqli;

class CaracteristicaRepository
{
    public function getOne($id) {
        $caracteristica = new Caracteristica();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_estado, nombre FROM caracteristica WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idEstado,$nombre);
            $statement->fetch();
            $caracteristica->setId($ids);
            $caracteristica->setIdEstado($idEstado);
            $caracteristica->setNombre($nombre);
        }
        $statement->close();
        $mysqli->close();
        return $caracteristica;
    }

    public function getAll() {
        $caracteristicas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_estado, nombre FROM caracteristica";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $caracteristica = new Caracteristica();
            $caracteristica->setId($fila['id']);
            $caracteristica->setIdEstado($fila['id_estado']);
            $caracteristica->setNombre($fila['nombre']);
            $caracteristicas->append($caracteristica);
        }
        $mysqli->close();
        return $caracteristicas;
    }

    public function insert(Caracteristica $caracteristica) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO caracteristica (id_estado, nombre)  VALUES(?,?)";
        $statement = $mysqli->prepare($query);
        $id_estado = $caracteristica->getidEstado();
        $nombre = $caracteristica->getNombre();
        $statement->bind_param("is",$id_estado,$nombre);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(Caracteristica $caracteristica) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE caracteristica SET id_estado=?, nombre=? where id=?";
        $statement = $mysqli->prepare($query);
        $id_estado = $caracteristica->getidEstado();
        $nombre = $caracteristica->getNombre();
        $id = $caracteristica->getId();
        $statement->bind_param("isi",$id_estado,$nombre,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM caracteristica WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }
}
