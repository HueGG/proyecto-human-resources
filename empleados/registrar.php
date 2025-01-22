<?php
    session_start();
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Empleado.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoEmpleado.php');
    require_once ('../procesos/procesos.php');

    $validarParametros = isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['fecha_contratacion']) && isset($_POST['trabajo_id']) && isset($_POST['comision']) && isset($_POST['gerente_id']) && isset($_POST['departamento_id']);
    $validarParametrosBasicos = isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['fecha_contratacion']) && isset($_POST['trabajo_id']) && isset($_POST['comision']) && isset($_POST['gerente_id']) /*&& isset($_POST['departamento_id'])*/;
    $validarEmpCamposMinimos = isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['fecha_contratacion']) && !isset($_POST['trabajo_id']) && !isset($_POST['comision']) && !isset($_POST['gerente_id']) && !isset($_POST['departamento_id']);
    //Si esta inicializado el parametro $_POST['empleado_id'], se inicializa el atributo employeeId con el valor contenido, caso contrario se inicializa como nulo
    if(  $validarEmpCamposMinimos  ){
        echo 'Estoy en Registrar solo tengo el Nombre, apellido y correo: '.($_POST['nombre'].' '.$_POST['apellido'].' '.$_POST['correo']);
        
        $empleado = new Empleado();
        $empleado->setFirstName( $_POST['nombre'] );
        $empleado->setLastName( $_POST['apellido'] );
        $empleado->setEmail( $_POST['correo'] );
        
        $resultadoOperacion = $empleado->registrarEmpleado();
        $validacionError = $empleado->getValidacionError();
        $tipoError = $empleado->getTipoError();
        $mensaje = $empleado->getMensaje();
        
        if ( $empleado->getValidacionUnicidadCorreo() ){
            //Si es TRUE, el correo se registro exitosamente
            echo 'Correo nuevo registrado <br>';
            echo $empleado->getValidacionUnicidadCorreo();
        }else{
            //Si es false, el registro no fue exitoso por que el correo ya existe
            echo 'Correo NO registrado porque ya existe<br>';
            echo $empleado->getValidacionUnicidadCorreo();
        }
        //$empleadoBuscado = $empleado->buscarEmpleado();
            //echo '<br>';
            //echo count($empleadoBuscado[0]).'<br>';//Obtener "anchura (numero de columas)" de arreglo asociativo
            //var_dump($empleadoBuscado).'<br><br>';
            //echo $empleadoBuscado[0]['EMPLEADO_ID'].'<br>';

        //Se libera el espacio en memoria del objeto creado
        $empleado = null;
        
        if ($resultadoOperacion && $validacion_correo ){
            //Redirige al index nuevamente en caso de actualizacion exitosa
            
            //echo 'Registro exitoso y el correo era unico'.'<br>';
            //echo 'Resultado de operacion'.$resultadoOperacion.'<br>';
            //echo '<br>Validacion correo: '.$validacion_correo.' s<br>';
            retornarDatosRegistroGet($validacionError, $tipoError, $mensaje);
            
        }else{
            retornarDatosRegistroGet($validacionError, $tipoError, $mensaje);
            
        }
        //Impresion de formulario enviandole un arreglo asociativo como parametro
        //formularioActualizarEmp($empleadoBuscado);
        header('Location: index.php');
        
    }else if($validarParametros){
        //echo "Estoy en Registrar y Tengo todos los parametros";
        $empleado = new Empleado(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente actualizar el empleado
        
        $empleado->setFirstName($_POST['nombre']);
        $empleado->setLastName($_POST['apellido']);
        $empleado->setEmail($_POST['correo']);
        $empleado->setPhoneNumber($_POST['telefono']);
        $empleado->setHireDate($_POST['fecha_contratacion']);
        $empleado->setJobId($_POST['trabajo_id']);
        $empleado->setCommissionPct($_POST['comision']);
        $empleado->setManagerId($_POST['gerente_id']);
        $empleado->setDepartmentId($_POST['departamento_id']);
        

        
        //Se llama al metodo de REGISTRAR y se almacena si el resultado fue o no exitoso
        //echo '<br>Voy a realizar el registro <br>';
        $resultadoOperacion = $empleado->registrarEmpleado();
        //echo '<br>Resultado operacion: '.$resultadoOperacion;
        //echo '<br>'.(bool)$empleado->getValidacionUnicidadCorreo();
        
        $validacionError = $empleado->getValidacionError();
        $tipoError = $empleado->getTipoError();
        $mensaje = $empleado->getMensaje();
        //echo "Validaacion correo: ".$validacion_correo.'<br>';
        /*if($resultadoOperacion && $validacionError){
            //Si el registro fue exitoso y el registro era UNICO
            echo 'Registro exitoso y el correo era unico';
        }*/
        //Se libera el espacio en memoria del objeto creado
        $empleado = null;
        
        
        if ($resultadoOperacion && $validacionError ){
            //Redirige al index nuevamente en caso de actualizacion exitosa
            
            //echo 'Registro exitoso y el correo era unico'.'<br>';
            //echo 'Resultado de operacion'.$resultadoOperacion.'<br>';
            //echo '<br>Validacion correo: '.$validacion_correo.' s<br>';
            
            //retornarDatosRegistroGet($validacionError, $tipoError, $mensaje);
            retornarDatosPost($validacionError, $tipoError, $mensaje);
            
        }else{
            //retornarDatosRegistroGet($validacionError, $tipoError, $mensaje);
            retornarDatosPost($validacionError, $tipoError, $mensaje);
            
        }
        
        //header('Location: index.php');
    }else{
        echo var_dump($_POST);
        echo 'Algo ha salido mal';
    }





    function retornarDatosRegistroGet($validacionError, $tipoError, $mensaje){

        $datosGet = 
        "nombre=".$_POST['nombre'].
        "&apellido=".$_POST['apellido'].
        "&correo=".$_POST['correo'].
        "&telefono=".$_POST['telefono'].
        "&fecha_contratacion=".$_POST['fecha_contratacion'].
        "&trabajo_id=".$_POST['trabajo_id'].
        "&sueldo=".$_POST['sueldo'].
        "&comision=".$_POST['comision'].
        "&gerente_id=".$_POST['gerente_id'].
        "&departamento_id=".$_POST['departamento_id'].
        "&validacionError=".$validacionError.
        "&tipoError=".$tipoError.
        "&mensaje=".$mensaje
        ;
        header('Location: index.php?'.$datosGet);//error tipo 1, correo ya existente. No es posible registtrar el empleado con un correo ya existente
        exit;
            
    }










?>
