<?php
        session_start();
        
        require_once ('../procesos/validacionCookies.php');
        //Re inicializacion de COOKIES y SESSION en caso de que se hayan destruido y se reenvien los datos por POST
    if( empty($_COOKIE) && empty($_SESSION) && isset($_POST['ESTATUS_ID']) && isset($_POST['ROL_ID'])){
        //Se valida que las cookies y session esten vacias o nulas pero, se reciba el estatus y rol por el metodo POST
        //echo 'Preparodo para reiniciar cookiekoios';
        //Validar si es usuario administrativo 
        if ( isset($_POST['ROL_ID']) && ( $_POST['ROL_ID'] == 'SYS_ADMIN' || $_POST['ROL_ID'] == 'OPS_ADMIN' || $_POST['ROL_ID'] == 'HR_ADMIN' || $_POST['ROL_ID'] == 'GUEST' ) ){
            //Si el usuario es de un perfil administrativo, se inicializan sus cookies
            //Se inicializan los datos del administrador
            $_SESSION['USUARIO_ID'] = $_POST['USUARIO_ID'];
            $_SESSION['CORREO'] = $_POST['CORREO'];
            $_SESSION['NOMBRE'] = $_POST['NOMBRE'];
            $_SESSION['FECHA_REGISTRO'] = $_POST['FECHA_REGISTRO'];
            $_SESSION['ULTIMA_SESION'] = $_POST['ULTIMA_SESION'];
            $_SESSION['ESTATUS_ID'] = $_POST['ESTATUS_ID'];
            $_SESSION['ESTADO'] = $_POST['ESTADO'];
            $_SESSION['ROL_ID'] = $_POST['ROL_ID'];
            $_SESSION['ROL'] = $_POST['ROL'];
            /**************** */
            $_SESSION['VALIDACION_ERROR'] = $_POST['VALIDACION_ERROR'];
            $_SESSION['TIPO_ERROR'] = $_POST['TIPO_ERROR'];
            $_SESSION['MENSAJE'] = $_POST['MENSAJE'];
            
            //Guardar cookies
            
            setcookie("USUARIO_ID", $_POST['USUARIO_ID'], time() + (86400*30), "/");
            setcookie("CORREO", $_POST['CORREO'], time() + (86400*30), "/");
            setcookie("NOMBRE", $_POST['NOMBRE'], time() + (86400*30), "/");
            setcookie("FECHA_REGISTRO", $_POST['FECHA_REGISTRO'], time() + (86400*30), "/");
            setcookie("ULTIMA_SESION", (date('Y-m-d H:i:s',  time())), time() + (86400*30), "/");
            setcookie("ESTATUS_ID", $_POST['ESTATUS_ID'], time() + (86400*30), "/");
            setcookie("ESTADO", $_POST['ESTADO'], time() + (86400*30), "/");
            setcookie("ROL_ID", $_POST['ROL_ID'], time() + (86400*30), "/");
            setcookie("ROL", $_POST['ROL'], time() + (86400*30), "/");
            setcookie("VALIDACION_ERROR", $_POST['VALIDACION_ERROR'], time() + (86400*30), "/");
            setcookie("TIPO_ERROR", $_POST['TIPO_ERROR'], time() + (86400*30), "/");
            setcookie("MENSAJE", $_POST['MENSAJE'], time() + (86400*30), "/");
            
        }
    }else{
        //No hubo peticion POST para re inicializar cookies
    }



        if(!isset($_SESSION['ESTATUS_ID'])){
            //Si no esta activa, se valida si existen cookies
            if(isset($_COOKIE['ESTATUS_ID']) && $_COOKIE['ESTATUS_ID'] == 1  ){
                validarCookies(); //Si hay cookies y esta activo, se inicializan las variable de sesion
            }else{
                //Si tampoco hay cookies, se retorna al index
                header('Location: ../index.php');
            }
            
            if($_SESSION['ESTATUS_ID'] == 1 && $_SESSION['ROL_ID'] =='EMP'){
                echo 'Acceso no autorizado';
                ?>
                <a href="../index.php">Presione para regresar al inicio</a>
                <?php
                die();
                //header('Location: ../empleados/index.php');
            }else{

            }

        }else{

            if($_SESSION['ESTATUS_ID'] == 1 && $_SESSION['ROL_ID'] =='EMP'){
                echo 'Acceso no autorizado';
                ?>
                <a href="../index.php">Presione para regresar al inicio</a>
                <?php
                die();
                //header('Location: ../empleados/index.php');
            }else{

            }
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../ajax/procedimientos.js"></script>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Link para las dataTables -->
        <!-- Recursos para DadaTables 5-->
    <link href="../dataTables/DataTables-1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <!-- Recursos para Botones de DadaTables 5-->
    <link href="../dataTables/Buttons-2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet"/>
 
    <script src="../dataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="../dataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../dataTables/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="../dataTables/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="../dataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../dataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="../dataTables/Buttons-2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="../dataTables/Buttons-2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="../dataTables/Buttons-2.3.6/js/buttons.html5.min.js"></script>
    <script src="../dataTables/Buttons-2.3.6/js/buttons.print.min.js"></script>
        <!-- Recursos para los iconos de exportar datos en dataTables-->
    <script src="https://kit.fontawesome.com/6d6ece8f67.js" crossorigin="anonymous"></script>
    <!--Recursos para las dataTables-->
    <script src="../js/dataTable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../js/validarFormularioDepartamento.js"></script>
    <script src="../js/validarFormularioLocacion.js"></script>
        
    <script src="../js/validarFormulario.js"></script>
    <title> Document </title>
</head>
<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">RH Oracle</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../empleados/">Empleados</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../historico/">Historico</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../locaciones/">Locaciones</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../departamentos/">Departamentos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../asistenciasEmpleados/">Asistencias</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../hojasVidaEmpleados/">Hojas de vida</a>
                        </li>

                        

                        <!-- Lista desplegable para los datos del usaurio que inicia sesion -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bienvenido(a) <?php echo $_SESSION['NOMBRE'];?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#"><?php  echo $_SESSION['CORREO'];?></a>
                                <a class="dropdown-item" href="#"><?php  echo 'Estado: '.$_SESSION['ESTADO'];?></a>
                                <a class="dropdown-item" href="#"><?php  echo 'Rol: '.$_SESSION['ROL']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logIn/cerrarSesion.php">Cerrar sesión</a>

                                
                            </div>

                           
                        </li>

                    </ul>
                    

                </div>
            </nav>
        </div>

  

        
