<?php

include("Global.php");

$page = $_GET["page"] ?? "home";

include("session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dieguichi Orderly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.cdnfonts.com/css/luckiest-guy" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/oswald-4" rel="stylesheet">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <?php

        include("pages/header.php");
        include("pages/".$page.".php");
        include("pages/footer.php");

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>