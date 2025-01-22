<?php
    session_start();
    ini_set("display_errors", E_ALL);
    
    
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Asistencia.php');
    

    $validarEntradaEmpId = isset($_POST['entrada_empleado_id']) ;
    $validarSalidaEmpId = isset($_POST['salida_empleado_id']) ;
    
    //Registro de entrada
    if(  $validarEntradaEmpId  ){
        
        
        $asistencia = new Asistencia();
        $asistencia->setEmployeeId( intval($_POST['entrada_empleado_id']) );
        $asistenciaResultado = $asistencia->registrarAsistencia(); //Se registra asistencia (ENTRADA)

        /*Se recuperan los mensajes de error que devuelva el procedimiento almacenado*/
        $validacionError = $asistencia->getValidacionError();
        $tipoError = $asistencia->getTipoError();
        $mensaje = $asistencia->getMensaje();
        //Se libera el espacio en memoria del objeto creado
        $asistencia = null;

        header('Location: ./index.php?validacionError='.$validacionError.'&tipoError='.$tipoError.'&mensaje='.$mensaje);
        exit;
        
    }else if($validarSalidaEmpId){
        /*Registro de salida*/
        $salida = new Asistencia(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente actualizar el empleado
        $salida->setEmployeeId(intval($_POST['salida_empleado_id']));
        $salidaResultado = $salida->registrarSalida();  //Se registra salida de empleado
        
        /*Se recuperan los mensajes de error que devuelva el procedimiento almacenado*/
        $validacionError = $salida->getValidacionError();
        $tipoError = $salida->getTipoError();
        $mensaje = $salida->getMensaje();
        //Se llama al metodo de actualizacion y se almacena si el resultado fue o no exitoso
        ///echo var_dump($_POST);
        
        $salida = null;
        
        
        header('Location: index.php?validacionError='.$validacionError.'&tipoError='.$tipoError.'&mensaje='.$mensaje);
        exit;
    
        
        
    }else{
        echo 'Algo ha salido mal';
        exit;
    }

    
    
?>