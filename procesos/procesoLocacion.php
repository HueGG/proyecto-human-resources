<?php

ini_set("display_error", E_ALL);
    require_once ('../class/Locacion.php');
    require_once ('../class/Pais.php');
    
    //Archivo que define los procesos a utilizar para la tabla de empleados
    //Definicion de 
    //Nota: No incluye el metodo un modificador de acceso ya que solo se aplican a las propiedades y métodos de las clases. No se pueden aplicar directamente a las funciones definidas fuera de una clase.
    //Se recibe como parametro un objeto de la clase Empleado   
    
?>
    
    
    <?php
    //Funcion para imprimir la tabla de LOCACIONES resumida
    function tablaLocacionesResumen($listaLocaciones){ ?>
    <div class="table-responsive">
        <table id="tabla_locaciones" class="table table-striped table-striped table-sm table-hover">
            <thead>
                <tr>
                            <th scope="col"> Acciones </th>
                    <?php
                        //Impresion de cabecera de la tabla resumen de empleados
                        foreach($listaLocaciones[0] as $indice=>$valor) :?>
                            <th scope="col"><?php echo $indice;?></th>
                    <?php endforeach ?>
                            
                </tr>
            </thead>
            
            <tbody>
                <?php 
                //Impresion de datos de los empleados
                foreach($listaLocaciones as $fila) :?>
                    <tr>
                        <td scope="row">    
                                <a href="#" onclick="peticionLocacion('actualizar.php', <?php echo $fila['LOCACION_ID'] ?> ); return false;"> <?php  echo 'Detalles'?> </a>
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
        //Imprimir formulario de Actualizacion de LOCACION //Recibe un arreglo asociativo de parametro para llenar el formulario
        function formularioActualizarLocacion($locacionBuscada){
            //Creacion de objetos mediante los cuales se accedera a los metodos de busqueda y consulta de Los PAISES
            $pais = new Pais(); //Permite acceder al metodo de listado de gerentes para la lista desplegable
            
            //Recuperar listado de PAISES
            $listaPaises = $pais->consultarPaises();
            
            //echo var_dump($empleadoBuscado);
        ?>
            <div class="alert alert-info" role="alert">
                Detalles de locacion.
                <br>
                Modifique los datos que considere necesarios.
            </div>

            <form method = "POST" action="actualizar.php" onsubmit="return validarFormulario()" >
                <div class="form-group">
                    <div class="form-group">
                        <label hidden> Locacion_ID </label>
                        <input type="hidden" class="form-control" id = "locacion_id" name = "locacion_id" value="<?php echo $locacionBuscada[0]['LOCACION_ID'] ?>" readonly>
                        </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="direccion"> Direccion </label>
                        <input type="text" class="form-control" id  = "direccion" name = "direccion" value="<?php echo $locacionBuscada[0]['DIRECCION'] ?>" onchange="validarDireccion()">
                        <div id="validacionDireccion" name = "validacionDireccion" class=""></div>
                    </div>

                    <div class="form-group">
                        <label for="codigo_postal"> Código Postal </label>
                        <input type="text" class="form-control" id = "codigo_postal" name = "codigo_postal" value="<?php echo $locacionBuscada[0]['CODIGO_POSTAL'] ?>" onchange="validarCodigoPostal()" >
                        <div id="validacionCodigoPostal" name = "validacionCodigoPostal" class=""></div>
                    </div>

                    <div class="form-group">
                        <label for="ciudad"> Ciudad </label>
                        <input type="text" class="form-control" id = "ciudad" name = "ciudad" value="<?php echo $locacionBuscada[0]['CIUDAD'] ?>" onchange="validarCiudad()">
                        <div id="validacionCiudad" name = "validacionCiudad" class=""></div>
                    </div>
                </div>

                

                <div class="form-row">
                    <div class="form-group">
                        <label> Estado o Provincia </label>
                        <input type="text" class="form-control" id = "estado_provincia" name = "estado_provincia" value="<?php echo $locacionBuscada[0]['ESTADO_PROVINCIA'] ?>" onchange="validarEstado()">
                        <div id="validacionEstado" name = "validacionEstado" class=""></div>
                    </div>
                    
                    
                    <!-- Listado de Paises-->
                    <div class="form-group col-md-12">
                    <label for="trabajo_id">Pais </label>
                    <select class="form-control" id="pais_id"  name = "pais_id" onchange="validarPais()">
                        <!-- Validacon de si el id de trabajo es nulo o no -->
                        <option value="<?php if ( isset($locacionBuscada[0]['PAIS_ID']) &&  $locacionBuscada[0]['PAIS_ID'] != null ){/*Valor no nulo*/ echo $locacionBuscada[0]['PAIS_ID'];} else{/*Valor nulo*/echo 'null';} ?>" selected>Seleccione un país...</option>
                        <?php 
                            
                            foreach ($listaPaises as $pais) : ?>
                            <option 
                                class=""
                                value="<?php echo $pais['PAIS_ID']?>" <?php if ($locacionBuscada[0]['PAIS_ID'] == $pais['PAIS_ID']) { echo 'selected'; }?> >
                                <?php echo $pais['PAIS'].' '.$pais['PAIS_ID']?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <div id="validacionPais" name = "validacionPais" class=""></div>
                    </div>

                    
                </div>

     
                    <input id= "Actualizar_Loc" class="btn btn-primary my-1" type ="submit" value="Actualizar">
                
            </form>
        <?php
        }
    ?>