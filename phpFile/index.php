<?php
include("Global.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esto es una prueba</title>
</head>
<body>

    <h1>Esta es mi página</h1>
    <?php
    $response= consumir_servicios_REST(DIR_SERV."/productos","GET");
    echo "<p>Hola esta es la respuesta".$response."</p>";
    ?>
    
</body>
</html>