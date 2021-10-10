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
        $q = "SELECT id, contraseña, nombre, apellido FROM usuarios";
        $q.= " WHERE usuario = ?";
        $query = self::$connection->prepare($q);
        $query->bind_param("s", $nombre_usuario);
        if ($query->execute()) {
            $query->bind_result($id, $contraseñaencript, $nombre, $apellido);
            if ($query->fetch()) {
                if (password_verify($contraseña, $contraseñaencript)) {
                    return new Usuario($nombre_usuario, $nombre, $apellido, $id);
                }
            }
        }
        return false;
    }
}
