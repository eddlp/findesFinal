<?php

namespace app\repository;

use app\model\Estado;
use ArrayObject;
use mysqli;

class EstadoRepository
{
    public function getOne($id) {
        $estado = new Estado();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, nombre FROM estado WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$nombre);
            $statement->fetch();
            $estado->setId($ids);
            $estado->setNombre($nombre);
        }
        $statement->close();
        $mysqli->close();
        return $estado;
    }

    public function getAll() {
        $estados = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, nombre FROM estado";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $estado = new Estado();
            $estado->setId($fila['id']);
            $estado->setNombre($fila['nombre']);
            $estados->append($estado);
        }
        $mysqli->close();
        return $estados;
    }

    public function insert(Estado $estado) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO estado (nombre) VALUES(?)";
        $statement = $mysqli->prepare($query);
        $nombre = $estado->getNombre();
        $statement->bind_param("s",$nombre);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function update(Estado $estado) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE estado SET nombre=? where id=?";
        $statement = $mysqli->prepare($query);
        $nombre = $estado->getNombre();
        $id = $estado->getId();
        $statement->bind_param("si",$nombre,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM estado WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function getOneByName($nombre)
    {
        $estado = new Estado();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, nombre FROM estado WHERE nombre=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("s",$nombre);
        if($statement->execute()){
            $statement->bind_result($id,$nombres);
            $statement->fetch();
            $estado->setId($id);
            $estado->setNombre($nombres);
        }
        $statement->close();
        $mysqli->close();
        return $estado;
    }
}
