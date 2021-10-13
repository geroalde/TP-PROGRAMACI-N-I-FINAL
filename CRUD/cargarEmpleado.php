<?php
require_once '../RepositorioUsuario.php';
require_once "../Usuario.php";

session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();

if(isset($_POST['save_task'])) {
    $nombreEmpleado = $_POST['nombreempleado'];
    $edadEmpleado = $_POST['edadempleado'];
    $sueldoEmpleado = $_POST['sueldoempleado'];
    $numTelefonoEmpleado = $_POST['numtel'];
    $afiliado = $_POST['afiliado']; 
    if ($afiliado = "s") {  
        $afiliado = "Sí";
    } 
    else {
        $afiliado = "No";
    }
    $query = "INSERT INTO empleados(nombreEmpleado, edad, sueldo, numTel, afiliadoSindicato, idUsuarios) VALUES ('$nombreEmpleado', '$edadEmpleado', '$sueldoEmpleado', '$numTelefonoEmpleado', '$idUsuarioActual')";
    $consulta = mysqli_query(self::$connection, $query);
    if (!$consulta) {
        die("Ha ocurrido un error.");
        header('Location: home.php');
    }
    else {
        header('Location: home.php');
    }
}
