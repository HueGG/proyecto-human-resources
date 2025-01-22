<?php 
    ini_set("display_errors", E_ALL);
    require_once ('../class/Historico.php');
    

?>

<!--    FUNCIONES    -->

<?php


    //Funcion para imprimir la tabla del historico de los empleados
    function tablaHistoricoResumen($listaHistorico){ ?>
    <div class="table-responsive">
        <table id="tabla_historico" class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <?php
                        //Impresion de cabecera de la tabla del historico
                        foreach($listaHistorico[0] as $indice=>$valor) :?>
                            <th scope="col"><?php echo $indice;?></th>
                    <?php endforeach ?>
                            
                </tr>
            </thead>
            
            <tbody>
                <?php 
                //Impresion de datos del historico
                foreach($listaHistorico as $fila) :?>
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