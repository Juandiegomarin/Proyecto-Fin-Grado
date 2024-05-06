<?php
include("pages/funciones_constantes.php");
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
}
if (isset($_POST["btnContRegistrarse"])) {
    $datos = array();
    $datos["name"] = $_POST["usuario"];

    $response = consumir_servicios_REST(EXISTE_NOMBRE_USUARIO, METODO_POST, $datos);

    $error_usuario = false;
    if ($response == RESPONSE_EXIST) {
        $error_usuario = true;
    }

    $datos["clave"] = $_POST["clave"];
    $response = $_POST["clave"] != $_POST["clave2"];

    $error_clave = false;
    if ($response == 1) {
        $error_clave = true;
    }

    $response_email = validarEmail($_POST["email"]);
    $error_email = false;

    if ($response_email == 1) {
        $datos["email"] = $_POST["email"];
        $response_email = consumir_servicios_REST(EXISTE_EMAIL, METODO_POST, $datos);

        if ($response_email == "EXIST") {
            $error_email = true;
        }
    } else {
        $error_email = true;
    }

    $error_form = $error_usuario || $error_clave || $error_email;
    if (!$error_form) {
        $response = consumir_servicios_REST(INSERTAR, METODO_POST, $datos);
        if ($response == RESPONSE_OK) {
            header("Location:index.php");
            exit;
        }
    }
}

$page = $_GET["page"] ?? "home";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.cdnfonts.com/css/luckiest-guy" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/oswald-4" rel="stylesheet">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION["login"])) {
        include("pages/header.php");
        include("pages/".$page.".php");
    } else {
        if (isset($_POST["btnRegistrarse"]) || isset($_POST["btnContRegistrarse"])) {
            include("pages/register.php");
        } else {
            include("pages/login.php");
        }
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>