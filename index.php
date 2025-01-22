<?php  

require_once ('./template/headerLogOut.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="./css/estiloFormLogIn.css">
    <script src="./js/validarFormLogIn.js"></script>
    
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <?php
            if(isset($_GET['validacionError']) && isset($_GET['tipoError']) && isset($_GET['mensaje'])){
                ?>
                    <div id="title">
                        <?php echo $_GET['mensaje']?>
                    </div>
                <?php
            }
        ?>
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>

        <form method = "POST" action="./logIn/validarLogIn.php">
        <br/><br/>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="correo" name = "correo" placeholder="Usuario       " type="text" onkeyup="validarFormularioLogIn()"  required class="validate" autocomplete="off">
                
            </div>
            <div id="validacionCorreo" name = "validacionCorreo" class="">   </div>
            <div class="clearfix"></div>
            <br/><br/>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="contrasena" name = "contrasena" placeholder="contraseña o id (solo empleados)" type="password" onkeyup="validarFormularioLogIn()" required class="validate" autocomplete="off">
                
            </div>
            <div id="validacionPassword" name = "validacionPassword" class="">   </div>

            <div class="remember-me">
                <input type="checkbox" name = "modoDeUsuario">
                <span style="color: #DDD">Iniciar sesion como administrador</span>
            </div>

            <input type="submit" class="btn btn-info" name="submitBtn" id="submitBtn" value="Iniciar sesión" />
        </form>

        

        
    </div>
</body>

</html>



<?php ?>
    <!-- </div> -->
        
<!-- </body> -->
                
        