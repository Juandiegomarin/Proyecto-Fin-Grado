<?php

//Añadir producto al carrito, si existe sumar las unidades y el precio
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

//Modificar unidades y precio de un producto en el carrito
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

//Eliminar producto del carrito y reordenar el carrito

if (isset($_POST["btnEliminar"])) {

    $id = $_POST["id"];
    $pos = buscarProductoId($id, $_SESSION["pedido"]);


    unset($_SESSION["pedido"][$pos]);
    $_SESSION["pedido"] = array_values($_SESSION["pedido"]);

    header("Location:index.php?page=pedido");
    exit();
}

//Control errores formulario de pago y si no hay error insertar el pedido en la bd
if (isset($_POST["btnConfirmarPago"])) {

    $numero_tarjeta = $_POST["card"];
    $cvv = $_POST["cvv"];
    $month = $_POST["month"];

    $error_card = strlen($numero_tarjeta) < 19;
    $error_cvv = strlen($cvv) < 3;

    $error_month = intval($month) < intval(date("m"));

    $error_form = $error_card || $error_cvv || $error_month;

    if (!$error_form) {

        $producto_pedido = filtrar_pedido($_SESSION["pedido"]);
        $response = consumir_servicios_REST(INSERTAR_PEDIDO, METODO_POST, $producto_pedido);

        if ($response == RESPONSE_OK) {
            unset($_SESSION["pedido"]);
        }
        header("Location:index.php?page=pago&response=" . $response);
        exit;
    } else {
        $page = "pago";
    }
}

//Vaciar el carrito completo
if (isset($_POST["btnVaciarPedido"])) {
    unset($_SESSION["pedido"]);
    header("Location:index.php?page=pedido");
    exit();
}
