<?php
//Sesiones -------------------------------------------------------------------------

session_name("Proyecto_Fin_Grado");
session_start();

//Constantes------------------------------------------------------------------------

//Metodos

define("METODO_POST", "POST");
define("METODO_GET", "GET");

//urls
define("DIR_SERV", "http://springProyect:8080");
//define("DIR_SERV", "http://localhost:8081"); //url local

define('COMPROBAR_REGISTRO', DIR_SERV . "/comprobarRegistro");
define("INSERTAR", DIR_SERV . "/insertar");
define("COMPROBAR_USUARIO_LOGUEADO", DIR_SERV . "/comprobarUsuarioLogueado");
define("OBTENER_CATEGORIAS", DIR_SERV . "/obtenerCategorias");
define("OBTENER_PRODUCTOS_CATEGORIA", DIR_SERV . "/obtenerProductos");
define("OBTENER_PRODUCTO", DIR_SERV . "/obtenerProducto");
//Respuestas
define("RESPONSE_OK", "OK");
define("RESPONSE_ERROR", "ERROR");
define("RESPONSE_EXIST", "EXIST");
define("RESPONSE_NO_EXIST", "NOEXIST");
define("RESPONSE_INVALID_EMAIL", "INVALID_EMAIL");
define("RESPONSE_WRONG_PASSWORD", "WRONG_PASSWORD");
define("RESPONSE_EMAIL_REPEATED", "EMAIL_REPEATED");

//funciones-------------------------------------------------------------------------
function consumir_servicios_REST($url, $metodo, $datos = null)
{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
    if (isset($datos)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));
    }

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        // Manejar el error aquí, por ejemplo:
        echo "Error en la ch cURL: " . $error;
    }

    curl_close($ch);
    return $response;
}
