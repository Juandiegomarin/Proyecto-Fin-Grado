<?php

//llamada para obtener los datos del sidebar

$categorias = json_decode(consumir_servicios_REST(OBTENER_CATEGORIAS, METODO_GET));

if (isset($_GET["section"]) && $_GET["section"] != "principal") {
    $id_categoria = $_GET["section"];
    $productos = json_decode(consumir_servicios_REST(OBTENER_PRODUCTOS_CATEGORIA . "/" . $id_categoria, METODO_GET));
}
?>
<div id="productos-mobil">
    <div id="content-header-mobil">
        <h1>Nuestros productos</h1>
        <h2>Tus productos favoritos del Chiringuito Dieguichi</h2>
    </div>
    <div id="lista">
        <?php

        if (!isset($_GET["section"]) || $_GET["section"] == "principal") {
            foreach ($categorias as $categoria) {
        ?>
                <a href="index.php">
                    <div>
                        <div><img src='assets/img/logo.png' alt='Logo'></div>
                        <div><span><?php echo $categoria->categoria ?></span></div>
                    </div>
                </a>
            <?php
            }
        } else {
            foreach ($productos as $producto) {
            ?>
                <a href="index.php">
                    <div>
                        <div><img src='assets/img/logo.png' alt='Logo'></div>
                        <div><span><?php echo $producto->nombre ?></span></div>
                    </div>
                </a>
        <?php
            }
        }
        ?>

    </div>
    <div id="seleccion">
        <a href="index.php?page=productos&section=principal">
            <div class="<?= (!isset($_GET["section"]) || $_GET["section"] == "principal") ? "seleccionado" : "" ?>">
                <div>
                    <img src="../assets/img/logo.png" alt="Logo">
                </div>
                <div>
                    <span>Nuestros productos</span>
                </div>
            </div>
        </a>
        <?php
        foreach ($categorias as $categoria) {
        ?>
            <a href="index.php?page=productos&section=<?php echo $categoria->id ?>">
                <div class="<?= (isset($_GET["section"]) && $_GET["section"] == $categoria->id) ? "seleccionado" : "" ?>">
                    <div><img src='assets/img/logo.png' alt='Logo'></div>
                    <div><span><?php echo $categoria->categoria ?></span></div>
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

            <a href="index.php?page=productos&section=principal">
                <div class="sidebar-div-border  <?= (!isset($_GET["section"]) || $_GET["section"] == "principal") ? "clicked-both" : "noClicked" ?>">
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
            foreach ($categorias as $categoria) {
                if (isset($_GET["section"]) && $_GET["section"] == 1)
                    $clicked = "clicked-first";
                else if (isset($_GET["section"]) && $_GET["section"] == 12)
                    $clicked = "clicked-end"

            ?>
                <a href="index.php?page=productos&section=<?php echo $categoria->id ?>">
                    <div class="sidebar-div-border <?= (isset($_GET["section"]) && $_GET["section"] == $categoria->id) ? "clicked $clicked" : "noClicked" ?>">
                        <div><img src='assets/img/logo.png' alt='Logo'></div>
                        <div><span><?php echo $categoria->categoria ?></span></div>
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
            foreach ($categorias as $categoria) {
            ?>
                <div>
                    <img src="assets/img/logo.png" alt="Logo">
                    <span><?php echo $categoria->categoria ?></span>
                </div>
            <?php
            }
            ?>


        </div>
        <form action="../index.php" method="post">
            <button type="submit" name="btnSalir">Boton</button>
        </form>
    </div>

</div>