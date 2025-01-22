<?php 
ini_set("display_errors", E_ALL);
    //Se añaden los archivos necesarios para el funcionamiento de la pagina
    include_once ('../template/header.php');

    require_once ('../class/Historico.php');
    require_once ('../procesos/procesoHistorico.php');
    $historico = new Historico();
    
    //Recuperar tabla del historico
    $listaHistorico = $historico->consultarHistoricoResumen();
    //echo var_dump($listaHistorico);
   
?>
        <div class="container-fluid">
            <h1>Historico</h1>
        </div>
    
        <?php
            //Impresion de tabla con la busqueda del Historico
            
        ?>
        
        <div id="contenedorTabla_Formulario" class="container-fluid">
            <div class="row">
                <div class="col">
                    <?php
                        //Impresion de tabla del historico.Se envia como parametro el array asociativo recuperado de la consulta del historico de empleados
                        tablaHistoricoResumen($listaHistorico);
                    ?>
                </div>

            </div>
        </div>
        

        
    </div>   <!-- Div Principal -->

    </body>
</html>