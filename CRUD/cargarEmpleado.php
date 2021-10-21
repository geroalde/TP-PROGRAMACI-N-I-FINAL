<?php
require_once '../RepositorioEmpleado.php';

session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();

//hacer que no se pueda entrar poniendo el nombre del archivo arriba 

if(isset($_POST['save_task'])) {
    $nombreEmpleado = $_POST['nombreempleado'];
    $edadEmpleado = $_POST['edadempleado'];
    $sueldoEmpleado = $_POST['sueldoempleado'];
    $numTel = $_POST['numtel'];
    $afiliadoCompleto = $_POST['afiliado']; 

    $repositorio = new Empleado($nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliadoCompleto, $idUsuarioActual);
    $afiliacion = $repositorio->getAfiliado();
    $empleadoFinal = new RepositorioEmpleado();
    $usuario = $empleadoFinal->cargarEmpleado($nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliacion, $idUsuarioActual);
    return $usuario;
}

