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
 }