<?php
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Departamento.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoDepartamento.php');
    
    $validarParametros = isset($_POST['departamento_id']) && isset($_POST['departamento']) && isset($_POST['gerente_id']) && isset($_POST['locacion_id']);
    $validarDepartamentoId = isset($_POST['departamento_id']) && !isset($_POST['departamento']) && !isset($_POST['gerente_id']) && !isset($_POST['locacion_id']);
    //Si esta inicializado el parametro $_POST['empleado_id'], se inicializa el atributo employeeId con el valor contenido, caso contrario se inicializa como nulo
    if(  $validarDepartamentoId /*isset($_POST['empleado_id'])*/  ){
        //echo 'Estoy en actualizar solo tengo el ID: '.intval($_POST['departamento_id']);
        
        $departamento = new Departamento();
        $departamento->setDepartmentId( intval($_POST['departamento_id']) );
        $departamentoBuscado = $departamento->buscarDepartamento();
            //echo '<br>';
            //echo count($empleadoBuscado[0]).'<br>';//Obtener "anchura (numero de columas)" de arreglo asociativo
            //var_dump($empleadoBuscado).'<br><br>';
            //echo $empleadoBuscado[0]['EMPLEADO_ID'].'<br>';

        //Se libera el espacio en memoria del objeto creado
        $departamento = null;
        //Impresion de formulario enviandole un arreglo asociativo como parametro
        formularioActualizarDepartamento($departamentoBuscado);
        
    }else if($validarParametros){
        //echo "Estoy en actualizar y Tengo todos los parametros";
        $departamento = new Departamento(); //Se crea objeto de la clase empleado mediante el cual se inicializaran sus atributos para posteriormente actualizar el departamento
        $departamento->setDepartmentId(intval($_POST['departamento_id']));
        $departamento->setDepartmentName($_POST['departamento']);
        $departamento->setManagerId($_POST['gerente_id']);
        $departamento->setLocationId($_POST['locacion_id']);

        
        //echo $departamento->getDepartmentId();
        
        //echo $departamento->getDepartmentId();
        //Se llama al metodo de actualizacion y se almacena si el resultado fue o no exitoso
        $resultadoOperacion = $departamento->actualizarDepartamento();
        
        //Se libera el espacio en memoria del objeto creado
        $departamento = null;
        
        
        if ($resultadoOperacion){
            //Redirige al index nuevamente en caso de actualizacion exitosa
            header('Location: index.php');
        }else{
            echo 'error en la actualizacion';
        }
        
        
    }else{
        echo 'Algo ha salido mal';
    }

    

?>