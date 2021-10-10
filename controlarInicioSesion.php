<?php
require_once 'Usuario.php';
require_once 'RepositorioUsuario.php';

class ControladorSesion {
    protected $usuario = null;

    public function login($nombre_usuario, $contraseña) 
    {
        $repositorio = new RepositorioUsuario();
        $usuario = $repositorio->login($nombre_usuario, $contraseña);
        if ($usuario === false) {
            return [false, "Error al iniciar sesión"];
        }
        else {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Se ha iniciado sesión con éxito"];
        }
    } 
    public function create ($nombre_usuario, $nombre, $apellido, $contraseña) {
    $repositorio = new RepositorioUsuario();
    $usuario = new Usuario($nombre_usuario, $nombre, $apellido);
    $id = $repositorio->save($usuario, $contraseña);
    if ($id === false) {
        return [false, "Error al registrarse. Intentelo de nuevo."];
    }
    else {
        $usuario->setId($id);
        session_start();
        $_SESSION['usuario'] = serialize($usuario);
        return [true, "La cuenta ha sido creada con éxito"];
        }
    }
}