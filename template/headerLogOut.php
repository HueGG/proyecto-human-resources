<?php 
        session_start();
        ini_set("display_error", E_ALL);
        require_once ('./procesos/validacionCookies.php');
        //Existe COOKIES
        if( isset($_SESSION['ESTATUS_ID'])  && $_SESSION['ESTATUS_ID'] == 1){
            
            if(isset($_SESSION['ROL_ID']) && ($_SESSION['ROL_ID'] != 'SYS_ADMIN' && $_SESSION['ROL_ID'] != 'GUEST' && $_SESSION['ROL_ID'] != 'OPS_ADMIN' && $_SESSION['ROL_ID'] != 'HR_ADMIN')){
                
                header('Location: ./personal/');
            }else{
                
                header('Location: ./empleados/');
            }
            

        }else{
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloFormLogIn.css">

    
    <style>
        body {
            background-color: #303641;
        }
    </style>
    

    
    <title> Inicio de sesion </title>
</head>
<body>
    <!-- <div class="text-center"> -->
