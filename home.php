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
                    <input type="radio" name="afiliado" rows="2" value="s" checked> Sí<br><br>
                    <input type="radio" name="afiliado" rows="2" value="n"> No
                    <br>
                    <br>
                    <input type="radio" name="afiliado" rows="2" value="ns"> Sin especificar
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
            $repo = new RepositorioUsuario();
            $usuario = $repo->cargarEmpleado();
            $query = "SELECT * FROM empleados";
            $mostrar = mysqli_query($usuario, $query);

            while($row = mysqli_fetch_array($mostrar)) {  ?>
            <tr>
                <td><?php echo $row['nombreEmpleado'] ?></td>
                <td><?php echo $row['edad'] ?></td>
                <td><?php echo $row['sueldo'] ?></td>
                <td><?php echo $row['numTel'] ?></td>
                <td><?php echo $row['afiliadoSindicato'] ?></td>
                <td>
                    <a href="CRUD/editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-maker"></i>Editar</a> <br>
                    <a href="CRUD/eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-all">Eliminar</i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</div>

<div class="text-center">
        <h1>Lista de tareas pendientes para <?php echo $nomPym;?></h1>
        <h2>Tienes pendientes estas <spand id="cantidad"><script>""</script></spand>tareas:</h2>
</div>
    <ol id="lista">
        <li class="elemento"></li>

    </ol>
    <hr>
    <label for="agregar">Agregar tarea:</label>
    <input type="text" id="agregar" name="agregar">
    <button type="button" id="btn-agregar">Agregar</button>
    <br>
    <label for="eliminar">Eliminar tarea número:</label>
    <input type="number" name="eliminar" id="eliminar">
    <button type="button" id="btn-eliminar">Eliminar</button>
<script>
    document.querySelector('#btn-agregar').addEventListener('click',agregar);

    function agregar()
{
    var lista = document.querySelector('#lista');
    var nuevoElemento = document.createElement('li');
    nuevoElemento.classList.add('elemento');
    nuevoElemento.innerHTML = document.querySelector('#agregar').value;
    lista.appendChild(nuevoElemento);
    verificarCantidad();

    document.querySelector('#agregar').value = '';
}

function verificarCantidad()
{
    var cantidad = document.querySelectorAll('#lista .elemento').length;
    document.querySelector('#cantidad').innerHTML = cantidad;
}

</script>
<div class="text-center">
<p><a href= "logout.php">Cerrar sesión</a></p>
</div>

<?php include("Includes/footer.php");?>