<?php

require_once 'RepositorioUsuario.php';
require_once 'RepositorioEmpleado.php';

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
    $nomPym = $usuario->getNomPyme();
    $idUsuarioActual = $usuario->getId();
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
                    placeholder="Nombre y apellido del empleado " autofocus>
                </div> <br>
                <div class="form-group">
                    <input type="date" name="edadempleado" rows="2" class="form-control"
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
                <br>
                <div class="form-group">
                <p>¿Su empleado está afiliado al sindicato?</p>
                    <input type="radio" name="afiliado" rows="2" value="s" checked> Sí <br> <br>
                    <input type="radio" name="afiliado" rows="2" value="n"> No
                    <br>
                    <br>
                    <input type="radio" name="afiliado" rows="2" value="ns"> Sin especificar
                </div>
                <br>
                <div class= "text-center">
                    <div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar datos" id="Guardar">
                    </div>
                </div>
            </form>
        </div>
</div>


<div class="col-md-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre completo del empleado</th>
                <th>Fecha de nacimiento del empleado</th>
                <th>Sueldo del empleado</th>
                <th>Número de teléfono</th>
                <th>¿Está afiliado al sindicato?</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            <?php
           $user = new RepositorioEmpleado();
           $mostrar = $user->mostrarEmpleados($idUsuarioActual);
            while($row = mysqli_fetch_array($mostrar)) {  ?>
            <tr>
                <td><?php echo $row['nombreEmpleado'] ?></td>
                <td><?php echo $row['edad'] ?></td>
                <td><?php echo $row['sueldo'] ?></td>
                <td><?php echo $row['numTel'] ?></td>
                <td><?php echo $row['afiliadoSindicato'] ?></td>
                <td>
                    <div>
                    <a href="CRUD/editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary" value="Editar datos">Editar</a>
                    </div>
                    <div>
                    <a href="CRUD/eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger" value="Eliminar datos">Eliminar</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</div>

<script>

function devolverMensaje() {
    var parrafoNuevo;
    var solicitudMensaje = new XMLHttpRequest();
    solicitudMensaje.onreadystatechange = function(){
        if (solicitudMensaje.readyState == 4 && solicitudMensaje.status == 200) {
            document.querySelector('#mensaje_guardado').innerHTML = solicitudMensaje.responseText;
        }
    }
    solicitudMensaje.open("GET", "mensajeJSON.php", true);
    solicitudMensaje.send();
}
</script>
<br><br><div class="text-center">
<a href="generarInforme.php" class="btn btn-dark" value="Eliminar datos">Generar informe</a>
</div>
<br>
<div class ="text-center" id="colocar_aca">
<button onclick ="devolverMensaje()">Datos de usuario</button>
            </div>
<br>
<div class="text-center" id="mensaje_guardado">
</div>
<div class="text-center">
<p><a href= "logout.php">Cerrar sesión</a></p>
</div>
<?php include("Includes/footer.php");
?>

