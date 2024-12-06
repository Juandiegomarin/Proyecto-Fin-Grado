<?php

if (!isset($_SESSION["pedido"])) {
    $_SESSION["pedido"] = [];
}

if (isset($_POST["btnSalir"])) {
    session_destroy();
    header("Location:index.php");
    exit;
}

if (isset($_POST["btnLogin"])) {

    $datos["nombre"] = $_POST["userL"];
    $datos["clave"] = $_POST["password"];

    $response = consumir_servicios_REST(COMPROBAR_USUARIO_LOGUEADO, METODO_POST, $datos);

    if ($response == RESPONSE_EXIST) {

        $_SESSION["login"] = true;
        $_SESSION["nombre_usuario"] = $_POST["userL"];
        $page = "home";
    } else {
        $error_logueo = true;
    }
}

if (isset($_POST["btnRegistrarse"])) {
    $page = "register";
}

if (isset($_POST["btnContRegistrarse"])) {

    $page = "register";
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

if ((!isset($_SESSION["login"]) || !$_SESSION["login"]) && $page != "contact" && $page != "register") {
    $page = "login";
}
