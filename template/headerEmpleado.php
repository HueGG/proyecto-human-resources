<?php
        session_start();
        ini_set("display_error", E_ALL);
        require_once ('../procesos/validacionCookies.php');
        

        if(!isset($_SESSION['ESTATUS_ID'])){
            //Si no esta activa, se valida si existen cookies

            if((isset($_COOKIE['ESTATUS_ID']) && $_COOKIE['ESTATUS_ID'] == 1) && (isset($_COOKIE['ROL_ID']) && $_COOKIE['ROL_ID'] =='EMP' ) ){
                validarCookies(); //Si hay cookies y esta activo, se inicializan las variable de sesion
            }else{
                //Si tampoco hay cookies, se retorna al index
                header('Location: ../index.php');
            }
            
            if($_SESSION['ESTATUS_ID'] == 1 && $_SESSION['ROL_ID'] !='EMP'){
                echo 'Acceso no autorizado';
                ?>
                <a href="../index.php">Presione para regresar al inicio</a>
                <?php
                die();
                //header('Location: ../empleados/index.php');
            }else{

            }

        }else{
            if($_SESSION['ESTATUS_ID'] == 1 && $_SESSION['ROL_ID'] !='EMP'){
                echo 'Acceso no autorizado';
                ?>
                <a href="../index.php">Presione para regresar al inicio</a>
                <?php
                die();
                //header('Location: ../index.php?Vengo de personal');
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
    
    <script src="../js/reloj.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style>
        .container {
            max-width: 50%;
            margin-top: 100px;
        }
        
        #TIEMPO {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        #date {
            font-size: 18px;
            color: #777;
            text-align: center;
        }

    </style>
    
    <script src="../js/validarFormularioHojaVida.js"></script>
    <title> Personal </title>
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
                            <a class="nav-link" href="../personal/index.php">Asistencia</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../HojaVida/index.php">Hoja de vida</a>
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