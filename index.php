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
        <a href="index.php" class="navbar-brand">Administrá tu emprendimiento</a>
</div>
</nav>
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
        <input name="contraseña" type="password" class="form-control form-control-lg" placeholder="Ingresá tu contraseña"><br>
        <input type="submit" value="Ingresar" class="btn btn-primary">
</form><br>
<p><a href="create.php">Crear nuevo usuario</a></p>
    </div>
</body>
</html>
<?php include ("Includes/footer.php"); ?>