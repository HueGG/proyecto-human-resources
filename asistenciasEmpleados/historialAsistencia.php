<?php 
    session_start();
    ini_set("display_errors", E_ALL);

    require_once ('../class/Asistencia.php');
    require_once ('../class/Empleado.php');
    require_once ('../procesos/procesoAsistenciaEmp.php');
    

    $validarEmpId = isset($_POST['empleado_id']);

    if($validarEmpId){
        //Se recibe el id de empleado
        $asistencia = new Asistencia();
        $asistencia->setEmployeeId(intval($_POST['empleado_id']));
        $historialAsistencias = $asistencia->consultarHistorialAsistencias();
        $asistencia = null;

        $empleado = new Empleado();
        $empleado->setEmployeeId(intval($_POST['empleado_id']));
        $datosEmpleado = $empleado->buscarEmpleado();
        $empleado = null;
        

        //echo var_dump($historialAsistencias);
        if(empty($historialAsistencias)){
            mensajeSinAsistencias($datosEmpleado[0]['NOMBRE'], $datosEmpleado[0]['APELLIDO']);
        }else{
            tablaAsistenciasEmp($historialAsistencias);
        }
        

    }

?>