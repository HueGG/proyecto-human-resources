<?php
        //session_start();
        //ini_set("display_error", E_ALL);
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        
        
        function retornarDatosPost($validacionError, $tipoError, $mensaje){
            $datosNuevoEmpleado =  $_POST; //Se recuperan los datos recibidos por POST
            //echo var_dump($datosNuevoEmpleado);
            $datosCookies = $_COOKIE;   //Respaldo de COOKIES
            $datosSession =$_SESSION;   //Respaldo de Session
            /*
            echo 'Datos coookies: <br>';
            echo var_dump($datosCookies);
            echo '<br>';

            echo 'Datos session<br>';
            echo var_dump($datosSession);
            die();
            */
            //Se define la URL y los datos a enviar por POST a la URL especificada
            $url = "http://localhost/proyecto/empleados/index.php";
            $camposMetodoPost = http_build_query(array_merge($datosNuevoEmpleado, ["validacionError" => $validacionError], ["tipoError" => $tipoError ], ["mensaje" => $mensaje], $datosCookies));
            //echo var_dump($camposMetodoPost);
            //die();
            //Inicializacion de cURL
            //ch significa manejador o manipulador de cURL
            $ch = curl_init(); //Inicia una nueva sesión cURL
            //uso de curl_setopt para definir opciones de las sesion cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $camposMetodoPost);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Ejecutar la solicitud cURL
            $respuesta = curl_exec($ch); //Ejecuta la sesión cURL que se le pasa como parámetro. Devuelve true en caso de éxito o false en caso de error. Sin embargo, si la opción CURLOPT_RETURNTRANSFER está establecida, devolverá el resultado si se realizó con éxito, o false si falló.
    
    
            if ($respuesta === false) {
                $error = curl_error($ch);
                $error_code = curl_errno($ch);
                echo "Error en la solicitud cURL: " . $error . " (Código: " . $error_code . ")";
            } else {
                // Procesar la respuesta exitosa aquí
            }
    
    
            // Cerrar la sesión cURL
            curl_close($ch);
            // Imprimir la respuesta
            //echo '';
            //echo var_dump($respuesta);        
     
        }


        /************************** */
        /****************************** */
        function retornarDatosPostActualizar($validacionError, $tipoError, $mensaje){
             //Se recuperan los datos recibidos por POST
            //$datosNuevoEmpleado =  $_POST;
            $datosEmpleadoActualizar [] = $_POST;

            /*
            $datosNuevoEmpleado [] = array(
                "EMPLEADO_ID" =>$_POST['empleado_id'],
                "NOMBRE" => $_POST['nombre'],
                "APELLIDO" => $_POST['apellido'],
                "CORREO" => $_POST['correo'],
                "TELEFONO" => $_POST['telefono'],
                "FECHA_CONTRATACION" => $_POST['fecha_contratacion'],
                "TRABAJO_ID" => $_POST['trabajo_id'],
                "SUELDO" => $_POST['sueldo'],
                "COMISION" => $_POST['comision'],
                "GERENTE_ID" => $_POST['gerente_id'],
                "DEPARTAMENTO_ID" =>$_POST['departamento_id'],
                "validacionErrorActualizar" => $validacionError, 
                "tipoError" => $tipoError,
                "mensaje" => $mensaje
        
            );*/

            // Guardar las cookies actuales y los datos de sesión
            $datosCookies = $_COOKIE;   //Respaldo de COOKIES
            $datosSession =$_SESSION;   //Respaldo de Session

            /*
            $empleado_id = $_POST['empleado_id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $fecha_contratacion = $_POST['fecha_contratacion'];
            $trabajo_id = $_POST['trabajo_id'];
            $sueldo = $_POST['sueldo'];
            $comision = $_POST['comision'];
            $gerente_id = $_POST['gerente_id'];
            $departamento_id = $_POST['departamento_id'];*/
            //Se asigna un numero de error que tambien se retornara al index
            
            //echo var_dump($datosNuevoEmpleado);
            //Se define la URL y los datos a enviar por POST a la URL especificada
            $url = "http://localhost/proyecto/empleados/index.php";
            //$camposMetodoPost = http_build_query(array_merge( $datosNuevoEmpleado, ["validacionErrorActualizar" => $validacionError], ["tipoError" => $tipoError ], ["mensaje" => $mensaje]));
            $camposMetodoPost = http_build_query(array_merge( $datosEmpleadoActualizar, ["validacionErrorActualizar" => $validacionError], ["tipoError" => $tipoError ], ["mensaje" => $mensaje], $datosCookies ) );
            //echo var_dump($camposMetodoPost);
            
            //Inicializacion de cURL
            //ch significa manejador o manipulador de cURL
            $ch = curl_init(); //Inicia una nueva sesión cURL
            //uso de curl_setopt para definir opciones de las sesion cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $camposMetodoPost);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Mantener las cookies en una sesión separada
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);

            // Mantener los datos de sesión
            $cookieFile ="C:/Apache24/htdocs/proyecto/procesos/cookie.txt";
            curl_setopt($ch, CURLOPT_COOKIESESSION, true); // Indica a cURL que maneje las cookies en una sesión separada
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); // Especifica el archivo donde se guardarán las cookies
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);

            // Ejecutar la solicitud cURL
            
            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            //vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
            //SE PIERDEN DATOS DE SESION
            $respuesta = curl_exec($ch); //Ejecuta la sesión cURL que se le pasa como parámetro. Devuelve true en caso de éxito o false en caso de error. Sin embargo, si la opción CURLOPT_RETURNTRANSFER está establecida, devolverá el resultado si se realizó con éxito, o false si falló.
            /*
            echo 'Iniciando ejecucion de CURL <br>';
            echo var_dump($_SESSION); 
            */
            die();
            
            if ($respuesta === false) {
                $error = curl_error($ch);
                $error_code = curl_errno($ch);
                echo "Error en la solicitud cURL: " . $error . " (Código: " . $error_code . ")";
            } else {
                // Procesar la respuesta exitosa aquí
                
            }
    
            
            // Cerrar la sesión cURL
            curl_close($ch);
            // Imprimir la respuesta
            //echo '';
            //echo var_dump($respuesta);        
     
        }

?>