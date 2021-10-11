<?php
class Usuario {

    protected $id;
    protected $nombre;
    protected $apellido;
    protected $nombre_usuario;
    protected $nomPyme;
    
    public function __construct($nombre, $apellido, $nombre_usuario, $nomPyme, $id = null) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->nombre_usuario = $nombre_usuario;
    $this->nomPyme = $nomPyme;
}
    public function getId() {
        return $this->id;
    } 
    public function setId($id) {
        $this->id = $id;
    }
    public function getNombreUsuario() {
        return $this->nombre_usuario;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getNombreApellido() {
        return "$this->nombre $this->apellido";
    }
    public function getNomPyme() {
        return $nomPyme;
    }
}
