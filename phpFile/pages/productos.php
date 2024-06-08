<?php
if (isset($_SESSION["login"])) {

    //llamada para obtener los datos del sidebar
    $response = json_decode(consumir_servicios_REST(OBTENER_TIPOS_PRODUCTOS, METODO_GET));
}
?>
<div id="productos">

    <div id="sidebar">

        <div id="sidebar-header">

            <a href="index.php?page=productos&section=principal">
                <div class="sidebar-div-border  <?php echo (!isset($_GET["section"]) || $_GET["section"] == "principal") ? "clicked-both" : "noClicked" ?>">
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
            $cont = 0;
            $length = count($response);
            foreach ($response as $categoria) {
                if (isset($_GET["section"])&&$_GET["section"] == "Ensaladas y entrantes frios")
                    $clicked = "clicked-first";
                else if (isset($_GET["section"])&&$_GET["section"] == "Cocktails")
                    $clicked = "clicked-end"

            ?>
                <a href="index.php?page=productos&section=<?php echo $categoria->categoria ?>">
                    <div class="sidebar-div-border <?php echo (isset($_GET["section"]) && $_GET["section"] == $categoria->categoria) ? "clicked $clicked" : "noClicked" ?>">
                        <div><img src='assets/img/logo.png' alt='Logo'></div>
                        <div><span><?php echo $categoria->categoria ?></span></div>
                    </div>
                </a>
            <?php
                $cont++;
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
            foreach ($response as $categoria) {
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