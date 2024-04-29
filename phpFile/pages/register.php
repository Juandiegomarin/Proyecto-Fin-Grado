<div class="formulario">
    <h1>Register</h1>
    <form action="../index.php" method="post" id="registro">
        <input type="text" name="usuario" id="usuario" aria-label="usuario" placeholder="Nombre de Usuario" minlength="5" required value="<?php if(isset($_POST["btnContRegistrarse"])) echo $_POST["usuario"]?>">
        <small>Para continuar con el registro debes rellenar este campo</small>
        <?php
        if(isset($_POST["btnContRegistrarse"]) && $error_usuario){
            echo "<span>Este usuario ya esta en uso</span>";
        }
        ?>
        <div class="containerPassword">
        <input type="password" name="clave" id="clave" aria-label="clave" placeholder="Contraseña" minlength="8" required>
        <img src="../assets/icons/show.svg" alt="Show">
        <img src="../assets/icons/no-show.svg" alt="No show">
        </div>
        <small>Para continuar con el registro debes rellenar este campo</small>

        <div class="containerPassword">
            <input type="password" name="clave2" id="clave2" aria-label="clave2" placeholder="Confirmar Contraseña">
            <img src="../assets/icons/show.svg" alt="Show">
            <img src="../assets/icons/no-show.svg" alt="No show">
        </div>
        
        <small>Para continuar con el registro debes rellenar este campo</small>
        <?php
        if(isset($_POST["btnContRegistrarse"]) && $error_clave){

                echo "<span>La contraseña debe coincidir</span>";
        }
        ?>
        <input type="email" name="email" id="email" aria-label="Email" placeholder="Correo Electrónico" required value="<?php if(isset($_POST["btnContRegistrarse"])) echo $_POST["email"]?>">
        <small>Para continuar con el registro debes rellenar este campo</small>
        <?php
        if(isset($_POST["btnContRegistrarse"]) && $error_email){
            if(is_string($response_email)){
                echo "<span>Este email ya esta en uso</span>";
            }else{
                echo "<span>Este email esta mal escrito</span>";
            }
            
        }
        ?>
        <div>
            <button type="submit" class="btn btn-primary" name="btnContRegistrarse">Register</button>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" onclick="removeRequiredRegister()">Back</button>
        </div>
    </form>
</div>
