<?php include("RepositorioUsuario.php");?>
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

<?php include("Includes/header.php");?>

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
                </div> <br>
                <div class="form-group">
                    <input type="text" name="edadempleado" rows="2" class="form-control"
                    placeholder="Edad del empleado">
                </div> <br>
                <div class="form-group">
                    <input type="text" name="sueldoempleado" rows="2" class="form-control"
                    placeholder="Sueldo del empleado">
                </div> <br>
                <div class="form-group">
                    <input type="text" name="numtel" rows="2" class="form-control"
                    placeholder="Número de teléfono del empleado">
                </div>
                <div class="form-group">
                <p>¿Su empleado está afiliado al sindicato?</p>
                    <input type="radio" name="afiliado" rows="2" value="s" checked>Sí<br>
                    <input type="radio" name="afiliado" rows="2" value="n">No
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar datos">
            </form>
        </div>
</div>

<div class="col-md-8">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre del empleado</th>
                <th>Edad del empleado</th>
                <th>Sueldo del empleado</th>
                <th>Número de teléfono</th>
                <th>¿Está afiliado al sindicato?</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            <?php
            $query = "SELECT * FROM empleados";
            $mostrar = mysqli_query(self::$connection, $query);

            while($row = mysqli_fetch_array($mostrar)) {  ?>
            <tr>
                <td><?php echo $row['nombreempleado'] ?></td>
                <td><?php echo $row['edadempleado'] ?></td>
                <td><?php echo $row['sueldoempleado'] ?></td>
                <td><?php echo $row['numtel'] ?></td>
                <td><?php echo $row['afiliado'] ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-maker"></i></a>
                    <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-all"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</div>

<div class="text-center">
<p><a href= "logout.php">Cerrar sesión</a></p>
</div>

<?php include("Includes/footer.php");?>