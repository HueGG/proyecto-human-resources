<?php 
    session_start();
    ini_set("display_errors", E_ALL);

    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Empleado.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoEmpleado.php');

    $validarEmpId = isset($_POST['empleado_id']);
    if($validarEmpId){
        //Se elimina empleado
        $empleado = new Empleado(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente eliminar el empleado
        $empleado->setEmployeeId(intval($_POST['empleado_id']));
        $resultadoOperacion = $empleado->eliminarEmpleado();
        //Recuperar valores devueltos por procedimiento almacenado
        $validacionError = $empleado->getValidacionError();
        $tipoError = $empleado->getTipoError();
        $mensaje = $empleado->getMensaje();
        //Liberacion de memoria usado por objeto
        $empleado = null;
        /**Validar si el delete fue exitoso y la validacion exitosa al mismo tiempo */
        if($resultadoOperacion && $validacionError){
            //Delete exitoso y sin errores
            

            mensajeError($validacionError, $tipoError, $mensaje);
            //echo 'Vengo de eliminar';
            tablaEmpleadosResumen();
            // Redireccionar a una página específica
            
            

            //retornarDatosPost($validacionError, $tipoError, $mensaje);
            //header('Location: index.php'); //Delete exitoso. Sin errores 
            //exit;
        }else{
            //retornarDatosPost($validacionError, $tipoError, $mensaje);
            /*
            TIPO_ERROR indica el tipo de error surgido: 	
				1: (EMPLEADO no se puede eliminar porque ya existe en JOB_HISTORY,  y tiene al menos un empleado a su cargo)		
				2: (Empleado ya existe en JOB_HISTORY o tiene al menos un empleado a su cargo)
            */
            //retornarDatosPost($validacionError, $tipoError, $mensaje);
            //header('Location: index.php');
            //exit;
            mensajeError($validacionError, $tipoError, $mensaje);
            tablaEmpleadosResumen();
            
        }
        

    }else{
        header('Location: index.php');
        exit;
    }


    function retornarDatosPost($validacionError, $tipoError, $mensaje){
        $datosEmpleado =  $_POST; //Se recuperan los datos recibidos por POST
        //Se asigna un numero de error que tambien se retornara al index
        /*
            TIPO_ERROR indica el tipo de error surgido: 	
				1: (EMPLEADO no se puede eliminar porque ya existe en JOB_HISTORY,  y tiene al menos un empleado a su cargo)		
				2: (Empleado ya existe en JOB_HISTORY o tiene al menos un empleado a su cargo)
            */
        
        //echo var_dump($datosNuevoEmpleado);
        //Se define la URL y los datos a enviar por POST a la URL especificada
        $url = "http://localhost/proyecto/empleados/index.php";
        $camposMetodoPost = http_build_query(array_merge($datosEmpleado, ["validacionError" => $validacionError], ["tipoError" => $tipoError], ["mensaje" => $mensaje]));
        echo var_dump($camposMetodoPost);
        
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
            //echo 'Solicitud exitosa';
        }


        // Cerrar la sesión cURL
        curl_close($ch);
        // Imprimir la respuesta
        //echo 'Resultado';
        //echo "Resultado de curl ".var_dump($respuesta) ;
        //echo $respuesta ? $respuesta: 'error';
        //
 
    }
    


?>