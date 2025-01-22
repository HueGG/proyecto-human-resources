<?php 
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ini_set("display_error", E_ALL);

    //Destruccion de cookies
    setcookie("USUARIO_ID", "", time() - 3600, "/");
    setcookie("CORREO", "", time() - 3600, "/");
    setcookie("NOMBRE", "", time() - 3600, "/");
    setcookie("FECHA_REGISTRO", "", time() - 3600, "/");
    setcookie("ULTIMA_SESION", "", time() - 3600, "/");

    setcookie("DEPARTAMENTO", "", time() - 3600, "/");
    setcookie("GERENTE", "", time() - 3600, "/");

    setcookie("ESTATUS_ID", "", time() - 3600, "/");
    setcookie("ESTADO", "", time() - 3600, "/");
    setcookie("ROL_ID", "", time() - 3600, "/");
    setcookie("ROL", "", time() - 3600, "/");
    setcookie("VALIDACION_ERROR", "", time() - 3600, "/");
    setcookie("TIPO_ERROR", "", time() - 3600, "/");
    setcookie("MENSAJE", "", time() - 3600, "/");
    //Destruis sesion
    session_destroy();
    header('Location: ../index.php');
?>