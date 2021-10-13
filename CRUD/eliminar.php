<? include ("RepositorioUsuario.php"); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM empleados WHERE id = $id";
    $resultado = mysqli_query(self::$connection, $query);
    if (!$resultado) {
        die("Ha fallado.");
    }
    header ('Location: home.php');
}

?>