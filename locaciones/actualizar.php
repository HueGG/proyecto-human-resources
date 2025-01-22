<?php
    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Locacion.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoLocacion.php');
    
    $validarParametros = isset($_POST['locacion_id']) && isset($_POST['direccion']) && isset($_POST['codigo_postal']) && isset($_POST['ciudad']) && isset($_POST['estado_provincia']) && isset($_POST['pais_id']) ;
    $validarLocacionId = isset($_POST['locacion_id']) && !isset($_POST['direccion']) && !isset($_POST['codigo_postal']) && !isset($_POST['ciudad']) && !isset($_POST['estado_provincia']) && !isset($_POST['pais_id']) ;
    //Si esta inicializado el parametro $_POST['locacion_id'], se inicializa el atributo locacion_id con el valor contenido, caso contrario se inicializa como nulo
    if(  $validarLocacionId  ){
        //echo 'Estoy en actualizar solo tengo el ID: '.intval($_POST['locacion_id']);
        
        $locacion = new Locacion();
        $locacion->setLocationId( intval($_POST['locacion_id']) );
        $locacionBuscada = $locacion->buscarLocacion();
            //echo '<br>';
            //echo count($locacionBuscada[0]).'<br>';//Obtener "anchura (numero de columas)" de arreglo asociativo
            //var_dump($locacionBuscada).'<br><br>';
            //echo $locacionBuscada[0]['LOCACION_ID'].'<br>';

        //Se libera el espacio en memoria del objeto creado
        $locacion = null;
        //Impresion de formulario enviandole un arreglo asociativo como parametro
        formularioActualizarLocacion($locacionBuscada);
        
    }else if($validarParametros){
        //echo "Estoy en actualizar y Tengo todos los parametros";
        $locacion = new Locacion(); //Se crea objeto de la clase LOCACION mediante el cual se inicializaran sus atributos para posteriormente actualizar el REGISTRO
        $locacion->setLocationId(intval($_POST['locacion_id']));
        $locacion->setStreetAddress($_POST['direccion']);
        $locacion->setPostalCode($_POST['codigo_postal']);
        $locacion->setCity($_POST['ciudad']);
        $locacion->setStateProvince($_POST['estado_provincia']);
        $locacion->setCountryId($_POST['pais_id']);
        

        //echo $locacion->getCountryId();
        //Se llama al metodo de actualizacion y se almacena si el resultado fue o no exitoso
        $resultadoOperacion = $locacion->actualizarLocacion();
        
        //Se libera el espacio en memoria del objeto creado
        $locacion = null;
        
        
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