<?php

namespace app\repository;

use app\model\Casa;
use ArrayObject;
use mysqli;

class CasaRepository
{
    public function getOne($id) {
        $casa = new Casa();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5 FROM casa WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
                $dormitorios,$img1,$img2,$img3,$img4,$img5);
            $statement->fetch();
            $casa->setId($ids);
            $casa->setIdPersona($idPersona);
            $casa->setCapacidad($capacidad);
            $casa->setAmbientes($ambientes);
            $casa->setBanios($banios);
            $casa->setSuperficie($superficie);
            $casa->setDireccion($direccion);
            $casa->setDormitorios($dormitorios);
            $casa->setimg1($img1);
            $casa->setimg2($img2);
            $casa->setimg3($img3);
            $casa->setimg4($img4);
            $casa->setimg5($img5);
        }
        $statement->close();
        $mysqli->close();
        return $casa;
    }

    public function getAll() {
        $casas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5 FROM casa";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $casa = new Casa();
            $casa->setId($fila['id']);
            $casa->setIdPersona($fila['id_persona']);
            $casa->setCapacidad($fila['capacidad']);
            $casa->setAmbientes($fila['ambientes']);
            $casa->setBanios($fila['banios']);
            $casa->setSuperficie($fila['superficie']);
            $casa->setDireccion($fila['direccion']);
            $casa->setDormitorios($fila['dormitorios']);
            $casa->setImg1($fila['img1']);
            $casa->setImg2($fila['img2']);
            $casa->setImg3($fila['img3']);
            $casa->setImg4($fila['img4']);
            $casa->setImg5($fila['img5']);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }

    public function insert(Casa $casa) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO casa (id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $mysqli->prepare($query);
        $idPersona = $casa->getIdPersona();
        $capacidad = $casa->getCapacidad();
        $ambientes = $casa->getAmbientes();
        $banios = $casa->getBanios();
        $superficie = $casa->getSuperficie();
        $direccion = $casa->getDireccion();
        $dormitorios = $casa->getDormitorios();
        $img1 = $casa->getImg1();
        $img2 = $casa->getImg2();
        $img3 = $casa->getImg3();
        $img4 = $casa->getImg4();
        $img5 = $casa->getImg5();
        $statement->bind_param("iiiiisibbbbb",$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5);
        $statement->execute();
        $statement->close();
        $id = mysqli_insert_id($mysqli);
        $mysqli->close();
        return $id;
    }

    public function update(Casa $casa) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE casa SET id_persona=?, capacidad=?, ambientes=?, banios=?, superficie=?,
                  direccion=?, dormitorios=?, img1=?, img2=?, img3=?, img4=?, img5=? where id=?";
        $statement = $mysqli->prepare($query);
        $id = $casa->getId();
        $idPersona = $casa->getIdPersona();
        $capacidad = $casa->getCapacidad();
        $ambientes = $casa->getAmbientes();
        $banios = $casa->getBanios();
        $superficie = $casa->getSuperficie();
        $direccion = $casa->getDireccion();
        $dormitorios = $casa->getDormitorios();
        $img1 = $casa->getImg1();
        $img2 = $casa->getImg2();
        $img3 = $casa->getImg3();
        $img4 = $casa->getImg4();
        $img5 = $casa->getImg5();
        $statement->bind_param("iiiiisibbbbbi",$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM casa WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function getAllByPersona($idPersona) {
        $casas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5 FROM casa WHERE id_persona=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$idPersona);
        $statement->execute();
        $result = $statement->get_result();
        while($fila = $result->fetch_array()) {
            $casa = new Casa();
            $casa->setId($fila['id']);
            $casa->setIdPersona($fila['id_persona']);
            $casa->setCapacidad($fila['capacidad']);
            $casa->setAmbientes($fila['ambientes']);
            $casa->setBanios($fila['banios']);
            $casa->setSuperficie($fila['superficie']);
            $casa->setDireccion($fila['direccion']);
            $casa->setDormitorios($fila['dormitorios']);
            $casa->setImg1($fila['img1']);
            $casa->setImg2($fila['img2']);
            $casa->setImg3($fila['img3']);
            $casa->setImg4($fila['img4']);
            $casa->setImg5($fila['img5']);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }
}
