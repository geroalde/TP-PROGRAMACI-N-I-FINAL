<?php

require_once '../RepositorioEmpleado.php';

session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $repositorio = new RepositorioEmpleado();
    $resultado = $repositorio->editarEmpleado($id);
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $nombreEmpleado = $row['nombreEmpleado'];
        $edadEmpleado = $row['edad'];
        $sueldoEmpleado = $row['sueldo'];
        $numTel = $row['numTel'];
    }

}
if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $nombreEmpleado = $_POST['nombreempleado'];
    $edadEmpleado = $_POST['edadempleado'];
    $sueldoEmpleado = $_POST['sueldoempleado'];
    $numTel = $_POST['numtel'];
    $afiliado = $_POST['afiliadoS'];

    $repositorio = new RepositorioEmpleado();
    $usuario = $repositorio->editarEmpleadoActualizar($id, $nombreEmpleado, $edadEmpleado, $sueldoEmpleado, $numTel, $afiliado, $idUsuarioActual); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galderette INC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/34d8fc2c68.js" crossorigin="anonymous"></script>
</head>
<body class= "container">
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="../home.php" class="navbar-brand">Administrá tu emprendimiento</a>
</div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
           <div class="card card-body">
             <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                 <div class="form-group">
                     <input type="text" name="nombreempleado" value="<?php echo $nombreEmpleado;?>" class="form-control" placeholder="Actualiza el nombre de tu empleado"><br>
                 </div>
                 <div class="form-group">
                 <input type="date" name="edadempleado" value="<?php echo $edadEmpleado;?>" class="form-control" placeholder="Actualiza la edad de tu empleado"><br>
                 </div>
                 <div class="form-group">
                 <input type="text" name="sueldoempleado" value="<?php echo $sueldoEmpleado;?>" class="form-control" placeholder="Actualiza el sueldo de tu empleado"><br>
                 </div>
                 <div class="form-group"> 
                 <input type="text" name="numtel" value="<?php echo $numTel;?>" class="form-control" placeholder="Actualiza el número de tu empleado"><br>
                 </div>
                 <div class="form-group">
                     <br>
                 <p>¿Tu empleado se encuentra afiliado al sindicato?</p>
                 <label><input type="radio" name="afiliadoS" value="s" checked> Sí</label> <br>
                 <label><input type="radio" name="afiliadoS" value="n" > No</label>
                 </div>
                 <div class="text-center"><button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
                </div>
             </form>
           </div>
        </div>
    </div>
</div>

<?php 
require_once '../Includes/footer.php';
?>
