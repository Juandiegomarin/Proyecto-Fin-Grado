<header>
    <div>
        <a href="index.php?page=home">
            <img src="../assets/img/logo.png" alt="Logo del Chiringuito Dieguichi">
        </a>
    </div>
    <nav id="menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)" class="pointer">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
        <img src="../assets/icons/x.svg" alt="x" width="25px">
        <ul id="desplegable">
            <?php
            $secciones = ["Home", "Productos", "News", "Contacto", "Pedir ya"];
            foreach ($secciones as $seccion) {
            ?>
                <a href="index.php?page=<?php echo str_replace(" ", "", strtolower($seccion)) ?>">
                    <li><?php echo $seccion ?></li>
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
                $secciones = ["Home", "Productos", "News", "Contacto", "Pedir ya"];
                foreach ($secciones as $seccion) {
                ?>
                    <a href="index.php?page=<?php echo str_replace(" ", "", strtolower($seccion)) ?>">
                        <li class="<?php if ($page == strtolower($seccion)) echo "underline" ?>"><?php echo $seccion ?></li>
                    </a>
                <?php
                }
                ?>

            </ul>
        </div>
        <div id="secondary-menu">

        </div>
    </nav>
</header>