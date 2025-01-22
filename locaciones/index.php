<?php 
ini_set("display_errors", E_ALL);
    //Se añaden los archivos necesarios para el funcionamiento de la pagina
    include_once ('../template/header.php');

    require_once ('../class/Locacion.php');
    require_once ('../procesos/procesoLocacion.php');
    $locacion = new Locacion();


    //>>>>>>>>>>>> Prueba de consulta de vista de Locaciones
    $listaLocaciones = $locacion->consultarLocacionesResumen();
    //echo var_dump($listaLocaciones);
   
?>
    <!-- Contenedor principal -->
    
        <?php
            //Impresion de tabla con la busqueda del locacion
            
        ?>

        <div class="container-fluid">
            <h1>Locaciones</h1>
        </div>


        
        <div id="contenedorTabla_Formulario" class="container-fluid">
            <div class="row">
                <div class="col">
                    <?php
                        //Impresion de tabla resumen de LOCACIONES. Se envia como parametro el array asociativo recuperado de la consulta
                        tablaLocacionesResumen($listaLocaciones);
                    ?>
                </div>

                <div id="contenedor_01" class="col table-responsive">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Seccion de detalles de locaciones.</h4>
                                <p>Para ver los detalles de una locacion, y modificar algunos atributos, de clic en "detalles" correspondiente a la locacion deseada de la tabla a la izquierda.</p>
                            <hr>
                            <p class="mb-0"></p>
                        </div>
                </div>
            </div>
        </div>
        

        
    </div>   <!-- Div Principal -->

    </body>
</html>