<?php

$mail = $_GET["mail"] ?? false;

?>

<script src='https://www.hCaptcha.com/1/api.js' async defer></script>

<section class="contact-page">
    <h1>Contacto</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 contact-text">

                <h2>Bienvenidos al Chiringuito Dieguichi</h2>
                <p>¡Disfruta del sabor auténtico de la Costa del Sol!</p>

                <p>Somos el Chiringuito Dieguichi, ubicado en Manilva, donde podrás degustar los mejores espetos de sardinas frescas, preparados con técnicas tradicionales.</p>

                <h4>Contáctanos</h4>
                <p>Para reservar tu mesa o preguntar sobre nuestros menús, no dudes en contactarnos:</p>
                <div class="contact-info">
                    <p>Teléfono: 682 07 97 69</p>
                </div>

                <h4>Horarios de apertura</h4>
                <p>Lunes a domingo: 11:00 pm - 21:00 pm</p>

                <p>Ven a experimentar la auténtica gastronomía costeña en nuestro acogedor chiringuito. ¡Esperamos verte pronto!</p>
            </div>
            <div class="col-lg-5">
                <form action="index.php" method="post" class="contact-form">
                    <input type="text" name="nombre" id="name" placeholder="Nombre" value="<?= (isset($_SESSION["login"]) && $_SESSION["login"]) ? $_SESSION["nombre_usuario"] : "" ?>" required>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?= (isset($_SESSION["login"]) && $_SESSION["login"]) ? $_SESSION["email"] : "" ?>" required>
                    <input type="text" name="sujeto" id="subject" placeholder="Sujeto" required>
                    <textarea name="mensaje" id="message" placeholder="Mensaje" required></textarea>
                    <!-- hCaptcha -->
                    <br><br>
                    <div class="h-captcha" data-sitekey="ad837be1-2815-41d2-afd5-bff95e563963"></div>
                    <br><br>
                    <button class="site-btn" name="btnContact">Enviar<img src="assets/img/double-arrow.webp" alt="arrows" /></button>

                </form>

                <?php
                if ($mail == "true") {
                ?>

                    <div class="alert alert-success">
                        <strong>Success!</strong> Mensaje enviado con éxito.
                    </div>

                <?php
                } elseif ($mail == "false") {
                ?>

                    <div class="alert alert-danger">
                        <strong>Error!</strong>Se ha producido un error inesperado, inténtelo más tarde.
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.985857423814!2d-5.24701261022622!3d36.312649804027174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0cc5483d0d3719%3A0xe23f118538bd6a47!2sPlaya%20Los%20Toros!5e0!3m2!1ses!2ses!4v1733777897325!5m2!1ses!2ses"
 width="100%" 
 height="450" 
 style="border:0;" 
 allowfullscreen="" 
 loading="lazy" 
 referrerpolicy="no-referrer-when-downgrade">
</iframe>
<script>
    history.pushState(null, null, window.location.pathname + "?page=contacto");
</script>