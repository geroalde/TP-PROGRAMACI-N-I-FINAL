<?php
require_once 'Empleado.php';
require_once 'RepositorioUsuario.php';

class RepositorioEmpleado {

    public function cargarEmpleado($nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliacion, $idUsuarioActual) {
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "INSERT INTO empleados(nombreEmpleado, edad, sueldo, numTel, afiliadoSindicato, idUsuarios) VALUES ('$nombreEmpleado', '$edadEmpleado', '$sueldoEmpleado', '$numTel', '$afiliacion', '$idUsuarioActual')";
    $consulta = mysqli_query($usuario, $query);
    if (!$consulta) {
        die("Ha ocurrido un error.");
        header ('Location: ../home.php');
    }
    else {
        header('Location: ../home.php');
    }
    }

    public function mostrarEmpleados($idUsuarioActual) {
    
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();    
    $query = "SELECT * FROM empleados WHERE idUsuarios = $idUsuarioActual";
    $mostrar = mysqli_query($usuario, $query);
    return $mostrar;
    }

    public function eliminarEmpleado ($id) {
        $connect = new RepositorioUsuario();
        $usuario = $connect->getConnect();
        $query = "DELETE FROM empleados WHERE id = $id";
        $resultado = mysqli_query($usuario, $query);
        if (!$resultado) {
        die("Ha fallado.");
        header ('Location: home.php');
        }
        else {
            header ('Location: home.php');
        }
    }

    public function editarEmpleado($id) {
        $connect = new RepositorioUSuario();
        $usuario = $connect->getConnect();
        $query = "SELECT * FROM empleados WHERE id = $id";
        return mysqli_query($usuario, $query);
    }
    
    public function editarEmpleadoActualizar($id, $nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliado, $idUsuarioActual) {
    $afiliacion = new Empleado($nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliado, $idUsuarioActual);
    $afiliadoCompleto = $afiliacion->getAfiliado($afiliado);
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "UPDATE empleados SET nombreEmpleado = '$nombreEmpleado', edad = '$edadEmpleado', sueldo = '$sueldoEmpleado', numTel = '$numTel', afiliadoSindicato = '$afiliadoCompleto', idUsuarios = '$idUsuarioActual' WHERE id = $id";
    mysqli_query($usuario, $query);
    header ('Location: ../home.php');  
    }

    public function generarEdadMaxima() {
    $connect = new RepositorioUSuario();
    $usuario = $connect->getConnect();
    $query = "SELECT edad FROM empleados";
    $fechas = mysqli_query($usuario, $query);
    //tengo que convertir $fechas en un numero entero (edad)//
    $contador = 0;
    /*aca va el array con todas las edades*/
    foreach ($fechas as $cadaFecha) {
    }
    }
    public function contarEmpleados($idUsuarioActual) {
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "SELECT edad FROM empleados WHERE idUsuarios = $idUsuarioActual";
    $datos = mysqli_query($usuario, $query);
    $contador = 0;
    foreach ($datos as $cantidadEmpleados) {
    $contador = $contador + 1;
    }
    return $contador;
    }
    public function mayorSueldo($idUsuarioActual) {
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "SELECT sueldo FROM empleados WHERE idUsuarios = $idUsuarioActual";
    $sueldos = mysqli_query($usuario, $query);
    $contador = 0;
    foreach ($sueldos as $sueldoMayor) {
        if ($sueldoMayor['sueldo'] > $contador) {
            $contador = $sueldoMayor['sueldo'];
        }
    }
    /*var_dump($contador);*/
    return $contador . " pesos";
    }
    public function cantEmpleadosAfiliados($idUsuarioActual) {
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "SELECT afiliadoSindicato FROM empleados WHERE idUsuarios = $idUsuarioActual";
    $afiliados = mysqli_query($usuario, $query);
    $contador1 = 0;
    $contador2 = 0;
    $contador3 = 0;
    $prueba = "";
    foreach ($afiliados as $afiliadoSi) {
    if ($afiliadoSi['afiliadoSindicato'] == "Si") {
        $contador1 = $contador1 + 1;
    }
    else if ($afiliadoSi['afiliadoSindicato'] == "No") {
        $contador2 = $contador2 +1;
    }
    else {
        $contador3 = $contador3 + 1;
    }
    }
    return "Hay " .$contador1 . " empleados afiliados al sindicato. Hay " .$contador2 . " empleados que no están afiliados al sindicato. Por último, hay " .$contador3 . " sin especificar.";
    }
    public function promediosSueldos($idUsuarioActual) {
    $connect = new RepositorioUsuario();
    $usuario = $connect->getConnect();
    $query = "SELECT sueldo FROM empleados WHERE idUsuarios = $idUsuarioActual";
    $sueldosPromedio = mysqli_query($usuario, $query);
    $suma = 0;
    $contador = 0;
    foreach ($sueldosPromedio as $sueldosTotal) {
        $contador = $contador + 1;
        $suma = $suma + $sueldosTotal['sueldo'];
    }
    return $suma / $contador;
    }
}  