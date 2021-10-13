<?php
require_once 'Usuario.php';
require_once '.env.php'; 

class RepositorioUsuario {

    private static $connection = null;

    public function __construct() {
        if (is_null(self::$connection)) {
            $datos = datos();
            self::$connection = new mysqli ($datos['server'], $datos['usuario'], $datos['contraseña'], $datos['bbdd']);
            if(self::$connection->connect_error) {
                $error = 'Error de conexión. Pruebe nuevamente';
                self::$connection = null;
                die($error);
            }
            self::$connection->set_charset('utf8');
        }
    }
    public function login ($nombre_usuario, $contraseña) {
        $q = "SELECT id, contraseña, nombre, apellido, nomPyme FROM usuarios";
        $q.= " WHERE usuario = ?";
        $query = self::$connection->prepare($q);
        $query->bind_param("s", $nombre_usuario);
        if ($query->execute()) {
            $query->bind_result($id, $contraseñaencript, $nombre, $apellido, $nomPyme);
            if ($query->fetch()) {
                if (password_verify($contraseña, $contraseñaencript)) {
                    return new Usuario($nombre, $apellido, $nombre_usuario, $nomPyme, $id);
                }
            }
        }
        return false;
    }
    public function save($usuario, $contraseña) {
    $q = "INSERT INTO usuarios (usuario, nombre, apellido, contraseña, nomPyme)";
    $q.= "VALUES (?, ?, ?, ?, ?)";
    $query = self::$connection->prepare($q);
    $query->bind_param("sssss",$usuario->getNombreUsuario(), $usuario->getNombre(),
                               $usuario->getApellido(), 
                               password_hash($contraseña, PASSWORD_DEFAULT), 
                               $usuario->getNomPyme());
    if ($query->execute()){
        return self::$connection->insert_id;
    }
    else {
        return false;
    }
    }
}
