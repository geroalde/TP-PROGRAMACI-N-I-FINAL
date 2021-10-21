<?php
require_once 'controlarInicioSesion.php';

if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $controlarSesion = new ControladorSesion();
    $resultado = $controlarSesion->create($_POST['usuario'], $_POST['contraseña'], $_POST['nombre'], $_POST['apellido'], $_POST['nomPyme']);
    if ($resultado[0] === true) {
        $redirigir = 'home.php?mensaje='.$resultado[1];
    }
    else {
        $redirigir = 'create.php?mensaje='.$resultado[1];
    }
    header('Location: '.$redirigir);
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
        <a href="create.php" class="navbar-brand">Creación de cuenta</a>
</div>
</nav>
<?php
if (isset($_GET['mensaje'])) {
echo '<div id="mensaje" class="alert alert-primary text-center"> <p>' .$_GET['mensaje'].'</p></div>';
} ?>
<form action="create.php" method="post">
    <br>
    <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
    <input name="contraseña" class="form-control form-control-lg" placeholder="Contraseña"><br>
    <input name="nombre" class="form-control form-control-lg" placeholder="Nombre"><br>
    <input name="apellido" class="form-control form-control-lg" placeholder="Apellido"><br>
    <input name="nomPyme" class="form-control form-control-lg" placeholder="Nombre de tu emprendimiento"><br>
    <input type="submit" value="Registrarse" class="btn btn-primary">
</form>
</html>
<?php
include ('Includes/footer.php');