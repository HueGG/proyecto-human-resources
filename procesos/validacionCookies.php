<?php 
    
    ini_set("display_error", E_ALL);

    function validarCookies(){
        if( isset($_COOKIE['USUARIO_ID']) && isset($_COOKIE['CORREO']) && isset($_COOKIE['NOMBRE']) && isset($_COOKIE['ESTATUS_ID']) && isset($_COOKIE['ESTADO']) && isset($_COOKIE['ROL_ID'])&& isset($_COOKIE['ROL_ID']) ){
            //sE INICIALIZAN variables de sesion en caso de existir cookies
            $_SESSION['USUARIO_ID'] = $_COOKIE['USUARIO_ID'];
            $_SESSION['CORREO'] = $_COOKIE['CORREO'];
            $_SESSION['NOMBRE'] = $_COOKIE['NOMBRE'];
            //$_SESSION['ULTIMA_SESION'] = $_COOKIE['ULTIMA_SESION'];
            $_SESSION['ESTATUS_ID'] = $_COOKIE['ESTATUS_ID'];
            $_SESSION['ESTADO'] = $_COOKIE['ESTADO'];
            $_SESSION['ROL_ID'] = $_COOKIE['ROL_ID'];
            $_SESSION['ROL'] = $_COOKIE['ROL'];
        }else{

            header('Location: ../');
        }
    }

    function reinicializarCookies($datosCookies){
        //Guardar cookies
        setcookie("USUARIO_ID", $datosCookies['USUARIO_ID'], time() + (86400 * 30), "/");
        setcookie("CORREO", $datosCookies['CORREO'], time() + (86400 * 30), "/");
        setcookie("NOMBRE", $datosCookies['NOMBRE'], time() + (86400 * 30), "/");
        setcookie("FECHA_REGISTRO", $datosCookies['FECHA_REGISTRO'], time() + (86400 * 30), "/");
        setcookie("ULTIMA_SESION", (date('Y-m-d H:i:s',  time())), time() + (86400 * 30), "/");
        setcookie("ESTATUS_ID", $datosCookies['ESTATUS_ID'], time() + (86400 * 30), "/");
        setcookie("ESTADO", $datosCookies['ESTADO'], time() + (86400 * 30), "/");
        setcookie("ROL_ID", $datosCookies['ROL_ID'], time() + (86400 * 30), "/");
        setcookie("ROL", $datosCookies['ROL'], time() + (86400 * 30), "/");
        setcookie("VALIDACION_ERROR", $datosCookies['VALIDACION_ERROR'], time() + (86400 * 30), "/");
        setcookie("TIPO_ERROR", $datosCookies['TIPO_ERROR'], time() + (86400 * 30), "/");
        setcookie("MENSAJE", $datosCookies['MENSAJE'], time() + (86400 * 30), "/");
    }
    
?>