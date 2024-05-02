<div class="formulario">
    <h1>Iniciar Sesión</h1>
    <form action="index.php" method="post" id="login">

        <input type="text" name="usuarioL" id="usuario" aria-label="Usuario" placeholder="Usuario" required value="<?php if (isset($_POST["usuarioL"]))  echo $_POST["usuarioL"]; ?>">
        <small>Para continuar con el registro debes rellenar este campo</small>
        <?php
        if (isset($_POST["btnLogin"]) && $error_logueo) {
            echo "<span class='error'>Usuario/Contraseña incorrectos</span>";
        }
        ?>

        <div class="containerPassword">
            <input type="password" name="clave" id="clave" aria-label="clave" placeholder="Contraseña" required>
            <img src="assets/icons/show.svg" alt="Show">
            <img src="assets/icons/no-show.svg" alt="No show">
        </div>
        <small>Para continuar con el registro debes rellenar este campo</small>
        <div>
            <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
        </div>
        <span>¿Aún no tienes tu cuenta?</span>
        <div>
            <button type="submit" class="btn btn-primary" name="btnRegistrarse" onclick="removeRequiredLogin()">Register</button>
        </div>

    </form>
</div>