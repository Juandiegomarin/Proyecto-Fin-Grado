
<video autoplay loop muted id="video_background" preload="auto">
<source src="../assets/oleaje.mp4" type="video/mp4"/>
</video>
<div class="formulario">

    <h1>Iniciar Sesión</h1>

    <form action="index.php" method="post" id="login">

        <input type="text" name="userL" id="user" aria-label="user" placeholder="Usuario" required value="<?=  (isset($_POST["userL"])) ?  $_POST["userL"] : "" ?>">
        <small>Para continuar con el registro debes rellenar este campo</small>

        <?php
        if (isset($_POST["btnLogin"]) && $error_logueo) {
            echo "<span class='error'>Usuario/Contraseña incorrectos</span>";
        }
        ?>

        <div class="containerPassword">
            <input type="password" name="password" id="password" aria-label="password" placeholder="Contraseña" required>
            <img src="assets/icons/show.svg" alt="Show">
            <img src="assets/icons/no-show.svg" alt="No show">
        </div>
        <small>Para continuar con el registro debes rellenar este campo</small>
        <div>
            <button type="submit" class="btn btn-primary" name="btnLogin">Iniciar Sesión</button>
        </div>
        <span>¿Aún no tienes tu cuenta?</span>
        <div>
            <button type="submit" class="btn btn-primary" name="btnRegistrarse" onclick="removeRequiredLogin()">Registrarse</button>
        </div>
    </form>
</div>
