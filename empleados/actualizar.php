<?php
    session_start();
    ini_set("display_errors", E_ALL);
    
    
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Empleado.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoEmpleado.php');
    require_once ('../procesos/procesos.php');

    $validarParametros = isset($_POST['empleado_id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['fecha_contratacion']) && isset($_POST['trabajo_id']) && isset($_POST['comision']) && isset($_POST['gerente_id']) && isset($_POST['departamento_id']);
    $validarEmpId = isset($_POST['empleado_id']) && !isset($_POST['nombre']) && !isset($_POST['apellido']) && !isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['fecha_contratacion']) && !isset($_POST['trabajo_id']) && !isset($_POST['comision']) && !isset($_POST['gerente_id']) && !isset($_POST['departamento_id']);
    //Si esta inicializado el parametro $_POST['empleado_id'], se inicializa el atributo employeeId con el valor contenido, caso contrario se inicializa como nulo
    if(  $validarEmpId /*isset($_POST['empleado_id'])*/  ){
        //echo 'Estoy en actualizar solo tengo el ID: '.intval($_POST['empleado_id']);
        
        $empleado = new Empleado();
        $empleado->setEmployeeId( intval($_POST['empleado_id']) );
        $empleadoBuscado = $empleado->buscarEmpleado();
            //echo '<br>';
            //echo count($empleadoBuscado[0]).'<br>';//Obtener "anchura (numero de columas)" de arreglo asociativo
            //var_dump($empleadoBuscado).'<br><br>';
            //echo $empleadoBuscado[0]['EMPLEADO_ID'].'<br>';

        //Se libera el espacio en memoria del objeto creado
        $empleado = null;
        //Impresion de formulario enviandole un arreglo asociativo como parametro
        formularioActualizarEmp($empleadoBuscado);
        
    }else if($validarParametros){
        //echo "Estoy en actualizar y Tengo todos los parametros";
        $empleado = new Empleado(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente actualizar el empleado
        $empleado->setEmployeeId(intval($_POST['empleado_id']));
        $empleado->setFirstName($_POST['nombre']);
        $empleado->setLastName($_POST['apellido']);
        $empleado->setEmail($_POST['correo']);
        $empleado->setPhoneNumber($_POST['telefono']);
        $empleado->setHireDate($_POST['fecha_contratacion']);
        $empleado->setJobId($_POST['trabajo_id']);
        $empleado->setCommissionPct($_POST['comision']);
        $empleado->setManagerId($_POST['gerente_id']);
        $empleado->setDepartmentId($_POST['departamento_id']);
        
        
        
        
        //Se llama al metodo de actualizacion y se almacena si el resultado fue o no exitoso
        $resultadoOperacion = $empleado->actualizarEmpleado();

        $validacionError = $empleado->getValidacionError();
        $tipoError = $empleado->getTipoError();
        $mensaje = $empleado->getMensaje();
        /*
        echo $_POST['departamento_id'];
        echo $validacionError;
        echo $tipoError;
        echo $mensaje;
        */
        if($resultadoOperacion){
            $resultadoJobHistory = $empleado->registrarJobHistory();
        }
        //Se libera el espacio en memoria del objeto creado
        $empleado = null;
        
        //La siguiente linea se sustituye para retornar los datos por método GET
        //retornarDatosPostActualizar($validacionError, $tipoError, $mensaje);
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
        /*
        $datosGet = "EMPLEADO_ID=".$_POST['empleado_id'].
        "&NOMBRE=".$_POST['nombre'].
        "&APELLIDO=".$_POST['apellido'].
        "&CORREO=".$_POST['correo'].
        "&TELEFONO=".$_POST['telefono'].
        "&FECHA_CONTRATACION=".$_POST['fecha_contratacion'].
        "&TRABAJO_ID=".$_POST['trabajo_id'].
        "&SUELDO=".$_POST['sueldo'].
        "&COMISION=".$_POST['comision'].
        "&GERENTE_ID=".$_POST['gerente_id'].
        "&DEPARTAMENTO_ID=".$_POST['departamento_id'].
        "&validacionErrorActualizar=".$validacionError.
        "&tipoError=".$tipoError.
        "&mensaje=".$mensaje;
        */
        //header('Location: index.php?'.$datosGet);//error tipo 1, correo ya existente. No es posible registtrar el empleado con un correo ya existente
        //exit;

        retornarDatosPostActualizar($validacionError, $tipoError, $mensaje);
        header('Location: index.php');//error tipo 1, correo ya existente. No es posible registtrar el empleado con un correo ya existente
        exit;
    
        
        
    }else{
        echo 'Algo ha salido mal';
    }

    
    
?>