<?php

$nombre = urlencode($_SESSION["nombre_usuario"]);

$pedidos = json_decode(consumir_servicios_REST(OBTENER_PEDIDOS_USUARIO . "/$nombre", METODO_GET));

?>

<main id="pedidos">

    <h1>Mis Ultimos pedidos</h1>

    <?php
    if (!empty($pedidos)) {
    ?>

        <section>
            <?php
            foreach ($pedidos as $pedido) {
                $formatted_date = date("d/m/y H:i", strtotime($pedido->fechaPedido));
            ?>

                <article class="pedido-info">
                    <div class="cabecera">
                        <div>
                            <p><strong>Numero Pedido:</strong></p>
                            <p><?= $pedido->idPedido ?></p>
                        </div>
                        <div>
                            <p><strong>Numero Pedido:</strong></p>
                            <p><?= $formatted_date ?></p>
                        </div>
                        <div>
                            <p><strong>Total:</strong></p>
                            <p><?= $pedido->total ?> €</p>
                        </div>
                        <div class="chevron">
                            <img src="assets/icons/chevron-down.svg" alt="" class="slide-icon pointer">
                        </div>
                    </div>
                    <div class="list-pedidos">

                        <?php
                        foreach ($pedido->pedidoProducto as $producto) {
                        ?>
                            <div class="unique-producto">
                                <div class="unique-producto-imagen">
                                    <img src="assets/products/<?= $producto->producto->imagen ?>" alt="">
                                </div>
                                <div class="unique-producto-unidades">
                                    <span>Unidades: <?= $producto->unidades ?></span>
                                </div>
                                <div class="unique-producto-precio">
                                    <span>Precio: <?= $producto->precio ?> €</span>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </article>

            <?php
            }
            ?>

        </section>

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


        $(".slide-icon").on("click", function() {

            if ($(this).hasClass("open-slide")) {
                
                $(this).attr("src","assets/icons/chevron-down.svg").removeClass("open-slide");
                $(this).parents(".cabecera").siblings(".list-pedidos").slideUp(300);
            }else{
                $(this).parents(".pedido-info").siblings().find(".cabecera").find(".slide-icon").attr("src","assets/icons/chevron-down.svg").removeClass("open-slide");
                $(this).parents(".pedido-info").siblings().find(".list-pedidos").slideUp(300)
                
                $(this).attr("src","assets/icons/chevron-up.svg").addClass("open-slide");
                $(this).parents(".cabecera").siblings(".list-pedidos").slideDown(300);
                
            }



        })

    })
</script>