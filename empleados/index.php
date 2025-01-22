<?php 
    
    ini_set("display_errors", E_ALL);

    //Se añaden los archivos necesarios para el funcionamiento de la pagina
    include_once ('../template/header.php');

    require_once ('../class/Empleado.php');
    require_once ('../procesos/procesoEmpleado.php');
    
    
   
?>
    <!-- Contenedor principal -->
    
        <?php
            //Impresion de tabla con la busqueda del empleado
            //tablaEmpleadoBuscado($empleadoBuscado);
        ?>

        <div class="container-fluid">
            <h1>Empleados</h1>
        </div>

        
        
        
        <div id="contenedorTabla_Formulario" class="container-fluid">
            
            <div class="row">
                <div id="contenedor_tabla_resumen" class="col table-responsive">
                    <?php
                        //Impresion de tabla resumen de empleados. Se envia como parametro el array asociativo recuperado de la consulta
                        
                        tablaEmpleadosResumen();
                    ?>
                </div>

                <div id="contenedor_01" class="col table-responsive">
                    <?php 
                        //Impresion de formularo para guardar nuevo registro
                        //En caso de que se reciba un error, se 
                        //Existe error y no se pudo vvalidar la actualizacion (No se realizao UPDATE)
                        /*
                        echo (empty($_COOKIE)) ? empty($_COOKIE).'Cookie Vacia' : 'Contiene datos';
                        echo '<br>Cokkie es: <br>';
                        echo var_dump($_COOKIE);
                        echo '<br>Vengo de la reidreecion CURL con POST: <br>';
                        echo var_dump($_POST);
                        */
                        
                        if( (isset($_POST['validacionErrorActualizar'])) && ( !$_POST['validacionErrorActualizar'] )) {
                            //echo 'Tengo un error<br>';
                            $datosActualizarEmpleado = $_POST; //Se recuperan los datos por métod POST
                            //echo var_dump($datosActualizarEmpleado);
                            
                            //echo var_dump($datosActualizarEmpleado);
                            formularioActualizarEmp($datosActualizarEmpleado);
                            
                        }else if((isset($_POST['validacionErrorActualizar'])) && ( $_POST['validacionErrorActualizar'] ) ){
                            //eRROR 0: Validacion TRUE: Si se realizao el UPDATE
                            if (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') {
                                mensajeError($_POST['validacionErrorActualizar'], $_POST['tipoError'], $_POST['mensaje']);
                                formularioRegistrarEmp();
                            }
                            
                        }else{
                            if (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') {
                                formularioRegistrarEmp();
                            }
                            
                        }
                        
                    ?>    
                </div>
            </div>
        </div>
        

        
    </div>   <!-- Div Principal -->

    </body>
</html>