<?php

namespace app\repository;

use app\model\Usuario;
use ArrayObject;
use mysqli;

class UsuarioRepository
{
    public function getOne($id) {
        $usuario = new Usuario();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, email, pass, username, habilitado, token, fecha_token, admin
                  FROM usuario WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        if($statement->execute()){
            $statement->bind_result($ids,$idPersona,$email,$pass,$username,$habilitado,$token,$fecha_token,$admin);
            $statement->fetch();
            $usuario->setId($ids);
            $usuario->setIdPersona($idPersona);
            $usuario->setEmail($email);
            $usuario->setPass($pass);
            $usuario->setUsername($username);
            $usuario->setHabilitado($habilitado);
            $usuario->setToken($token);
            $usuario->setFechaToken($fecha_token);
            $usuario->setAdmin($admin);
        }
        $statement->close();
        $mysqli->close();
        return $usuario;
    }

    public function getAll() {
        $usuarios = new ArrayObject();
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, email, pass, username, habilitado, token, fecha_token, admin FROM usuario";
        $result = $mysqli->query($query);
        while($fila = $result->fetch_array()) {
            $usuario = new Usuario();
            $usuario->setId($fila['id']);
            $usuario->setIdPersona($fila['id_persona']);
            $usuario->setEmail($fila['email']);
            $usuario->setPass($fila['pass']);
            $usuario->setUsername($fila['username']);
            $usuario->setHabilitado($fila['habilitado']);
            $usuario->setToken($fila['token']);
            $usuario->setFechaToken($fila['fecha_token']);
            $usuario->setAdmin($fila['admin']);
            $usuarios->append($usuario);
        }
        $mysqli->close();
        return $usuarios;
    }

    public function insert(Usuario $usuario) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "INSERT INTO usuario (id_persona, email, pass, username, habilitado, token, fecha_token, admin)
                  VALUES(?,?,?,?,?,?,FROM_UNIXTIME(?),?)";
        $statement = $mysqli->prepare($query);
        $idPersona = $usuario->getIdPersona();
        $email = $usuario->getEmail();
        $pass = $usuario->getPass();
        $username = $usuario->getUsername();
        $habilitado = $usuario->getHabilitado();
        $token = $usuario->getToken();
        $fechaToken = $usuario->getFechaToken();
        $admin = $usuario->getAdmin();
        $statement->bind_param("isssisii",$idPersona,$email,$pass,$username,$habilitado,$token,
            $fechaToken->getTimestamp(),$admin);
        $statement->execute();
        $statement->close();
        $id = mysqli_insert_id($mysqli);
        $mysqli->close();
        return $id;
    }

    public function update(Usuario $usuario) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "UPDATE usuario SET id_persona=?, email=?, pass=?, username=?, habilitado=?,
                  token=?, fecha_token=FROM_UNIXTIME(?), admin=? where id=?";
        $statement = $mysqli->prepare($query);
        $id = $usuario->getId();
        $idPersona = $usuario->getIdPersona();
        $email = $usuario->getEmail();
        $pass = $usuario->getPass();
        $username = $usuario->getUsername();
        $habilitado = $usuario->getHabilitado();
        $token = $usuario->getToken();
        $fechaToken = $usuario->getFechaToken();
        $admin = $usuario->getAdmin();
        $statement->bind_param("isssisiii",$idPersona,$email,$pass,$username,$habilitado,$token,
            $fechaToken->getTimestamp(),$admin,$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function delete($id) {
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "DELETE FROM usuario WHERE id=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$id);
        $statement->execute();
        $statement->close();
        $mysqli->close();
    }

    public function getOneByEmail($email) {
        $usuario = null;
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, email, pass, username, habilitado, token, fecha_token, admin
                  FROM usuario WHERE email=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("s",$email);
        if($statement->execute()){
            $usuario = new Usuario();
            $statement->bind_result($id,$idPersona,$emails,$pass,$username,$habilitado,$token,$fecha_token,$admin);
            $statement->fetch();
            $usuario->setId($id);
            $usuario->setIdPersona($idPersona);
            $usuario->setEmail($emails);
            $usuario->setPass($pass);
            $usuario->setUsername($username);
            $usuario->setHabilitado($habilitado);
            $usuario->setToken($token);
            $usuario->setFechaToken($fecha_token);
            $usuario->setAdmin($admin);
        }
        $statement->close();
        $mysqli->close();
        return $usuario;
    }

    public function getOneByPersona($idPersona) {
        $usuario = null;
        $mysqli = new mysqli(Connection::DBHOST, Connection::DBUSERNAME, Connection::DBPASS, Connection::DBNAME);
        $query = "SELECT id, id_persona, email, pass, username, habilitado, token, fecha_token, admin
                  FROM usuario WHERE id_persona=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i",$idPersona);
        if($statement->execute()){
            $usuario = new Usuario();
            $statement->bind_result($id,$idPersonas,$email,$pass,$username,$habilitado,$token,$fecha_token,$admin);
            $statement->fetch();
            $usuario->setId($id);
            $usuario->setIdPersona($idPersonas);
            $usuario->setEmail($email);
            $usuario->setPass($pass);
            $usuario->setUsername($username);
            $usuario->setHabilitado($habilitado);
            $usuario->setToken($token);
            $usuario->setFechaToken($fecha_token);
            $usuario->setAdmin($admin);
        }
        $statement->close();
        $mysqli->close();
        return $usuario;
    }
}
