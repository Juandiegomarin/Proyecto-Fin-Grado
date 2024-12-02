<?php

include("Global.php");

$page = $_GET["page"] ?? "home";

include("session.php");

if (isset($_POST["addProduct"])) {

    $id = $_POST["idProducto"];
    $unidades = $_POST["unidades"];
    $precio = $unidades * $_POST["precio"];
    $imagen = $_POST["imagen"];
    $stock =  $_POST["stock"];

    $producto_pedido = [];
    $producto_pedido["id"] = $id;
    $producto_pedido["unidades"] = $unidades;
    $producto_pedido["precio"] = $precio;
    $producto_pedido["imagen"] = $imagen;
    $producto_pedido["stock"] = $stock;

    $pos = buscarProductoId($id, $_SESSION["pedido"]);

    if ($pos < 0) {
        $_SESSION["pedido"][] = $producto_pedido;
    } else {
        $_SESSION["pedido"][$pos]["unidades"] += $unidades;
        $_SESSION["pedido"][$pos]["precio"] += $precio;
    }

    header("Location:index.php?page=productos");
    exit();
}

if (isset($_POST["btnModificar"])) {

    $id = $_POST["id"];

    $pos = buscarProductoId($id, $_SESSION["pedido"]);

    $unidades = $_POST["unidades"];
    $precio = $unidades * $_POST["precio"];

    $_SESSION["pedido"][$pos]["unidades"] = $unidades;
    $_SESSION["pedido"][$pos]["precio"] = $precio;

    header("Location:index.php?page=pedido");
    exit();
}

if (isset($_POST["btnEliminar"])) {

    $id = $_POST["id"];
    $pos = buscarProductoId($id, $_SESSION["pedido"]);

    unset($_SESSION["pedido"][$pos]);
    
    header("Location:index.php?page=pedido");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dieguichi Orderly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.cdnfonts.com/css/luckiest-guy" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/oswald-4" rel="stylesheet">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <?php

    include("pages/header.php");

    if (is_readable("pages/$page.php")) {
        include_once("pages/$page.php");
    } else {
        include_once("pages/home.php");
    }

    include("pages/footer.php");

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>