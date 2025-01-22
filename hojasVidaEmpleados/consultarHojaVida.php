<?php 
    session_start();
    ini_set("display_errors", E_ALL);

    require_once ('../class/HojaVida.php');
    require_once ('../class/Empleado.php');
    require_once ('../procesos/procesoHojaVida.php');
    

    $validarEmpId = isset($_POST['empleado_id']);

    if($validarEmpId){
        //Se recibe el id de empleado
        $hojaVida = new HojaVida();
        $hojaVida->setEmployeeId(intval($_POST['empleado_id']));
        $hojaVidaEmpleado = $hojaVida->buscarHojaVidaEmpleado();
        $hojaVida = null;

        $empleado = new Empleado();
        $empleado->setEmployeeId(intval($_POST['empleado_id']));
        $datosEmpleado = $empleado->buscarEmpleado();
        $empleado = null;
        

        //echo var_dump($historialAsistencias);
        if(empty($hojaVidaEmpleado)){
            mensajeSinAsistencias($datosEmpleado[0]['NOMBRE'], $datosEmpleado[0]['APELLIDO']);
        }else{
            /*
            echo var_dump($hojaVidaEmpleado);
            echo '<br><br>';
            echo $hojaVidaEmpleado[0]['NOMBRE'];
            echo $hojaVidaEmpleado[0]['APELLIDO'];
            */
            formularioHojaVidaEmp($hojaVidaEmpleado);
        }
        

    }

?>