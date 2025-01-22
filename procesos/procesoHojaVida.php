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
    function tablaEmpleadosResumenHojaVida(  /*$listaEmpleados*/  ){ 
        

        $empleado = new Empleado();
        $listaEmpleados = $empleado->consultarEmpleadosResumen();    
    ?>

    <div class="table-responsive">
        <table id="tabla_hojavida" class="table table-striped table-striped table-sm table-hover">
            
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
                                <a href="#" onclick="peticionHojaVida('consultarHojaVida.php', <?php echo $fila['EMPLEADO_ID'] ?> ); return false;"> <?php  echo 'Detalles '//.$fila['EMPLEADO_ID'] //echo var_dump($fila) ?> </a>
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
        function formularioHojaVidaEmp($hojaVidaEmpleado){ 
         
    ?>
            <div class="container my-3 border">

                <p class="h2 text-center">Hoja de vida <?php echo (isset($hojaVidaEmpleado[0]['NOMBRE']) && isset($hojaVidaEmpleado[0]['APELLIDO'])) ? ' de "'.$hojaVidaEmpleado[0]['NOMBRE'].' '.$hojaVidaEmpleado[0]['APELLIDO'].'"' : ''; ?> </p>

                <br/>

                    <form id="formularioActualizarHojaVida" method="POST" action="hojaVida.php">
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">ID del empleado:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="Ingresa el ID" value="<?php echo $hojaVidaEmpleado[0]['EMPLEADO_ID']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label for="nombre">Nombres:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre o nombres"  
                                    value="<?php 
                                    /*Impresion de valores */ 
                                    echo isset($hojaVidaEmpleado[0]['NOMBRE']) ? $hojaVidaEmpleado[0]['NOMBRE'] : '' ;?>" readonly>
                                    <div id="validacionNombre" name = "validacionNombre" class=""> </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa los apellidos"  value="<?php 
                                    /*Impresion de valores */ 
                                    echo isset($hojaVidaEmpleado[0]['APELLIDO']) ? $hojaVidaEmpleado[0]['APELLIDO'] : '' ;?>" readonly >
                                    <div id="validacionApellido" name = "validacionApellido" class=""> </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa el correo electrónico"  value="<?php 
                                    /*Impresion de valores */ 
                                    echo isset($hojaVidaEmpleado[0]['CORREO']) ? $hojaVidaEmpleado[0]['CORREO'] : '' ;?>" readonly >
                                    <div id="validacionCorreo" name = "validacionCorreo" class=""> </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Número de Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="<?php echo (is_null($hojaVidaEmpleado[0]['TELEFONO']) || $hojaVidaEmpleado[0]['TELEFONO'] == "") ? 'No cuenta con telefono aun' : '' ?> " value="<?php 
                                    /*Impresion de valores */ 
                                    echo ( is_null($hojaVidaEmpleado[0]['TELEFONO']) || $hojaVidaEmpleado[0]['TELEFONO'] == "") ? '' : $hojaVidaEmpleado[0]['TELEFONO'] ?>" readonly >
                                    <div id="validacionTelefono" name = "validacionTelefono" class=""> </div>
                        </div>
                        </div>
                        
                        <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo isset($hojaVidaEmpleado[0]['FECHA_NACIMIENTO']) ? $hojaVidaEmpleado[0]['FECHA_NACIMIENTO'] : ''; ?>" readonly >
                            <div id="validacionFecha" name = "validacionFecha" class="">   </div>

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <select class="form-control" id="nacionalidad" name="nacionalidad" onchange="validarNacionalidad()" value="" readonly >
                            <option selected>Selecciona una opción</option >
                            <option value="AR"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'AR') ? 'selected' :'' ;?>  >Argentina</option>
                            <option value="BR"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'BR') ? 'selected' :'' ;?>  >Brasil</option>
                            <option value="CA"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'CA') ? 'selected' :'' ;?>  >Canadá</option>
                            <option value="CN"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'CN') ? 'selected' :'' ;?>  >China</option>
                            <option value="DE"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'DE') ? 'selected' :'' ;?>  >Alemania</option>
                            <option value="ES"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'ES') ? 'selected' :'' ;?>  >España</option>
                            <option value="FR"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'FR') ? 'selected' :'' ;?>  >Francia</option>
                            <option value="IN"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'IN') ? 'selected' :'' ;?>  >India</option>
                            <option value="JP"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'JP') ? 'selected' :'' ;?>  >Japón</option>
                            <option value="JP"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'MX') ? 'selected' :'' ;?>  >México</option>
                            <option value="US"   <?php echo (isset($hojaVidaEmpleado[0]['NACIONALIDAD']) && $hojaVidaEmpleado[0]['NACIONALIDAD'] == 'US') ? 'selected' :'' ;?>  >Estados Unidos</option>
                            </select>
                            <div id="validacionNacionalidad" name = "validacionNacionalidad" class="">   </div>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="estado_civil" class="col-sm-2 col-form-label">Estado civil:</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="estadoCivil" name="estadoCivil" class="estadoCivil" oninput="validarEstadoCivil()" value=""  readonly>
                            <option selected>Selecciona una opción</option>
                            <option value="SOLTERO"      <?php echo (isset($hojaVidaEmpleado[0]['EDO_CIVIL']) && $hojaVidaEmpleado[0]['EDO_CIVIL'] == 'SOLTERO') ? 'selected' :'' ;?>    >Soltero</option>
                            <option value="CASADO"       <?php echo (isset($hojaVidaEmpleado[0]['EDO_CIVIL']) && $hojaVidaEmpleado[0]['EDO_CIVIL'] == 'CASADO') ? 'selected' :'' ;?>    >Casado</option>
                            <option value="UNION_LIBRE"  <?php echo (isset($hojaVidaEmpleado[0]['EDO_CIVIL']) && $hojaVidaEmpleado[0]['EDO_CIVIL'] == 'UNION_LIBRE') ? 'selected' :'' ;?>    >Union libre</option>
                            </select>
                            <div id="validacionEstadoCivil" name = "validacionEstadoCivil" class="">   </div>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                        <div class="col-sm-10">
                            <textarea name="direccion" id="direccion" class="form-control" rows="3" placeholder="Escribe tu direccion..." onkeyup="validarDireccion()" readonly ><?php echo isset($hojaVidaEmpleado[0]['DIRECCION']) ? $hojaVidaEmpleado[0]['DIRECCION'] : '';?></textarea>
                            <div id="validacionDireccion" name = "validacionDireccion" class=""> </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="estudios" class="col-sm-2 col-form-label">Estudios:</label>
                        <div class="col-sm-10">
                            <textarea name="estudios" id="estudios" class="form-control" rows="3" placeholder="Describe brevemente tus estudios..." onkeyup="validarEstudios()" readonly ><?php echo isset($hojaVidaEmpleado[0]['ESTUDIOS']) ? $hojaVidaEmpleado[0]['ESTUDIOS'] : '';  ?></textarea>
                            <div id="validacionEstudios" name = "validacionEstudios" class=""> </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="idiomas" class="col-sm-2 col-form-label">Idiomas:</label>
                        <div class="col-sm-10">
                            <textarea name="idiomas" id="idiomas" class="form-control" rows="3" placeholder="Describe brevemente los idiomas que dominas..." onkeyup="validarIdiomas()" readonly><?php echo  isset($hojaVidaEmpleado[0]['IDIOMAS']) ? $hojaVidaEmpleado[0]['IDIOMAS'] : '';  ?></textarea>
                            <div id="validacionIdiomas" name = "validacionIdiomas" class=""> </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            
                        </div>
                        </div>
                        <div class="col-sm-10 offset-sm-2">
                             <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary form-control">Imprimir</button>
                        </div>
                    </form>
            </div>
            

    
    <?php
    }
    ?>

    <?php
        function mensajeSinAsistencias($nombre, $apellido){
            ?>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Sin hoja de vida</h4>
                        <p>Por el momento, <?php echo $nombre.' '.$apellido;?> no cuenta con una hoja de vida.</p>
                        <hr>
                    <p class="mb-0">Conforme <?php echo $nombre.' '.$apellido;?> realice el registro de su hoja de vida, se mostraran en esta seccion.</p>
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
