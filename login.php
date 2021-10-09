<?php
require_once 'controlarInicioSesion.php';

if(! isset($_POST['usuario']) || ! isset($_POST['contraseña'] )) {
    $redirigir = 'index.php?mensaje=Error: debe completar todos los campos';
}
else {
    $controlarSesion = new ControladorSesion();
    $login = $controlarSesion->login($_POST['usuario'], $_POST['contraseña']);
    if ($login[0]) === true) {
        $redirigir = 'home.php';
    }
    else {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header ('Localizado en: ' .$redirigir);
