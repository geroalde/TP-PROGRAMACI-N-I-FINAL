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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport content" width=device-width">
        <title>Crear usuario</title>
        <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body class="container">
<div class="jumbotron text-center">
    <h1>Bienvenido, emprendedor 👋</h1>
</div>
<div class="text center">
<h3>Crear usuario</h3>
<?php
if (isset($_GET['mensaje'])) {
echo '<div id="mensaje" class="alert alert-primary text-center"> <p>' .$_GET['mensaje'].'</p></div>';
} ?>
<form action="create.php" method="post">
    <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
    <input name="contraseña" class="form-control form-control-lg" placeholder="Contraseña"><br>
    <input name="nombre" class="form-control form-control-lg" placeholder="Nombre"><br>
    <input name="apellido" class="form-control form-control-lg" placeholder="Apellido"><br>
    <input name="nomPyme" class="form-control form-control-lg" placeholder="Nombre de tu emprendimiento"><br>
    <input type="submit" value="Registrarse" class="btn btn-primary">
</form>
</html>