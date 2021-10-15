<?php
require_once '../RepositorioUsuario.php';

session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();


//hacer que no se pueda entrar poniendo el nombre del archivo arriba 

if(isset($_POST['save_task'])) {
    $nombreEmpleado = $_POST['nombreempleado'];
    $edadEmpleado = $_POST['edadempleado'];
    $sueldoEmpleado = $_POST['sueldoempleado'];
    $numTelefonoEmpleado = $_POST['numtel'];
    $afiliado = $_POST['afiliado']; 
    if ($afiliado = "s") {  
        $afiliado = "Sí";
    } 
    else if ($afiliado = "n") {
        $afiliado = "No";
    }
    else {
        $afiliado = "Sin especificar";
    }
    $repo = new RepositorioUsuario();
    $usuario = $repo->cargarEmpleado();
    $query = "INSERT INTO empleados(nombreEmpleado, edad, sueldo, numTel, afiliadoSindicato, idUsuarios) VALUES ('$nombreEmpleado', '$edadEmpleado', '$sueldoEmpleado', '$numTelefonoEmpleado', '$afiliado', '$idUsuarioActual')";
    $consulta = mysqli_query(self::$connection, $query);
    if (!$consulta) {
        die("Ha ocurrido un error.");
        header('Location: home.php');
    }
    else {
        header('Location: home.php');
    }
}