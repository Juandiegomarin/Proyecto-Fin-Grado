<?php


if(isset($_SESSION["login"]) && $_SESSION["login"]){
    $secciones = [
        ["title" => "Home", "slug" => "home"],
        ["title" => "Productos", "slug" => "productos"],
        ["title" => "Contacto", "slug" => "contacto"],
        ["title" => "Terminos & Condiciones", "slug" => "terminos"]
    ];
}else{
    $secciones = [
        ["title" => "Home", "slug" => "home"],
        ["title" => "Productos", "slug" => "productos"],
        ["title" => "Contacto", "slug" => "contacto"],
        ["title" => "Terminos & Condiciones", "slug" => "terminos"],
        ["title" => "Login", "slug" => "login"]
    ];
}


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
        <img src="assets/icons/person.svg" alt="login" class="<?= (isset($_SESSION["login"]) && $_SESSION["login"]) ? "login-icon pointer" : "" ?>">
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
                <img src="assets/icons/person.svg" alt="login" class="<?= (isset($_SESSION["login"]) && $_SESSION["login"]) ? "login-icon pointer" : ""?>">
            </div>
        </div>
    </nav>
    <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"]) {
    ?>
        <div id="user-sidebar">
            <div id="close-user-sidebar" class="user-hover-background">
                <img src="assets/icons/x.svg" alt="close" id="close-user-sidebar" class="pointer">
            </div>
            <div id="user-content">
                <p>Sesion iniciada como :</p>
                <p><strong><?= $_SESSION["nombre_usuario"] ?? "" ?></strong></p>

                <form action="index.php?page=pedidos" method="post" id="pedidos-user" class="user-hover-background">
                    <button type="submit" class="user-hover-color">Mis pedidos</button>
                </form>
                <a href="index.php" class="user-hover-color user-hover-background">Términos y Condiciones</a>
                <a href="index.php" class="user-hover-color user-hover-background">Políticas y Privacidad</a>
                <form action="index.php" method="post" id="user-logout" class="user-hover-background">
                    <button type="submit" class="user-hover-color" name="btnLogout"><span>Cerrar sesión</span><img src="assets/icons/logout.svg" alt=""></button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</header>
<script>
    $(document).ready(function() {

        $("#close-user-sidebar").on("click", function() {
            $(this).parents("#user-sidebar").css("transform", " translateX(300px)");
        })

        $(".login-icon").on("click", function() {
            $("#user-sidebar").css("transform", " translateX(0px)");
        })
    })
</script>