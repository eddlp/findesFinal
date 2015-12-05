<?php

namespace app\repository;

use app\model\Estado;
use ArrayObject;
use mysqli;

class EstadoRepository
{
    public function getOne($id) {
        $estado = new Estado();
        $mysqli = new mysqli("localhost", "root", null, "findes");
        $query = "SELECT * FROM estado WHERE id=?";
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
        $mysqli = new mysqli("localhost", "root", null, "findes");
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

    public function save(Estado $estado) {
        $message = "Error al guardar el estado";
        $mysqli = new mysqli("localhost", "root", null, "findes");
        $query = "INSERT INTO estado (nombre) VALUES(?)";
        $statement = $mysqli->prepare($query);
        $nombre = $estado->getNombre();
        $statement->bind_param("s",$nombre);
        if($statement->execute()){
            $message = "Estado guardado";
        }
        $statement->close();
        $mysqli->close();
        return $message;
    }

    public function delete($id) {
        $message = "Error al eliminar el estado";
        $mysqli = new mysqli("localhost", "root", null, "findes");
        $query = "DELETE FROM estado WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $message = "Estado eliminado";
        }
        $statement->close();
        $mysqli->close();
        return $message;
    }
}
