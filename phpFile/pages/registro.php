<video autoplay loop muted id="video_background" preload="auto">
    <source src="../assets/oleaje.mp4" type="video/mp4" />
</video>
<div class="formulario">
    <h1>Register</h1>
    <form action="index.php" method="post" id="registro">
        <input type="text" name="user" id="user" aria-label="user" placeholder="Nombre de Usuario" minlength="5" required value="<?= (isset($_POST["btnContRegistrarse"])) ? $_POST["user"] : "" ?>">
        <small>Para continuar con el registro debes rellenar este campo</small>
        <?php
        if (isset($_POST["btnContRegistrarse"]) && isset($error_user)) {
            echo "<span class='error'>Este usuario ya esta en uso</span>";
        }
        ?>
        <div class="containerPassword">
            <input type="password" name="password" id="password" aria-label="password" placeholder="Contraseña" minlength="8" required>
            <img src="../assets/icons/show.svg" alt="Show">
            <img src="../assets/icons/no-show.svg" alt="No show">
        </div>
        <small>Para continuar con el registro debes rellenar este campo</small>
        <div class="containerPassword">
            <input type="password" name="password2" id="password2" aria-label="password2" placeholder="Confirmar Contraseña">
            <img src="../assets/icons/show.svg" alt="Show">
            <img src="../assets/icons/no-show.svg" alt="No show">
        </div>

        <small>Para continuar con el registro debes rellenar este campo</small>

        <?php
        if (isset($_POST["btnContRegistrarse"]) && isset($error_password)) {

            echo "<span class='error'>La contraseña debe coincidir</span>";
        }
        ?>

        <input type="email" name="email" id="email" aria-label="Email" placeholder="Correo Electrónico" required value="<?= (isset($_POST["btnContRegistrarse"])) ? $_POST["email"] : "" ?>">
        <small>Para continuar con el registro debes rellenar este campo</small>

        <?php
        if (isset($_POST["btnContRegistrarse"]) && isset($error_email)) {

            if ($error_email == RESPONSE_EMAIL_REPEATED) {
                echo "<span class='error'>Este email ya esta en uso</span>";
            } else {
                echo "<span class='error'>Este email esta mal escrito</span>";
            }
        }
        ?>

        <div>
            <button type="submit" class="btn btn-primary" name="btnContRegistrarse">Registrarse</button>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" onclick="removeRequiredRegister()">Volver</button>
        </div>
    </form>
</div>