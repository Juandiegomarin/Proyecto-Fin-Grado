<?php

$response = $_GET["response"] ?? false;

?>

<main id="pago">
    <h5 class="card-header">Formulario de Pago</h5>
    <div class="card-body">

        <form id="miFormulario" method="post" action="index.php">

            <div id="card-data">
                <div id="card-data-number">
                    <label for="inputCard">Número de Tarjeta:</label>
                    <input type="text" id="inputCard" placeholder="0000 0000 0000 0000" maxlength="19" name="card" required>

                    <?php
                    if (isset($error_card) && $error_card) {
                        echo "<span class='error'>Numero de tarjeta incorrecto</span>";
                    }
                    ?>

                </div>
                <div id="card-data-date">
                    <div>
                        <label for="inputCVC">CVV:</label>
                        <input type="text" id="inputCVC" placeholder="000" maxlength="3" name="cvv" required>
                    </div>
                    <div>
                        <label for="inputCVC">Mes:</label>
                        <input type="number" id="inputMonth" value="<?= date("m") ?>" max="12" min="1" name="month">
                    </div>
                    <div>
                        <label for="inputCVC">Año:</label>
                        <input type="number" id="inputYear" value="<?= date("Y") ?>" min="<?= date("Y") ?>" max="2100" name="year">
                    </div>
                </div>

                <?php
                if (isset($error_cvv) && $error_cvv) {
                    echo "<span class='error'>Numero de cvv incorrecto</span>";
                }
                if (isset($error_month) && $error_month) {
                    echo "<span class='error'>Fecha de caducidad incorrecta</span>";
                }
                ?>

            </div>


            <div id="card-name">
                <div id="card-name-container">
                    <label for="inputName">Nombre:</label>
                    <input type="text" id="inputName" maxlength="50" placeholder="" name="nombre" required>
                </div>
            </div>

            <div id="card-type">
                <label for="">Aceptamos:</label>
                <div id="cards-images" class="form-control seleccionTarjeta">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoTarjeta" id="inlineRadio1" value="mc" checked>
                        <label class="form-check-label" for="inlineRadio1">
                            <i class="fab fa-cc-mastercard"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoTarjeta" id="inlineRadio2" value="visa">
                        <label class="form-check-label" for="inlineRadio2">
                            <i class="fab fa-cc-visa"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoTarjeta" id="inlineRadio3" value="dinersClub">
                        <label class="form-check-label" for="inlineRadio3">
                            <i class="fab fa-cc-diners-club"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoTarjeta" id="inlineRadio4" value="americanExpress">
                        <label class="form-check-label" for="inlineRadio4">
                            <i class="fab fa-cc-amex"></i>
                        </label>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary" name="btnConfirmarPago">Confirmar</button>
        </form>

        <?php
        if (isset($response) && $response == RESPONSE_OK) {
        ?>

            <div class="alert alert-success">
                <p><strong>Success!</strong> Pedido realizado con exito.</p>
                <p>En unos instantes tu pedido estará listo</p>
            </div>

        <?php
        } elseif (isset($response) && $response == RESPONSE_ERROR) {
        ?>

            <div class="alert alert-danger">
                <strong>Error!</strong> Ha ocurrido un error con el pedido , por favor intentelo más tarde.
            </div>

        <?php
        }
        ?>

    </div>
</main>
<script>
    history.pushState(null, null, window.location.pathname + "?page=pago");

    const input = document.getElementById('inputCard');

    input.addEventListener("input", function() {
        const inputValue = this.value.replace(/\s/g, ""); // quitamos todos los espacios encontrados...
        if (inputValue !== "") {
            const result = inputValue.match(/.{1,4}/g).join(" "); // y agregamos un espacio cada 4 caracteres, uso join(" ") para quitar las comas...
            this.value = result; // Y el valor del input será la cadena modificada.
        }
    });
</script>