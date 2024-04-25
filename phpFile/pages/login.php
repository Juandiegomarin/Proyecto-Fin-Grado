<div id="formulario">
    <h1>Iniciar Sesión</h1>
    <form action="../index.php" method="post" id="login">

        <input type="text" name="usuario" id="usuario" aria-label="Usuario" placeholder="Usuario">
        
        <input type="password" name="clave" id="clave" aria-label="Contraseña" placeholder="Contraseña">
    
        <div>
            <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
        </div>
        <span>¿Aún no tienes tu cuenta?</span>
        <div>
            <button type="submit" class="btn btn-primary" name="btnRegistrarse">Register</button>
        </div>

    </form>
</div>