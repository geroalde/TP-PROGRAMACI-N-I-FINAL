<?php 
require_once 'RepositorioEmpleado.php';
require_once 'RepositorioUsuario.php';
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
        <a href="home.php" class="navbar-brand">Informe útil</a>
</div>
</nav>

<?php 

session_start();
$usuario = unserialize($_SESSION['usuario']);
$idUsuarioActual = $usuario->getId();

$repositorio = new RepositorioEmpleado();
$cantidadEmpleados = $repositorio->contarEmpleados($idUsuarioActual);
$mayorSueldo = $repositorio->mayorSueldo($idUsuarioActual);
$cantEmpleadosAfiliados = $repositorio->cantEmpleadosAfiliados($idUsuarioActual);
$sueldoPromedio = $repositorio->promediosSueldos($idUsuarioActual);
/* $usuario = new RepositorioEmpleado();
$edadMaxima = $usuario->generarEdadMaxima();*/


?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
           <div class="card card-body">
                 <div class="form-group">
                 <p>Tienes <?php echo $cantidadEmpleados?> empleados a tu cargo</p>
                 </div>
                 <div class="form-group">
                 <p>El mayor sueldo de tu compañia es de: <?php echo $mayorSueldo;?> </p>
                 </div>
                 <div class="form-group"> 
                 <p><?php echo $cantEmpleadosAfiliados; ?></p>
                 </div>
                 <div class="form-group"> 
                 <p>Pagas en sueldos, en promedio, <?php echo $sueldoPromedio; ?> pesos.</p>
                 </div>
           </div>
        </div>
    </div>
</div>
<div class="text-center">
<p><a href= "home.php">Volver</a></p>
</div>
<?php include ('Includes/footer.php') ?>