<?php

$secciones = [
    ["title" => "Home" ,"slug" => "home"],
    ["title" => "Productos" ,"slug" => "productos"],
    ["title" => "Contacto" ,"slug" => "contacto"]
];

?>

<header>
    <div>
        <a href="index.php?page=home">
            <img src="../assets/img/logo.png" alt="Logo del Chiringuito Dieguichi">
        </a>
    </div>
    <nav id="menu">
        <img src="assets/icons/shoping-bag.svg" alt="shoping bag" id="shoping-bag-icon">
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
                <img src="assets/icons/shoping-bag.svg" alt="shoping bag">
                <img src="assets/icons/person.svg" alt="login">
            </div>
        </div>
    </nav>
</header>