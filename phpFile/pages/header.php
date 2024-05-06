<header>
    <div>
        <a href="index.php?page=home">
        <img src="../assets/img/logo.png" alt="Logo del Chiringuito Dieguichi">
    </a>
    </div>
    <nav id="menu">

        <div id="lower-menu">
            <ul>
                <?php
                $secciones = ["Home", "Productos", "News", "Contacto", "Pedir ya"];
                foreach ($secciones as $seccion) {
                ?>
                    <a href="index.php?page=<?php echo str_replace(" ","",strtolower($seccion))?>">
                        <li class="<?php if($page==strtolower($seccion)) echo "underline"?>"><?php echo $seccion?></li>
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