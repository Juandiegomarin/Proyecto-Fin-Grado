<?php

//llamada para obtener los datos del sidebar

$categorias = json_decode(consumir_servicios_REST(OBTENER_CATEGORIAS, METODO_GET));

if (isset($_GET["section"]) && $_GET["section"] != "productos") {
    $slug = $_GET["section"];
    $productos = json_decode(consumir_servicios_REST(OBTENER_PRODUCTOS_CATEGORIA . "/" . $slug, METODO_GET));
}

?>
<div id="productos-movil">
    <div id="content-header-movil">
        <h1>Nuestros productos</h1>
        <h2>Tus productos favoritos del Chiringuito Dieguichi</h2>
    </div>
    <div id="lista">

        <?php

        $es_categoria = !isset($_GET["section"]) || $_GET["section"] == "productos";

        $list = $es_categoria ? $categorias : $productos;
        $page = $es_categoria ? "productos" : "producto";
        $param = $es_categoria ? "section" : "producto";

        foreach ($list as $item) {
        ?>

           <a href="index.php?page=<?= $page ?>&<?= $param ?>=<?= $item->slug ?>">
                <div class="imagen-container">
                    <div class="image-imagen"><img src='assets/products/<?= $item->imagen ?>' alt='<?= $item->nombre ?>' > </div>
                    <div class="image-span"><span><?php echo $item->nombre ?></span></div>
                </div>
            </a>

        <?php
        }
        ?>

    </div>
    <div id="seleccion">

        <a href="index.php?page=productos&section=productos">
            <div class="<?= (!isset($_GET["section"]) || $_GET["section"] == "productos") ? "seleccionado" : "" ?>">
                <div>
                    <img src="../assets/img/logo.png" alt="Logo" style="min-width: 80px; max-width:100%">
                </div>
                <div>
                    <span>Nuestros productos</span>
                </div>
            </div>
        </a>

        <?php
        foreach ($categorias as $categoria) {
        ?>

            <a href="index.php?page=productos&section=<?php echo $categoria->slug ?>">
                <div class="<?= (isset($_GET["section"]) && $_GET["section"] == $categoria->slug) ? "seleccionado" : "" ?> imagen-container">
                    <div class="image-imagen"><img src='assets/products/<?= $categoria->imagen ?>' alt='Logo'></div>
                    <div class="image-span"><span><?php echo $categoria->nombre ?></span></div>
                </div>
            </a>

        <?php
        }
        ?>

    </div>
</div>
<div id="productos">
    <div id="sidebar">
        <div id="sidebar-header">
            <a href="index.php?page=productos&section=productos">
                <div class="sidebar-div-border  <?= (!isset($_GET["section"]) || $_GET["section"] == "productos") ? "clicked-both" : "noClicked" ?>">
                    <div>
                        <img src="../assets/img/logo.png" alt="Logo">
                    </div>
                    <div>
                        <span>Nuestros productos</span>
                    </div>
                </div>
            </a>
        </div>
        <div id="sidebar-list">

            <?php
            foreach ($categorias as $key => $categoria) {

                if (isset($_GET["section"]) && $key == 0) {
                    $clicked = "clicked-first";
                } elseif (isset($_GET["section"]) && $key == count($categorias) - 1) {
                    $clicked = "clicked-end";
                } else {
                    $clicked = "";
                }

            ?>

                <a href="index.php?page=productos&section=<?= $categoria->slug ?>">
                    <div class="sidebar-div-border <?= (isset($_GET["section"]) && $_GET["section"] == $categoria->slug) ? "clicked $clicked" : "noClicked" ?> imagen-container">
                        <div class="image-imagen"><img src='assets/products/<?= $categoria->imagen ?>' alt='Logo'></div>
                        <div class="image-span"><span><?= $categoria->nombre ?></span></div>
                    </div>
                </a>

            <?php
            }
            ?>
        </div>
    </div>
    <div id="content">
        <div id="content-header">
            <h1>Nuestros productos</h1>
            <h2>Tus productos favoritos del Chiringuito Dieguichi</h2>
        </div>
        <div id="content-body">

            <?php

            $es_categoria = !isset($_GET["section"]) || $_GET["section"] == "productos";

            $list = $es_categoria ? $categorias : $productos;
            $page = $es_categoria ? "productos" : "producto";
            $param = $es_categoria ? "section" : "producto";

            foreach ($list as $item) {
            ?>

                <a href="index.php?page=<?= $page ?>&<?= $param ?>=<?= $item->slug ?>">
                    <div class="imagen-container">
                        <div class="image-imagen"><img src='assets/products/<?= $item->imagen ?>' alt='Logo'></div>
                        <div class="image-span"><span><?= $item->nombre ?></span><?= (!$es_categoria)  ? (number_format( $item->precio,2)."€") : "" ?></span></div>
                    </div>
                </a>

            <?php
            }
            ?>

        </div>
    </div>
</div>