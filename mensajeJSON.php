 <?php 
 require_once 'RepositorioEmpleado.php';
 require_once 'RepositorioUsuario.php';
 require_once 'Usuario.php';

 session_start();
 $usuario = unserialize($_SESSION['usuario']);
 $idUsuarioActual = $usuario->getId();
 $nombreUsuario = $usuario->getNombreUsuario();
 $nombre = $usuario->getNombre();
 $apellido = $usuario->getApellido();
 $nomPyme = $usuario->getNomPyme();

?>

Tus datos son:
<table class="table table-bordered">
<thead>
<tr>
                <th>Tu usuario</th>
                <th>Tu nombre</th>
                <th>Tu apellido</th>
                <th>El nombre de tu pyme</th>
            </tr>
</thead> 
<tr>
                <td><?php echo $nombreUsuario?></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo $apellido ?></td>
                <td><?php echo $nomPyme ?></td>
</tr>
