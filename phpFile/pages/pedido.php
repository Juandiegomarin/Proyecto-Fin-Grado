<?php

$carrito = json_decode(json_encode($_SESSION["pedido"]));

?>
<main id="carrito">


    <h1>Productos en el carrito</h1>

    <?php
    if (!empty($carrito)) {
    ?>
        <section>

            <?php
            foreach ($carrito as $item) {
            ?>

                <article>
                    <div class="article-unidades">
                        <span>Unidades: <?= $item->unidades ?></span>
                    </div>
                    <div class="article-imagen">
                        <img src="assets/products/<?= $item->imagen ?>" alt="">
                    </div>
                    <div class="article-precio">
                        <span>Precio: <?= $item->precio ?>€</span>
                    </div>
                    <div class="article-botones">
                        <form action="index.php" method="post">

                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <input type="hidden" name="unidades" value="<?= $item->unidades ?>">
                            <input type="hidden" name="precio" value="<?= $item->precio ?>">
                            <input type="hidden" name="imagen" value="<?= $item->imagen ?>">
                            <input type="hidden" name="stock" value="<?= $item->stock ?>">

                            <button type="button" class="btn-modificar">Modificar</button>
                            <button class="btn-eliminar" type="submit" name="btnEliminar">Eliminar</button>
                        </form>
                    </div>
                </article>

            <?php
            }
            ?>

        </section>
        <div id="modal-modificar">
            <form action="index.php" id="modal-modificar-contenido" method="post">
                <input type="hidden" name="stock" id="stock" value="">
                <input type="hidden" name="unidades" value="" id="unidades">
                <input type="hidden" name="precio" value="" id="precio">
                <input type="hidden" name="id" value="" id="id">
                <div id="close-modal">
                    <img src="assets/icons/x.svg" alt="close" id="close-modal-icon" class="pointer">
                </div>
                <img src="" alt="" id="imagen-product">
                <div id="product-units-units">
                    <button type="button" class="btn btn-success" id="add-product">+ 1</button>
                    <span id="units"></span>
                    <button type="button" class="btn btn-danger" id="remove-product">- 1</button>
                </div>
                <button type="submit" name="btnModificar">Modificar</button>
            </form>
        </div>

        <a href="index.php?page=pago">Continuar con el pago</a>
        <form action="index.php" method="post">
            <button type="submit" class="btn btn-danger" name="btnVaciarPedido">Vaciar carrito</button>
        </form>

    <?php
    } else {
    ?>

    <p>No hay productos en el pedido</p>
    
    <?php
    }
    ?>

</main>

<script>
    $(document).ready(function() {

        $(".btn-modificar").on("click", function(e) {
            let id = $(this).closest('form').find('input[name="id"]').val();
            let unidades = $(this).closest('form').find('input[name="unidades"]').val();
            let precio = $(this).closest('form').find('input[name="precio"]').val();
            let imagen = $(this).closest('form').find('input[name="imagen"]').val();
            let stock = $(this).closest('form').find('input[name="stock"]').val();

            let elementModal = $("#modal-modificar")

            let inputId = elementModal.find("#id");
            inputId.val(id);

            let inputUnidades = elementModal.find("#units");
            inputUnidades.html(unidades);

            let inputImagen = elementModal.find("#imagen-product");
            inputImagen.attr("src", "assets/products/" + imagen)

            let inputStock = elementModal.find("#stock");
            inputStock.val(stock)

            let precioUnitario = precio / unidades;
            let inputPrecio = elementModal.find("#precio");
            inputPrecio.val(precioUnitario)

            elementModal.css("display", "flex")

        })

        $("#close-modal-icon").on("click", function() {
            $(this).parents("#modal-modificar").css("display", "none");
        })


        var units = document.getElementById("units")
        var unidadesInput = $('#unidades')


        $("#add-product").on("click", function() {
            let productStock = $("#stock").val()
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

    })
</script>