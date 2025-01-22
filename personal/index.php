<?php 
        ini_set("display_errors", E_ALL);

        //Se añaden los archivos necesarios para el funcionamiento de la pagina
        include_once ('../template/headerEmpleado.php');
        require_once ('../class/Asistencia.php');
        require_once ('../procesos/procesoAsistenciaEmp.php');

        $asistencia = new Asistencia();

        if(isset($_SESSION['USUARIO_ID'])){
            $asistencia->setEmployeeId($_SESSION['USUARIO_ID']);
            //$asistencia->setEmployeeId(238);
            $historialAsistencia = $asistencia->consultarHistorialAsistencias();
            //$historialAsistencia = $asistencia->consultarHistorialAsistencias();
        }else{

        }
        
        
        
?>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="contenedor_reloj">
                <h1 name="time" id="TIEMPO">00:00:00</h1>
                <p name="date" id="date">Fecha</p>
            </div>
            <?php  if(isset($_GET['validacionError']) && isset($_GET['tipoError']) && isset($_GET['mensaje'])){
                        mensajeError($_GET['validacionError'], $_GET['tipoError'], $_GET['mensaje']);
            }else{

            } ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card px-3 py-4 border rounded text-center">
                <br/>
                <p class="h1">Registro de asistencia y salida</p>
                <p class="h3"><?php echo (isset($_SESSION['NOMBRE'])) ? 'Bienvenido(a) '.$_SESSION['NOMBRE'].'<br>Registre su entrada y salida cuando sea necesario' : 'Bienvenido(a)' ;?></p>
                <!-- <p class="h3">ID NOMBRE</p> -->
                <br/>
                <div class="row">
                    <div class="col">
                        <div class="w-100">
                            <br/>
                                <form method="POST" action="actualizar.php">
                                    <input type="text" id="entrada_empleado_id" name="entrada_empleado_id" style="display: none;" value="<?php echo isset($_SESSION['USUARIO_ID']) ? $_SESSION['USUARIO_ID'] : '' ; ?>">
                                    <input type="submit" value="Entrada" class="btn btn-outline-success w-100">
                                </form>
                                    
                            <br/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="w-100">
                            <br/>
                                <form method="POST" action="actualizar.php">
                                    <input type="text" id="salida_empleado_id" name="salida_empleado_id" style="display: none;" value="<?php echo isset($_SESSION['USUARIO_ID']) ? $_SESSION['USUARIO_ID'] : '' ; ?>">
                                    <input type="submit" value="Salida" class="btn btn-outline-danger w-100">
                                </form>
                                
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/asistencia.js"></script>

    <!-- Tabla que muestra el hsitorial de asistencia del empleado -->
    
    <?php 
        //Validar si existe un historial de asistencias
        if ( !empty($historialAsistencia) ){
             // El historial de asistencias no está vacío
             tablaAsistencias($historialAsistencia);
        }else{
            //// El historial de asistencias está vacío
            echo 'Por el momento, no cuenta con un historial de asistencias';
        }
    
    ?>


    <!---->


</div>





<?php 
    function tablaAsistencias($historialAsistencia){
        ?>
            <div class="table-responsive">
                    <table class="table table-striped table-striped table-sm table-hover">
                        
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                    //Impresion de cabecera de la tabla resumen de empleados
                                    foreach($historialAsistencia[0] as $indice=>$valor) :?>
                                        <th scope="col"><?php echo $indice;?></th>
                                <?php endforeach ?>
                                        
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            //Impresion de datos de los empleados
                            foreach($historialAsistencia as $fila) :?>
                                <tr>

                                    <?php foreach($fila as $valor) :?>
                                        <td scope="row"> <?php echo $valor; ?> </td>
                                    <?php endforeach ?>
                                        
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                </table> 
                </div>
        <?php
    }
?>











    
</body>
</html>


