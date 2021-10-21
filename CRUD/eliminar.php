<?php

require_once '../RepositorioEmpleado.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $repositorio = new RepositorioEmpleado();
    $usuario = $repositorio->eliminarEmpleado($id);
}
header ('Location: ../home.php');
?>