<?php
include ("RepositorioUsuario.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM empleados WHERE id = $id";
    $resultado = mysqli_query(self::$connection, $query);
    if (mysli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $nombreEmpleado = $row['nombreempleado'];
        $edadEmpleado = $row['edadempleado'];
        $sueldoEmpleado = $row['sueldoempleado'];
        $numTel = $row['numtel'];
        $afiliado = $row['afiliado'];
    }

}
if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $nombreEmpleado = $_POST['nombreempleado'];
    $edadEmpleado = $_POST['edadempleado'];
    $sueldoEmpleado = $_POST['sueldoempleado'];
    $numTel = $_POST['numtel'];
    $afiliado = $_POST['afiliadoS'];
    if ($afiliado = "s") {
        $afiliado = "Sí";
    }
    else {
        $afiliado = "No";
    }
    $query = "UPDATE empleados SET nombreEmpleado = '$nombreEmpleado', edad = '$edadEmpleado', sueldo = '$sueldoEmpleado', numTel = '$numTel', afiliadoSidicato = '$afiliado' WHERE id = $id";
    mysqli_query(self::$connection, $query);
    header("Location: home.php");
}
?>

<?php include("Includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
           <div class="card card-body">
             <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                 <div class="form-group">
                     <input type="text" name="nombreempleado" value="<?php echo $nombreEmpleado;?>" class="form-control" placeholder="Actualiza el nombre de tu empleado">
                 </div>
                 <div class="form-group">
                 <input type="text" name="edadempleado" value="<?php echo $edadEmpleado;?>" class="form-control" placeholder="Actualiza la edad de tu empleado">
                 </div>
                 <div class="form-group">
                 <input type="text" name="sueldoempleado" value="<?php echo $sueldoEmpleado;?>" class="form-control" placeholder="Actualiza el sueldo de tu empleado">
                 </div>
                 <div class="form-group"> 
                 <input type="text" name="numtel" value="<?php echo $numTel;?>" class="form-control" placeholder="Actualiza el número de tu empleado">
                 </div>
                 <div class="form-group">
                 <p>¿Tu empleado se encuentra afiliado al sindicato?</p>
                 <label><input type="radio" name="afiliadoS" value="s" class="form-control">Sí</label>
                 <label><input type="radio" name="afiliadoS" value="n" class="form-control">No</label>
                 </div>
                 <button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
             </form>
           </div>
        </div>
    </div>
</div>

<?php include("Includes/footer.php");?>
