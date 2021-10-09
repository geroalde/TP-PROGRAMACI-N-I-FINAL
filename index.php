<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body> 
    <div class="jumbotron text-center">
        <h1>Bienvenido, emprendedor 👋</h1>
    </div>
    <div class = "text-center">
    <h3>Ingresá a tu cuenta</h3>
    <?php
    if (isset($_GET['mensaje'])) {
        echo '<div id="mensaje" class="alert alert-primary text-center"> <p>' . $_GET['mensaje'] . '</p></div>';
    }
    ?>
    <form action="login.php" method=post>
        <input name="usuario" class="form-control form-control-lg" placeholder="Ingresá tu usuario"><br>
        <input name="contraseña" type="text" class="form-control form-control-lg" placeholder="Ingresá tu contraseña"><br>
        <input type="submit" value="Ingresar" class="btn btn-primary">
</form><br>
<p><a href="create.php">Crear nuevo usuario</a></p>
    </div>
</body>
</html>
