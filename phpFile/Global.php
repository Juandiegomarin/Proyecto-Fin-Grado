<?php
define("DIR_SERV", "http://springProyect:8080");
function consumir_servicios_REST($url, $metodo, $datos = null)
{
    $llamada = curl_init();
    curl_setopt($llamada, CURLOPT_URL, $url);
    curl_setopt($llamada, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
    if (isset($datos))
        curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
    curl_exec($llamada);
    $respuesta = curl_exec($llamada);

    if ($respuesta === false) {
        $error = curl_error($llamada);
        // Manejar el error aquí, por ejemplo:
        echo "Error en la llamada cURL: " . $error;
    } else {
        // Procesar el resultado aquí
    }
    curl_close($llamada);
    return $respuesta;
}
?>