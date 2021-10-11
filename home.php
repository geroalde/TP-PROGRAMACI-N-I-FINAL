<?php include("RepositorioUsuario.php")?>
<?php
require_once 'Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
    $nomPym = $usuario->getNomPyme();
}
else {
    header ('Location: index.php');
}
?>

<?php include("Includes/header.php")?>

<div class="jumbotron text-center">
    <h1><?=$nomPym;?></h1>
</div>
<div class="container p-4">
    <div class="col-md-4">
        <div class="card card-body">
            <form action="CRUD/cargarEmpleado.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nombreempleado" class="form-control"
                    placeholder="Nombre de tu empleado" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="edadempleado" rows="2" class="form-control"
                    placeholder="Edad del empleado">
                </div>
                <div class="form-group">
                    <input type="text" name="sueldoempleado" rows="2" class="form-control"
                    placeholder="Sueldo del empleado">
                </div>
                <div class="form-group">
                    <input type="text" name="numtel" rows="2" class="form-control"
                    placeholder="Número de teléfono del empleado">
                </div>
                <div class="form-group">
                <p>¿Su empleado está afiliado a un sindicato?</p>
                    <input type="radio" name="afiliado" rows="2" class="form-control"
                    value="s">Sí
                    <input type="radio" name="afiliado" rows="2" class="form-control"
                    value="n">No
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar datos">
            </form>
        </div>
</div>

<div class="col-md-8">

</div>

</div>

<div class="text-center">
<p><a href= "logout.php">Cerrar sesión</a></p>
</div>

<?php include("Includes/footer.php")?>