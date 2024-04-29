<div id="home">

    <div id="sidebar">

        <div id="sidebar-header">
            <p>Nuestros productos</p>
        </div>
        <div id="sidebar-list">
            <?php
            foreach ($response as $tipo_producto) {
                echo "<div>Descripcion " . $tipo_producto->descripcion . "</div>";
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
                echo "<div>". $tipo_producto->descripcion ."</div>";
            }
            ?>


        </div>
        <form action="../index.php" method="post">
            <button type="submit" name="btnSalir">Boton</button>
        </form>
    </div>

</div>