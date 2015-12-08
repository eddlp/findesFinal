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
                  img1, img2, img3, img4, img5, valor FROM casa WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
                $dormitorios,$img1,$img2,$img3,$img4,$img5,$valor);
            $statement->fetch();
            $casa->setId($ids);
            $casa->setIdPersona($idPersona);
            $casa->setCapacidad($capacidad);
            $casa->setAmbientes($ambientes);
            $casa->setBanios($banios);
            $casa->setSuperficie($superficie);
            $casa->setDireccion($direccion);
            $casa->setDormitorios($dormitorios);
            $casa->setImg1($img1);
            $casa->setImg2($img2);
            $casa->setImg3($img3);
            $casa->setImg4($img4);
            $casa->setImg5($img5);
            $casa->setValor($valor);
        }
        $statement->close();
        $mysqli->close();
        return $casa;
    }

    public function getAll() {
        $casas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5, valor FROM casa";
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
            $casa->setValor($fila['valor']);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }

    public function insert(Casa $casa) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO casa (id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
              img1, img2, img3, img4, img5, valor) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
        $valor = $casa->getValor();
        $statement->bind_param("iiiiisisssssd", $idPersona, $capacidad, $ambientes, $banios, $superficie, $direccion,
            $dormitorios, $img1, $img2, $img3, $img4, $img5, $valor);
        $statement->execute();
        $statement->close();
        $id = mysqli_insert_id($mysqli);
        $mysqli->close();
        return $id;
    }

    public function update(Casa $casa) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE casa SET id_persona=?, capacidad=?, ambientes=?, banios=?, superficie=?,
                  direccion=?, dormitorios=?, img1=?, img2=?, img3=?, img4=?, img5=?, valor=? where id=?";
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
        $valor = $casa->getValor();
        $statement->bind_param("iiiiisisssssdi",$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5,$valor,$id);
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
                  img1, img2, img3, img4, img5, valor FROM casa WHERE id_persona=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$idPersona);
        $statement->execute();
        $statement->bind_result($id,$idPersonas,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5,$valor);
        while($statement->fetch()) {
            $casa = new Casa();
            $casa->setId($id);
            $casa->setIdPersona($idPersonas);
            $casa->setCapacidad($capacidad);
            $casa->setAmbientes($ambientes);
            $casa->setBanios($banios);
            $casa->setSuperficie($superficie);
            $casa->setDireccion($direccion);
            $casa->setDormitorios($dormitorios);
            $casa->setImg1($img1);
            $casa->setImg2($img2);
            $casa->setImg3($img3);
            $casa->setImg4($img4);
            $casa->setImg5($img5);
            $casa->setValor($valor);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }

    public function countAll()
    {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT * FROM casa";
        $result = $mysqli->query($query);
        $total = mysqli_num_rows($result);
        $mysqli->close();
        return $total;
    }

    public function countAllByPersona($idPersona)
    {
        $casas = $this->getAllByPersona($idPersona);
        $total = $casas->count();
        return $total;
    }

    public function getAllByPage($inicio, $cantidadPorPagina)
    {
        $casas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5, valor FROM casa LIMIT ?,?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("ii",$inicio,$cantidadPorPagina);
        $statement->execute();
        $statement->bind_result($ids,$idPersona,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5,$valor);
        while($statement->fetch()) {
            $casa = new Casa();
            $casa->setId($ids);
            $casa->setIdPersona($idPersona);
            $casa->setCapacidad($capacidad);
            $casa->setAmbientes($ambientes);
            $casa->setBanios($banios);
            $casa->setSuperficie($superficie);
            $casa->setDireccion($direccion);
            $casa->setDormitorios($dormitorios);
            $casa->setImg1($img1);
            $casa->setImg2($img2);
            $casa->setImg3($img3);
            $casa->setImg4($img4);
            $casa->setImg5($img5);
            $casa->setValor($valor);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }

    public function getAllByPersonaAndPage($idPersona, $inicio, $cantidadPorPagina)
    {
        $casas = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, capacidad, ambientes, banios, superficie, direccion, dormitorios,
                  img1, img2, img3, img4, img5, valor FROM casa WHERE id_persona=? LIMIT ?,?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("iii",$idPersona,$inicio,$cantidadPorPagina);
        $statement->execute();
        $statement->bind_result($id,$idPersonas,$capacidad,$ambientes,$banios,$superficie,$direccion,
            $dormitorios,$img1,$img2,$img3,$img4,$img5,$valor);
        while($statement->fetch()) {
            $casa = new Casa();
            $casa->setId($id);
            $casa->setIdPersona($idPersonas);
            $casa->setCapacidad($capacidad);
            $casa->setAmbientes($ambientes);
            $casa->setBanios($banios);
            $casa->setSuperficie($superficie);
            $casa->setDireccion($direccion);
            $casa->setDormitorios($dormitorios);
            $casa->setImg1($img1);
            $casa->setImg2($img2);
            $casa->setImg3($img3);
            $casa->setImg4($img4);
            $casa->setImg5($img5);
            $casa->setValor($valor);
            $casas->append($casa);
        }
        $mysqli->close();
        return $casas;
    }
}
