<?php
//Sesiones -------------------------------------------------------------------------
session_name("Proyecto_Fin_Grado");
session_start();

//Constantes------------------------------------------------------------------------

//Metodos
define("METODO_POST","POST");
define("METODO_GET","GET");

//urls
define("DIR_SERV", "http://springProyect:8080");
//define("DIR_SERV", "http://localhost:8081"); //url local
define("EXISTE_NOMBRE_USUARIO",DIR_SERV."/existeNombreUsuario");
define("EXISTE_EMAIL",DIR_SERV."/existeEmail");
define("INSERTAR",DIR_SERV."/insertar");
define("COMPROBAR_USUARIO_LOGUEADO",DIR_SERV."/comprobarUsuarioLogueado");
define("OBTENER_TIPOS_PRODUCTOS",DIR_SERV."/obtenerTiposProductos");

//Respuestas
define("RESPONSE_OK","OK");
define("RESPONSE_ERROR","ERROR");
define("RESPONSE_EXIST","EXIST");
define("RESPONSE_NOEXIST","NOEXIST");

//funciones-------------------------------------------------------------------------
function consumir_servicios_REST($url, $metodo, $datos=null)
{
    $llamada = curl_init();
    curl_setopt($llamada, CURLOPT_URL, $url);
    curl_setopt($llamada, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
    if (isset($datos))
        curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
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

function validarEmail($email) {
    $regex = '/^\\S+@\\S+\\.\\S+$/';
    return preg_match($regex, $email);
}
?>