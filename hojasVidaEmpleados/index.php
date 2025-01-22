<?php 
    
    ini_set("display_errors", E_ALL);

    //Se añaden los archivos necesarios para el funcionamiento de la pagina
    include_once ('../template/header.php');
    require_once ('../class/Empleado.php');
    
    require_once ('../procesos/procesoHojaVida.php');
    
   
?>
    <!-- Contenedor principal -->
    
        <?php
            //Impresion de tabla con la busqueda del empleado
            //tablaEmpleadoBuscado($empleadoBuscado);
        ?>

        <div class="container-fluid">
            <h1>Hojas de vida</h1>
        </div>

        
        
        
        <div id="contenedorTabla_Formulario" class="container-fluid">
            
            <div class="row">
                <div id="contenedor_tabla_resumen" class="col table-responsive">
                    <?php
                        //Impresion de tabla resumen de empleados. Se envia como parametro el array asociativo recuperado de la consulta
                        
                        tablaEmpleadosResumenHojaVida();
                    ?>
                </div>

                <div id="contenedor_01" class="col table-responsive">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Hoja de vida.</h4>
                                <p>Para ver la hoja de vida de un empleado, de clic en "detalles" correspondiente al empleado deseado de la tabla a la izquierda.</p>
                            <hr>
                            <p class="mb-0"></p>
                        </div>  
                </div>
            </div>
        </div>
        

        
    </div>   <!-- Div Principal -->

    </body>
</html>