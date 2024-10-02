<?php

if (isset($_POST["btnSalir"])) {
    session_destroy();
    header("Location:index.php");
    exit;
}

if (isset($_POST["btnLogin"])) {

    $datos["name"] = $_POST["usuarioL"];
    $datos["clave"] = $_POST["clave"];

    $response = consumir_servicios_REST(COMPROBAR_USUARIO_LOGUEADO, METODO_POST, $datos);

    

    if ($response == RESPONSE_EXIST) {

        $_SESSION["login"] = true;
        header("Location:index.php");
        exit;
    } else {
        $error_logueo = true;
    }

} elseif (isset($_POST["btnContRegistrarse"])) {

    $datos = [];

    $datos["name"] = $_POST["usuario"];
    $datos["email"] = $_POST["email"];
    $datos["password"] = $_POST["clave"];
    $datos["verified_password"] = $_POST["clave2"];

    $response = consumir_servicios_REST(COMPROBAR_REGISTRO, METODO_POST, $datos);

    $error_form = $error_usuario || $error_clave || $error_email;

    if (!$error_form) {

        $response = consumir_servicios_REST(INSERTAR, METODO_POST, $datos);
        
        if ($response == RESPONSE_OK) {
            header("Location:index.php");
            exit;
        }
    }
}
