<?php
require_once 'Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
}
else {
    header ('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body class= "container">
<div class="jumbotron text-center">
    <h1>-aca pondria el nombre de la pyme-</h1>
</div>
<div class="text-center">
    <h3> ver si puedo hacer algo como tirando unos consejos aleatorios </h3>
    <p><a href= "logout.php">Cerrar sesión</a></p>
</div>
</body>
</html>