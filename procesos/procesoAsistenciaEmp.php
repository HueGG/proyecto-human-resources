<?php


    ini_set("display_error", E_ALL);

    require_once ('../class/Empleado.php');
    
    //Archivo que define los procesos a utilizar para la tabla de empleados
    //Definicion de 
    //Nota: No incluye el metodo un modificador de acceso ya que solo se aplican a las propiedades y métodos de las clases. No se pueden aplicar directamente a las funciones definidas fuera de una clase.
    //Se recibe como parametro un objeto de la clase Empleado

    
?>
<?php
    //Funcion para imprimir la tabla de empleados resumida
    function tablaEmpleadosResumenAsis(  /*$listaEmpleados*/  ){ 
        

        $empleado = new Empleado();
        $listaEmpleados = $empleado->consultarEmpleadosResumen();    
    ?>

    <div class="table-responsive">
        <table id="tabla_Asistencias" class="table table-striped table-striped table-sm table-hover">
            
            <thead class="thead-dark">
                <tr>
                            <th scope="col"> Acciones </th>
                    <?php
                        //Impresion de cabecera de la tabla resumen de empleados
                        foreach($listaEmpleados[0] as $indice=>$valor) :?>
                            <th scope="col"><?php echo $indice;?></th>
                    <?php endforeach ?>
                            
                </tr>
            </thead>
            
            <tbody>
                <?php 
                //Impresion de datos de los empleados
                foreach($listaEmpleados as $fila) :?>
                    <tr>
                        <td scope="row">    
                                <a href="#" onclick="peticionHistorialAsistencia('historialAsistencia.php', <?php echo $fila['EMPLEADO_ID'] ?> ); return false;"> <?php  echo 'Detalles '//.$fila['EMPLEADO_ID'] //echo var_dump($fila) ?> </a>
                        </td>
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




<?php
    //Funcion para imprimir historial de asistencias
        function tablaAsistenciasEmp($historialAsistencias){ 
         
    ?>

    <div class="table-responsive">
        <h3>Asistencias de <?php echo $historialAsistencias[0]['NOMBRE']; ?></h3>
        <table class="table table-striped table-striped table-sm table-hover">
            
            <thead class="thead-dark">
                <tr>
                    <?php
                        //Impresion de cabecera de la tabla resumen de empleados
                        foreach($historialAsistencias[0] as $indice=>$valor) :?>
                            <th scope="col"><?php echo $indice;?></th>
                    <?php endforeach ?>
                            
                </tr>
            </thead>
            
            <tbody>
                <?php 
                //Impresion de datos de los empleados
                foreach($historialAsistencias as $fila) :?>
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

    <?php
        function mensajeSinAsistencias($nombre, $apellido){
            ?>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Sin asistencias</h4>
                        <p>Por el momento, <?php echo $nombre.' '.$apellido;?> no cuenta con asistencias registradas.</p>
                        <hr>
                    <p class="mb-0">Conforme <?php echo $nombre.' '.$apellido;?> realice el registro de sus entradas y salidas, se mostraran en esta seccion.</p>
                </div>
            <?php
        }

    ?>
    

    <?php 
        function reloj(){          
            ?>
            <div class="contenedorReloj">
                <div class="widgetReloj">
                    <div class="fecha">
                    <p id="diaSemana" class="diaSemana"></p>
                    <p id="dia" class="dia"></p>
                    <p>de</p>
                    <p id="mes" class="mes"></p>
                    <p>del</p>
                    <p id="anio" class="anio"></p>
                    </div>
                    <div class="reloj">
                    <p id="horas" class="horas"></p>
                    <p>:</p>
                    <p id="minutos" class="minutos"></p>
                    <p>:</p>
                    <div class="cajaSegundos">
                        <p id="ampm" class="ampm"></p>
                        <p id="segundos" class="segundos"></p>
                    </div>
                    </div>
                </div>
            </div>
            <?php
        }
    
    ?>

<?php 
    //Funcion que imprime mensaje de error
    function mensajeError($validacionError, $tipoError, $mensaje){
    ?>
    <div class="<?php echo ((boolval($validacionError))) ? 'alert alert-success' : 'alert alert-warning';?> alert-dismissible fade show" role="alert">
        <strong> <?php echo ((boolval($validacionError))) ? 'Operacion exitosa' : 'Hubo un error'; ?> </strong> <?php echo  (boolval($validacionError)? '' :'Error '.$tipoError).': '.$mensaje ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

    <?php
    }
?>
