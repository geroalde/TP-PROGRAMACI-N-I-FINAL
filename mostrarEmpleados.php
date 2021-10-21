<?php
require_once '../RepositorioEmpleado.php';
session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();

