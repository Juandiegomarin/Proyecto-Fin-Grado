<?php

$secciones = [
    ["title" => "Home", "slug" => "home"],
    ["title" => "Productos", "slug" => "productos"],
    ["title" => "Contacto", "slug" => "contacto"]
];

?>

<header>
    <a href="index.php?page=home">
        <div>
            <img src="../assets/img/logo.png" alt="Logo del Chiringuito Dieguichi">
        </div>
    </a>
    <nav id="menu">
        <a href="index.php?page=pedido">
            <img src="assets/icons/shoping-bag.svg" alt="shoping bag" id="shoping-bag-icon">

            <?php
            if (!empty($_SESSION["pedido"])) {
            ?>

                <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle"><?= count($_SESSION["pedido"]) ?></span>

            <?php
            }
            ?>
            
        </a>
        <img src="assets/icons/menu.svg" alt="menu" id="menu-icon">
        <img src="assets/icons/x.svg" alt="close" id="close-icon">
        <img src="assets/icons/person.svg" alt="login" id="login-icon">
        <ul id="desplegable">

            <?php
            foreach ($secciones as $seccion) {
            ?>

                <a href="index.php?page=<?= $seccion["slug"] ?>">
                    <li><?= $seccion["title"] ?></li>
                </a>

            <?php
            }
            ?>

        </ul>
    </nav>
    <nav id="menu-escritorio">

        <div id="lower-menu">
            <ul>

                <?php
                foreach ($secciones as $seccion) {
                ?>

                    <a href="index.php?page=<?= $seccion["slug"] ?>">
                        <li class="<?= ($page == $seccion["slug"]) ? "underline" : "" ?>"><?= $seccion["title"]  ?></li>
                    </a>

                <?php
                }
                ?>

            </ul>
        </div>
        <div id="secondary-menu">
            <div id="icons">
                <a href="index.php?page=pedido">
                    <img src="assets/icons/shoping-bag.svg" alt="shoping bag">

                    <?php
                    if (!empty($_SESSION["pedido"])) {
                    ?>

                        <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle"><?= count($_SESSION["pedido"]) ?></span>

                    <?php
                    }
                    ?>

                </a>
                <img src="assets/icons/person.svg" alt="login">
            </div>
        </div>
    </nav>
</header>