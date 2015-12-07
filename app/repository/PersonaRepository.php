<?php

namespace app\repository;

use app\model\Persona;
use ArrayObject;
use mysqli;

class PersonaRepository
{
    public function getOne($id) {
        $persona = new Persona();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, dni, nombre, apellido, direccion, localidad, telefono, telefono2
                  FROM persona WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$dni,$nombre,$apellido,$direccion,$localidad,$telefono,$telefono2);
            $statement->fetch();
            $persona->setId($ids);
            $persona->setDni($dni);
            $persona->setNombre($nombre);
            $persona->setApellido($apellido);
            $persona->setDireccion($direccion);
            $persona->setLocalidad($localidad);
            $persona->setTelefono($telefono);
            $persona->setTelefono2($telefono2);
        }
        $statement->close();
        $mysqli->close();
        return $persona;
    }

    public function getAll() {
        $personas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, dni, nombre, apellido, direccion, localidad, telefono, telefono2 FROM persona";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $persona = new Persona();
            $persona->setId($fila['id']);
            $persona->setDni($fila['dni']);
            $persona->setNombre($fila['nombre']);
            $persona->setApellido($fila['apellido']);
            $persona->setDireccion($fila['direccion']);
            $persona->setLocalidad($fila['localidad']);
            $persona->setTelefono($fila['telefono']);
            $persona->setTelefono2($fila['telefono2']);
            $personas->append($persona);
        }
        $mysqli->close();
        return $personas;
    }

    public function insert(Persona $persona) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO persona (dni, nombre, apellido, direccion, localidad, telefono, telefono2)
                  VALUES(?,?,?,?,?,?,?)";
        $statement = $mysqli->prepare($query);
        $dni = $persona->getDni();
        $nombre = $persona->getNombre();
        $apellido = $persona->getApellido();
        $direccion = $persona->getDireccion();
        $localidad = $persona->getLocalidad();
        $telefono = $persona->getTelefono();
        $telefono2 = $persona->getTelefono2();
        $statement->bind_param("sssssss",$dni,$nombre,$apellido,$direccion,$localidad,$telefono,$telefono2);
        $statement->execute();
        $statement->close();
        $id = mysqli_insert_id($mysqli);
        $mysqli->close();
        return $id;
    }

    public function update(Persona $persona) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE persona SET dni=?, nombre=?, apellido=?, direccion=?, localidad=?,
                  telefono=?, telefono2=? where id=?";
        $statement = $mysqli->prepare($query);
        $id = $persona->getId();
        $dni = $persona->getDni();
        $nombre = $persona->getNombre();
        $apellido = $persona->getApellido();
        $direccion = $persona->getDireccion();
        $localidad = $persona->getLocalidad();
        $telefono = $persona->getTelefono();
        $telefono2 = $persona->getTelefono2();
        $statement->bind_param("sssssssi",$dni,$nombre,$apellido,$direccion,$localidad,$telefono,$telefono2,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM persona WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function getOneByDni($dni) {
        $persona = new Persona();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, dni, nombre, apellido, direccion, localidad, telefono, telefono2
                  FROM persona WHERE dni=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($id,$dnis,$nombre,$apellido,$direccion,$localidad,$telefono,$telefono2);
            $statement->fetch();
            $persona->setId($id);
            $persona->setDni($dnis);
            $persona->setNombre($nombre);
            $persona->setApellido($apellido);
            $persona->setDireccion($direccion);
            $persona->setLocalidad($localidad);
            $persona->setTelefono($telefono);
            $persona->setTelefono2($telefono2);
        }
        $statement->close();
        $mysqli->close();
        return $persona;
    }
}
