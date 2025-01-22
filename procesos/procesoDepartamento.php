<?php
//session_start();
ini_set("display_error", E_ALL);

    require_once ('../class/Empleado.php');
    require_once ('../class/Locacion.php');
    require_once ('../class/Departamento.php');
    //Archivo que define los procesos a utilizar para la tabla de empleados
    //Definicion de 
    //Nota: No incluye el metodo un modificador de acceso ya que solo se aplican a las propiedades y métodos de las clases. No se pueden aplicar directamente a las funciones definidas fuera de una clase.
    //Se recibe como parametro un objeto de la clase Empleado
    
    
    
?>
    
    
    <?php
    //Funcion para imprimir la tabla de empleados resumida
    function tablaDepartamentosResumen(/*$listaDepartamentos*/){ 
        $departamento = new Departamento();
        $listaDepartamentos = $departamento->consultarDepartamentosResumen();    
    ?>
    <div class="table-responsive">
        <table id="tabla_departamentos" class="table table-striped table-striped table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                            <th scope="col"> Acciones </th>
                    <?php
                        //Impresion de cabecera de la tabla resumen de empleados
                        foreach($listaDepartamentos[0] as $indice=>$valor) :?>
                            <th scope="col"><?php echo $indice;?></th>
                    <?php endforeach ?>
                            
                </tr>
            </thead>
            
            <tbody>
                <?php 
                //Impresion de datos de los empleados
                foreach($listaDepartamentos as $fila) :?>
                    <tr>
                        <td scope="row">    
                                <a href="#" onclick="peticionDepartamento('actualizar.php', <?php echo $fila['DEPARTAMENTO_ID'] ?> ); return false;"> <?php  echo 'Detalles '//.$fila['DEPARTAMENTO_ID'] //echo var_dump($fila) ?> </a>
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
        //Imprimir formulario de Actualizacion de Departamento //Recibe un arreglo asociativo de parametro para llenar el formulario
        function formularioActualizarDepartamento($departamentoBuscado){
            //Creacion de objetos mediante los cuales se accedera a los metodos de busqueda y consulta de gerente, trabajo y departamentos
            $gerente = new Empleado(); //Permite acceder al metodo de listado de gerentes para la lista desplegable
            $locacion = new Locacion();   //Permite acceder al metodo de listado de las locaciones para la lista desplegable
            $departamento = new Departamento(); //Permite acceder al metodo de listado de departamentos para la lista desplegable
            //Recuperar listado de gerentes
            $listaGerentes = $gerente->consultarGerentes();
            //Recuperar listado de puestos de trabajo
            $listaLocaciones = $locacion->consultarListaLocaciones();
            //Recuperar Listado de departamentos
            //$listaDepartamentos = $departamento->consultarListaDepartamentos();
            
            //echo var_dump($empleadoBuscado);
        ?>
            <div class="alert alert-info" role="alert">
                Detalles de departamento.
                <br>
                Modifique los datos que considere necesarios.
            </div>


            <form method = "POST" action="actualizar.php" onsubmit="return validarFormulario()">
                <div class="form-group">
                    <div class="form-group">
                        <label hidden> Departamento ID </label>
                        <input type="hidden" class="form-control" id = "departamento_id" name = "departamento_id" value="<?php echo $departamentoBuscado[0]['DEPARTAMENTO_ID'] ?>" readonly>
                        </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre"> Departamento </label>
                        <input type="text" class="form-control" id  = "departamento" name = "departamento" value="<?php echo $departamentoBuscado[0]['DEPARTAMENTO'] ?>" readonly >
                    </div>
                    <div id="validacionDepartamento" name = "validacionDepartamento" class=""></div>
                </div>



                <div class="form-row">
                    <!-- Listado de Gerentes-->
                    <div class="form-group col-md-12">
                    <label for="gerente_id">Gerente </label>
                    <select class="form-control" id = "gerente_id" name = "gerente_id" onchange="validarGerente()" >
                        <!-- Validacion de si el id del gerente es nulo o no -->
                        <option value="<?php if( isset($departamentoBuscado[0]['GERENTE_ID']) && $departamentoBuscado[0]['GERENTE_ID'] != null ){ /*Valor no nulo*/ echo $departamentoBuscado[0]['GERENTE_ID']; }else{ /**Valor NULO */ echo 'null';  } ?>" selected>Seleccione un Gerente...</option>
                        <?php 
                            
                            foreach ($listaGerentes as $gerente) : ?>
                            <option  value="<?php echo $gerente['GERENTE_ID']?>" <?php if ($departamentoBuscado[0]['GERENTE_ID'] == $gerente['GERENTE_ID']) { echo 'selected'; }?> >
                                <?php if( is_null($gerente['DEPARTAMENTO']) ) {echo $gerente['GERENTE']; } else { echo $gerente['GERENTE'].' de '.$gerente['DEPARTAMENTO']; } ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <div id="validacionGerente" name = "validacionGerente" class=""></div>
                    </div>

                    


                    <!-- Listado de Locacions-->
                    <div class="form-group col-md-12">
                        <label for="departamento_id">Locacion </label>
                        <select class="form-control" id = "locacion_id" name = "locacion_id" onchange="validarLocacion()" >
                            <!-- Validacion de si el id del LOCACION es nulo o no -->
                            <option class="bg-danger text-white" value="<?php if( isset($departamentoBuscado[0]['LOCACION_ID']) && $departamentoBuscado[0]['LOCACION_ID'] != null ){/* Valor NO NULO*/ echo $departamentoBuscado[0]['LOCACION_ID']; }else{ /*Valor NULO*/ echo 'null'; } ?>" selected>Seleccione un Departamento...</option>
                            <?php 
                                
                                foreach ($listaLocaciones as $locacion) : ?>
                                <option class=""
                                        value="<?php echo $locacion['LOCACION_ID']?>" <?php if ($departamentoBuscado[0]['LOCACION_ID'] == (int)$locacion['LOCACION_ID'] ) { echo 'selected'; }?> >
                                    <?php echo $locacion['LOCACION_DIRECCION']?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div id="validacionLocacion" name = "validacionLocacion" class=""></div>
                        </div>
                </div>

                <div class="form-row">

                    <div class="form-group">

                    </div>
                    <div class="form-group">

                    </div>
                </div>
     
                    <input class="btn btn-primary my-1" type ="submit" value="Actualizar">
                
            </form>
        <?php
        }
    ?>