<header>
    <div>
        <a href="index.php?page=home">
            <img src="../assets/img/logo.png" alt="Logo del Chiringuito Dieguichi">
        </a>
    </div>
    <nav id="menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
            <path d="M5 22h14c1.103 0 2-.897 2-2V9a1 1 0 0 0-1-1h-3V7c0-2.757-2.243-5-5-5S7 4.243 7 7v1H4a1 1 0 0 0-1 1v11c0 1.103.897 2 2 2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-4 3h2v2h2v-2h6v2h2v-2h2l.002 10H5V10z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)" class="pointer">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
        </svg>
        <img src="../assets/icons/x.svg" alt="x" width="23px">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
            <path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
            </path>
        </svg>
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
                        <li class="<?= ($page == strtolower($seccion)) ? "underline" : "" ?>"><?php echo $seccion ?></li>
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