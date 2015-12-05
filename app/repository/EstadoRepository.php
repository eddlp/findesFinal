<?php

namespace app\repository;

use app\model\Estado;
use mysqli;

class EstadoRepository
{
    public function getOne($id){
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
}
