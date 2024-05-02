<?php
if(isset($_SESSION["login"])){

    //llamada para obtener los datos del sidebar
    $response = json_decode(consumir_servicios_REST(OBTENER_TIPOS_PRODUCTOS,METODO_GET));
}
?>
<div id="home">

    <div id="sidebar">

        <div id="sidebar-header">

            <a href="index.php?id=principal">
                <div class="sidebar-div-border  <?php echo (!isset($_GET["id"]) || $_GET["id"]=="principal") ? "clicked" : "noClicked" ?>">
                    <div>
                        <img src="../assets/img/logo.jpg" alt="Logo">
                    </div>
                    <div>
                        <span>Nuestros productos</span>
                    </div>
                </div>
            </a>

        </div>
        <div id="sidebar-list">
            <?php
            $id = 0;
            foreach ($response as $tipo_producto) {
                
                $is_clicked = "clicked";
            ?>
                <a href="index.php?id=<?php echo $id ?>">
                    <div class="sidebar-div-border <?php echo (isset($_GET["id"]) && $_GET["id"]==$id) ? "clicked" : "noClicked" ?>">
                        <div><img src='assets/img/logo.jpg' alt='Logo'></div>
                        <div> <span><?php echo $tipo_producto->descripcion?></span></div>
                    </div>
                </a>
            <?php
            $id++;
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
            foreach ($response as $tipo_producto) {
            ?>    
            <div>
                <img src="assets/img/logo.jpg" alt="Logo">
                <span><?php echo $tipo_producto->descripcion?></span>
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