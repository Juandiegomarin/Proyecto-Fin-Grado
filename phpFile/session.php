<?php

if (!isset($_SESSION["pedido"])) {
    $_SESSION["pedido"] = [];
}

if (isset($_POST["btnLogout"])) {
    session_destroy();
    header("Location:index.php");
    exit;
}

if (isset($_POST["btnLogin"])) {

    $datos["nombre"] = $_POST["userL"];
    $datos["clave"] = $_POST["password"];

    $response = consumir_servicios_REST(COMPROBAR_USUARIO_LOGUEADO, METODO_POST, $datos);

    if ($response == RESPONSE_EXIST) {

        $nombre = urlencode($_POST["userL"]);

        $usuario = json_decode(consumir_servicios_REST(OBTENER_DATOS_USUARIO . "/$nombre", METODO_GET));

        $_SESSION["nombre_usuario"] = $usuario->nombreUsuario;
        $_SESSION["email"] = $usuario->email;
        $_SESSION["login"] = true;
        $page = "home";
    } else {
        $error_logueo = true;
    }
}

if (isset($_POST["btnRegistrarse"])) {
    $page = "registro";
}

if (isset($_POST["btnContRegistrarse"])) {

    $page = "registro";
    $datos = [];

    $datos["nombre"] = $_POST["user"];
    $datos["email"] = $_POST["email"];
    $datos["clave"] = $_POST["password"];
    $datos["clave_verificada"] = $_POST["password2"];

    $obj = consumir_servicios_REST(COMPROBAR_REGISTRO, METODO_POST, $datos);

    $response = json_decode($obj);

    $valid_user = in_array(RESPONSE_OK, $response);

    if ($valid_user) {

        $response = consumir_servicios_REST(INSERTAR, METODO_POST, $datos);

        if ($response == RESPONSE_OK) {
            $page = "login";
        }
    } else {
        foreach ($response as $res) {

            match ($res) {
                RESPONSE_EXIST => $error_user = true,
                RESPONSE_INVALID_EMAIL, RESPONSE_EMAIL_REPEATED => $error_email = $res,
                RESPONSE_WRONG_PASSWORD => $error_password = true
            };
        }
    }
}

if ((!isset($_SESSION["login"]) || !$_SESSION["login"]) && pageNeedLogin($page)) {
    $page = "login";
}
