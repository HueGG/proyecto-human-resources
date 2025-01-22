<?php
    session_start();
    ini_set("display_errors", E_ALL);

    //Se incluyen la clase de la que se obtendran la funcionalidad con la base de datos
    require_once ('../class/Empleado.php');
    //Se incluyen los archivos de los que se obtendran la funcionalidad de la pagina
    require_once ('../procesos/procesoEmpleado.php');
    

    //Si esta inicializado el parametro $_POST['empleado_id'], se inicializa el atributo employeeId con el valor contenido, caso contrario se inicializa como nulo
    if( isset($_POST['empleado_id']) ){
        //echo intval($_POST['empleado_id']);
        $empleado = new Empleado();
        $empleado->setEmployeeId( intval($_POST['empleado_id']) );
        $empleadoBuscado = $empleado->buscarEmpleado();
        //tablaEmpleadoBuscado($empleadoBuscado);
        
    }else{
        echo "No se encontro el id";
        
    }

?>