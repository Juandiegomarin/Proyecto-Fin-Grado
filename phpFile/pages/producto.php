<?php

$slug = $_GET["producto"] ?? "paella-de-marisco";
$product = json_decode(consumir_servicios_REST(OBTENER_PRODUCTO . "/" . $slug, METODO_GET));

if (isset($product->status)) {
    $product = json_decode(consumir_servicios_REST(OBTENER_PRODUCTO . "/paella-de-marisco", METODO_GET));
}
$has_stock = true;
if ($product->unidades == 0) {
    $has_stock = false;
}
$alergenos = json_decode(consumir_servicios_REST(OBTENER_ALERGENOS, METODO_GET));

$product_alergenos = array_column($product->alergenos, "idAlergeno");

if (!$has_stock) {
?>
    <script>
        setTimeout(function() {
            window.location.href = "index.php?page=productos";
        }, 0);
    </script>
<?php
}
?>


<main id="product-container">
    <div id="product">
        <div id="product-imagen">
            <img src="assets/products/<?= $product->imagen ?>" alt="<?= $product->nombre ?>">
            <span><?= $product->nombre ?></span>
            <form action="index.php" method="post" id="product-form">
                <input type="hidden" name="idProducto" value="<?= $product->idProducto ?>">
                <input type="hidden" name="unidades" value="1" id="unidades">
                <input type="hidden" name="precio" value="<?= $product->precio ?>">
                <input type="hidden" name="imagen" value="<?= $product->imagen ?>">
                <div id="product-units">
                    <div id="product-units-text">
                        <p>Unidades:</p>
                    </div>
                    <div id="product-units-units">
                        <input type="hidden" name="stock" value="<?= $product->unidades ?>" id="stock">
                        <button type="button" class="btn btn-success" id="add-product">+ 1</button>

                        <?php
                        if (buscarProductoId($product->idProducto, $_SESSION["pedido"]) >= 0) {

                            $pos = buscarProductoId($product->idProducto, $_SESSION["pedido"]);
                            $prod = $_SESSION["pedido"][$pos];
                        ?>

                            <span id="units"><?= $prod["unidades"] ?></span>

                        <?php
                        } else {
                        ?>

                            <span id="units">1</span>

                        <?php
                        }
                        ?>

                        <button type="button" class="btn btn-danger" id="remove-product">- 1</button>
                    </div>
                </div>
                <span>Precio: <?= number_format($product->precio, 2) ?>€</span>
                <button type="submit" name="addProduct">+Añadir al Pedido</button>
            </form>
        </div>
        <div id="product-descripcion">
            <?= $product->descripcion ?>
        </div>
    </div>
    <form action="index.php">
    </form>
    <h1>Información Nutricional</h1>
    <h4>Información sobre alérgenos</h4>
    <div id="alergenos">

        <h5>Este producto contiene:</h5>
        <p><strong>*Los alérgenos contenidos o que puede contener este producto aparecen marcados en color.</strong></p>
        <ul>

            <?php
            foreach ($alergenos as $alergen) {
                $active = (in_array($alergen->idAlergeno, $product_alergenos));
                $imagen = $active ? $alergen->imagen . "_active" : $alergen->imagen;

            ?>

                <li class="<?= $active ? "active-alergen" : "" ?>"><img src="assets/allergen_icons/<?= $imagen ?>.svg" alt="<?= $alergen->nombre ?>"><span><?= $alergen->nombre ?> <?php if ($active) { ?><img src="assets/allergen_icons/active.svg" alt="active" class="active-icon"><?php } ?></span></li>

            <?php
            }
            ?>

        </ul>
    </div>
</main>
<script>
    $(document).ready(function() {

        var units = document.getElementById("units")
        var unidadesInput = $('#unidades')
        var productStock = document.getElementById("stock").value

        $("#add-product").on("click", function() {

            let unidades = Number(units.innerHTML);
            if (unidades < productStock) {
                units.innerHTML = unidades + 1;
                unidadesInput.val(unidades + 1)
            }

        })

        $("#remove-product").on("click", function() {
            let unidades = Number(units.innerHTML);
            if (unidades > 1) {
                units.innerHTML = unidades - 1;
                unidadesInput.val(unidades - 1)
            }

        })

    });
</script>