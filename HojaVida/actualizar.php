<?php
    session_start();
    ini_set("display_errors", E_ALL);
    
    
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/HojaVida.php');
    

    $validarParametros = isset($_POST['empleado_id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['fechaNacimiento']) && isset($_POST['nacionalidad']) && isset($_POST['estadoCivil']) && isset($_POST['direccion']) && isset($_POST['estudios']) && isset($_POST['idiomas']);
    $validarEmpId = isset($_POST['empleado_id']) && !isset($_POST['nombre']) && !isset($_POST['apellido']) && !isset($_POST['correo']) && !isset($_POST['telefono']) && !isset($_POST['fechaNacimiento']) && !isset($_POST['nacionalidad']) && !isset($_POST['estadoCivil']) && !isset($_POST['direccion']) && !isset($_POST['estudios']) && !isset($_POST['idiomas']);
    //Si esta inicializado el parametro $_POST['empleado_id'], se inicializa el atributo employeeId con el valor contenido, caso contrario se inicializa como nulo
    if(  $validarEmpId /*isset($_POST['empleado_id'])*/  ){
        echo 'Estoy en actualizar solo tengo el ID: '.intval($_POST['empleado_id']);
        
        $hojaVida = new HojaVida();
        $hojaVida->setEmployeeId( intval($_POST['empleado_id']) );
        $hojaVidaBuscado = $hojaVida->buscarHojaVidaEmpleado();

        //Se libera el espacio en memoria del objeto creado
        $hojaVida = null;
        
        
    }else if($validarParametros){
        //echo "Estoy en actualizar y Tengo todos los parametros";
        $hojaVida = new HojaVida(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente actualizar el empleado
        $hojaVida->setEmployeeId(intval($_POST['empleado_id']));

        $hojaVida->setFechaNacimiento(($_POST['fechaNacimiento'] !== '') ? $_POST['fechaNacimiento'] : null);
        $hojaVida->setNacionalidad($_POST['nacionalidad']);
        $hojaVida->setEstadoCivil($_POST['estadoCivil']);
        $hojaVida->setDireccion($_POST['direccion']);
        $hojaVida->setEstudios($_POST['estudios']);
        $hojaVida->setIdiomas($_POST['idiomas']);
        
        
        
        
        //Se llama al metodo de actualizacion y se almacena si el resultado fue o no exitoso
        ///echo var_dump($_POST);
        $resultadoOperacion = $hojaVida->actualizarHojaVidaEmpleado();

        $validacionError = $hojaVida->getValidacionError();
        $tipoError = $hojaVida->getTipoError();
        $mensaje = $hojaVida->getMensaje();
        
        /*
        echo var_dump($_POST);
        echo '<br>';
        echo '<br>';
        echo $validacionError;
        echo $tipoError;
        echo $mensaje;
        echo '<br>';
        echo '<br>';
        $consultaHojaVida =  $hojaVida->buscarHojaVidaEmpleado($_POST['empleado_id']);
        echo var_dump($consultaHojaVida);
        */
        //Se libera el espacio en memoria del objeto creado
        $hojaVida = null;
        
        
        header('Location: index.php?validacionError='.$validacionError.'&tipoError='.$tipoError.'&mensaje='.$mensaje);
        exit;
    
        
        
    }else{
        echo 'Algo ha salido mal';
    }

    
    
?>