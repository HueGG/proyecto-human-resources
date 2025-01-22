<?php 
    session_start();
    ini_set("display_errors", E_ALL);
    

    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Usuario.php');
    require_once ('../class/Empleado.php');
    
    $validarParametros = isset($_POST['correo']) && isset($_POST['contrasena']);

    if($validarParametros){
        
        //Valida si se marco la opcion de administrador, sino,se logea como empleado
        if(isset($_POST['modoDeUsuario'])) {
            //Si esta marcada, se inicia sesion como Administrador
            //Se comienza validacion
            $usuario = new Usuario();//Objeto de usuario
            //Inicializcion de atributos de usuario
            $usuario->setEmail($_POST['correo']);
            $usuario->setPassword($_POST['contrasena']);
            //Se inicia sesion como un usuario dentro de los adiministradores
            $datosLogIn = $usuario->iniciarSesion(); 

            //Se recuperan los mensajes de error
            $validacionError =  $usuario->getValidacionError();
            $tipoError = $usuario->getTipoError();
            $mensaje =  $usuario->getMensaje();

            $usuario = null;
        }else{
            //Si no esta marcada, se inicia sesion como empleado
            $empleado = new Empleado(); //Objeto de empleado
            $empleado->setEmail($_POST['correo']);
            $empleado->setEmployeeId($_POST['contrasena']);
            //Se inicia sesion como un empleado (usuario con menores privilegios)
            $datosLogIn = $empleado->iniciarSesionEmpleado(); 

                //Se recuperan los mensajes de error
                $validacionError =  $empleado->getValidacionError();
                $tipoError = $empleado->getTipoError();
                $mensaje =  $empleado->getMensaje();

            $empleado = null;
        }

        
        
        
        
        if($validacionError == 0){
            //Error de inicio de sesion
            //header('Location: ../LogIn.php');
            echo $mensaje;
            header('Location: ../index.php?validacionError='.$validacionError.'&tipoError='.$tipoError.'&mensaje='.$mensaje);
        }else{
            //LogIN exitoso. Se inicializan variables globales
            //echo 'exito';
            //echo var_dump($datosLogIn);
            if(isset($_POST['modoDeUsuario'])){
                //Se inicializan los datos del administrador
                $_SESSION['USUARIO_ID'] = $datosLogIn[0]['USUARIO_ID'];
                $_SESSION['CORREO'] = $datosLogIn[0]['CORREO'];
                $_SESSION['NOMBRE'] = $datosLogIn[0]['NOMBRE'];
                $_SESSION['FECHA_REGISTRO'] = $datosLogIn[0]['FECHA_REGISTRO'];
                $_SESSION['ULTIMA_SESION'] = $datosLogIn[0]['ULTIMA_SESION'];
                $_SESSION['ESTATUS_ID'] = $datosLogIn[0]['ESTATUS_ID'];
                $_SESSION['ESTADO'] = $datosLogIn[0]['ESTADO'];
                $_SESSION['ROL_ID'] = $datosLogIn[0]['ROL_ID'];
                $_SESSION['ROL'] = $datosLogIn[0]['ROL'];
                /**************** */
                $_SESSION['VALIDACION_ERROR'] = $validacionError;
                $_SESSION['TIPO_ERROR'] = $tipoError;
                $_SESSION['MENSAJE'] = $mensaje;
                
                //Guardar cookies
                setcookie("USUARIO_ID", $_SESSION['USUARIO_ID'], time() + (86400 * 30), "/");
                setcookie("CORREO", $_SESSION['CORREO'], time() + (86400 * 30), "/");
                setcookie("NOMBRE", $_SESSION['NOMBRE'], time() + (86400 * 30), "/");
                setcookie("FECHA_REGISTRO", $_SESSION['FECHA_REGISTRO'], time() + (86400 * 30), "/");
                setcookie("ULTIMA_SESION", (date('Y-m-d H:i:s',  time())), time() + (86400 * 30), "/");
                setcookie("ESTATUS_ID", $_SESSION['ESTATUS_ID'], time() + (86400 * 30), "/");
                setcookie("ESTADO", $_SESSION['ESTADO'], time() + (86400 * 30), "/");
                setcookie("ROL_ID", $_SESSION['ROL_ID'], time() + (86400 * 30), "/");
                setcookie("ROL", $_SESSION['ROL'], time() + (86400 * 30), "/");
                setcookie("VALIDACION_ERROR", $_SESSION['VALIDACION_ERROR'], time() + (86400 * 30), "/");
                setcookie("TIPO_ERROR", $_SESSION['TIPO_ERROR'], time() + (86400 * 30), "/");
                setcookie("MENSAJE", $_SESSION['MENSAJE'], time() + (86400 * 30), "/");

                //Redirecciona a pagina pricipal
                header('Location: ../empleados/index.php');
            }else{
                //Se inicializan los datos del empleado
                $_SESSION['USUARIO_ID'] = $datosLogIn[0]['EMPLEADO_ID'];
                $_SESSION['CORREO'] = $datosLogIn[0]['CORREO'];
                $_SESSION['NOMBRE'] = $datosLogIn[0]['NOMBRE'];
                $_SESSION['DEPARTAMENTO'] = $datosLogIn[0]['DEPARTAMENTO'];
                $_SESSION['GERENTE'] = $datosLogIn[0]['GERENTE'];
                $_SESSION['ESTATUS_ID'] = $datosLogIn[0]['ESTATUS_ID'];
                $_SESSION['ESTADO'] = $datosLogIn[0]['ESTADO'];
                $_SESSION['ROL_ID'] = $datosLogIn[0]['ROL_ID'];
                $_SESSION['ROL'] = $datosLogIn[0]['ROL'];
                /**************** */
                $_SESSION['VALIDACION_ERROR'] = $validacionError;
                $_SESSION['TIPO_ERROR'] = $tipoError;
                $_SESSION['MENSAJE'] = $mensaje;
                
                //Guardar cookies
                setcookie("USUARIO_ID", $_SESSION['USUARIO_ID'], time() + (86400 * 30), "/");
                setcookie("CORREO", $_SESSION['CORREO'], time() + (86400 * 30), "/");
                setcookie("NOMBRE", $_SESSION['NOMBRE'], time() + (86400 * 30), "/");
                setcookie("DEPARTAMENTO", $_SESSION['FECHA_REGISTRO'], time() + (86400 * 30), "/");
                setcookie("GERENTE", (date('Y-m-d H:i:s',  time())), time() + (86400 * 30), "/");
                setcookie("ESTATUS_ID", $_SESSION['ESTATUS_ID'], time() + (86400 * 30), "/");
                setcookie("ESTADO", $_SESSION['ESTADO'], time() + (86400 * 30), "/");
                setcookie("ROL_ID", $_SESSION['ROL_ID'], time() + (86400 * 30), "/");
                setcookie("ROL", $_SESSION['ROL'], time() + (86400 * 30), "/");
                /********************************* */
                setcookie("VALIDACION_ERROR", $_SESSION['VALIDACION_ERROR'], time() + (86400 * 30), "/");
                setcookie("TIPO_ERROR", $_SESSION['TIPO_ERROR'], time() + (86400 * 30), "/");
                setcookie("MENSAJE", $_SESSION['MENSAJE'], time() + (86400 * 30), "/");

                //Redirecciona a pagina DE empleados sin privilegis
                header('Location: ../personal/');
            }
            
            
            //echo 'Login exitoso';
            //echo var_dump($_SESSION);
        }
        //Destruccion de objeto
        

    }else{
        header('Location: ../index.php');
        
    }

?>