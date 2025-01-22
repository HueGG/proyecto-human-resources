<?php 
    
    ini_set("display_errors", E_ALL);

    //Se añaden los archivos necesarios para el funcionamiento de la pagina
    include_once ('../template/headerEmpleado.php');
    require_once ('../class/Empleado.php');
    require_once ('../class/HojaVida.php');
    require_once ('../procesos/procesoHojaVida.php');
    //require_once ('../procesos/procesoEmpleado.php');
    //
    
    $empleado = new Empleado();
    $hojaVida = new HojaVida();
    if (isset($_SESSION['USUARIO_ID'])){
        $empleado->setEmployeeId($_SESSION['USUARIO_ID']);
        $datosEmpleado = $empleado->buscarEmpleado();
        //$hojaVida->setEmployeeId(105);
        $hojaVida->setEmployeeId($_SESSION['USUARIO_ID']);
        $datosHojaVida = $hojaVida->buscarHojaVidaEmpleado();
        
    }else{

    }
    /*
    echo $_SESSION['USUARIO_ID'].'<br>';
    echo '<br>Datos de hoja de vida <br>';
    echo var_dump($datosHojaVida);
    echo '<br>';
    echo (isset($datosHojaVida[0]['FECHA_NACIMIENTO']))?$datosHojaVida[0]['FECHA_NACIMIENTO']: 'No existe esta variable';
    echo '<br>';
    echo 'Datos del empleado <br>';
    echo var_dump($datosEmpleado);
    */
    $empleado = null;
    $hojaVida = null;
    
   
?>
    <!-- Continuacion de Contenedor principal -->
            <?php  if(isset($_GET['validacionError']) && isset($_GET['tipoError']) && isset($_GET['mensaje'])){
                        ?>
                        <div class="container-fluid">
                            
                                <?php mensajeError($_GET['validacionError'], $_GET['tipoError'], $_GET['mensaje']); ?>
                            
                        </div>
                        <?php
            }else{

            } ?>
    
            <div class="container my-3 border">

            <p class="h2 text-center">Hoja de vida</p>

            <br/>
            
            <form id="formularioActualizarHojaVida" method="POST" action="actualizar.php">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID del empleado:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="Ingresa el ID" value="<?php echo $_SESSION['USUARIO_ID']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <label for="nombre">Nombres:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre o nombres" onkeyup="validarNombreEmpleado()" 
                            value="<?php 
                            /*Impresion de valores */ 
                            echo isset($datosEmpleado[0]['NOMBRE']) ? $datosEmpleado[0]['NOMBRE'] : '' ;?>" readonly>
                            <div id="validacionNombre" name = "validacionNombre" class=""> </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa los apellidos" onkeyup="validarApellido()" value="<?php 
                            /*Impresion de valores */ 
                            echo isset($datosEmpleado[0]['APELLIDO']) ? $datosEmpleado[0]['APELLIDO'] : '' ;?>" readonly >
                            <div id="validacionApellido" name = "validacionApellido" class=""> </div>
                    </div>
                </div>
                
                <div class="form-group row">
                <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa el correo electrónico" onkeyup="validarCorreo()" value="<?php 
                            /*Impresion de valores */ 
                            echo isset($datosEmpleado[0]['CORREO']) ? $datosEmpleado[0]['CORREO'] : '' ;?>" readonly >
                            <div id="validacionCorreo" name = "validacionCorreo" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Número de Teléfono:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="<?php echo (is_null($datosEmpleado[0]['TELEFONO']) || $datosEmpleado[0]['TELEFONO'] == "") ? 'No cuenta con telefono aun' : '' ?> " onkeyup="validarTelefono()" value="<?php 
                            /*Impresion de valores */ 
                            echo ( is_null($datosEmpleado[0]['TELEFONO']) || $datosEmpleado[0]['TELEFONO'] == "") ? '' : $datosEmpleado[0]['TELEFONO'] ?>" readonly >
                            <div id="validacionTelefono" name = "validacionTelefono" class=""> </div>
                </div>
                </div>
                
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" onchange="validarFormularioHojaVida()" value="<?php echo isset($datosHojaVida[0]['FECHA_NACIMIENTO']) ? $datosHojaVida[0]['FECHA_NACIMIENTO'] : ''; ?>" required>
                    <div id="validacionFecha" name = "validacionFecha" class="">   </div>

                </div>
                <div class="form-group col-sm-6">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select class="form-control" id="nacionalidad" name="nacionalidad" onchange="validarFormularioHojaVida()" value="
                    <?php /*Impresion de valores dependiendo de si hay o no error*/ 
                        echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosHoja['validacionNacionalidad'] : ''; ?>" >
                    <option selected>Selecciona una opción</option >
                    <option value="AR"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'AR') ? 'selected' :'' ;?>  >Argentina</option>
                    <option value="BR"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'BR') ? 'selected' :'' ;?>  >Brasil</option>
                    <option value="CA"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'CA') ? 'selected' :'' ;?>  >Canadá</option>
                    <option value="CN"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'CN') ? 'selected' :'' ;?>  >China</option>
                    <option value="DE"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'DE') ? 'selected' :'' ;?>  >Alemania</option>
                    <option value="ES"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'ES') ? 'selected' :'' ;?>  >España</option>
                    <option value="FR"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'FR') ? 'selected' :'' ;?>  >Francia</option>
                    <option value="IN"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'IN') ? 'selected' :'' ;?>  >India</option>
                    <option value="JP"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'JP') ? 'selected' :'' ;?>  >Japón</option>
                    <option value="JP"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'MX') ? 'selected' :'' ;?>  >México</option>
                    <option value="US"   <?php echo (isset($datosHojaVida[0]['NACIONALIDAD']) && $datosHojaVida[0]['NACIONALIDAD'] == 'US') ? 'selected' :'' ;?>  >Estados Unidos</option>
                    </select>
                    <div id="validacionNacionalidad" name = "validacionNacionalidad" class="">   </div>
                </div>
                </div>
                
                <div class="form-group row">
                <label for="estado_civil" class="col-sm-2 col-form-label">Estado civil:</label>
                <div class="col-sm-10">
                <select class="form-control" id="estadoCivil" name="estadoCivil" class="estadoCivil" onchange="validarFormularioHojaVida()" value="
                    <?php /*Impresion de valores dependiendo de si hay o no error*/ 
                        echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosHoja['validacionEstadoCivil'] : ''; ?>" >
                    <option selected>Selecciona una opción</option>
                    <option value="SOLTERO"      <?php echo (isset($datosHojaVida[0]['EDO_CIVIL']) && $datosHojaVida[0]['EDO_CIVIL'] == 'SOLTERO') ? 'selected' :'' ;?>    >Soltero</option>
                    <option value="CASADO"       <?php echo (isset($datosHojaVida[0]['EDO_CIVIL']) && $datosHojaVida[0]['EDO_CIVIL'] == 'CASADO') ? 'selected' :'' ;?>    >Casado</option>
                    <option value="UNION_LIBRE"  <?php echo (isset($datosHojaVida[0]['EDO_CIVIL']) && $datosHojaVida[0]['EDO_CIVIL'] == 'UNION_LIBRE') ? 'selected' :'' ;?>    >Union libre</option>
                    </select>
                    <div id="validacionEstadoCivil" name = "validacionEstadoCivil" class="">   </div>
                </div>
                </div>

                <div class="form-group row">
                <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                <div class="col-sm-10">
                    <textarea name="direccion" id="direccion" class="form-control" rows="3" placeholder="Escribe tu direccion..." onchange="validarFormularioHojaVida()" ><?php echo isset($datosHojaVida[0]['DIRECCION']) ? $datosHojaVida[0]['DIRECCION'] : '';?></textarea>
                    <div id="validacionDireccion" name = "validacionDireccion" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="estudios" class="col-sm-2 col-form-label">Estudios:</label>
                <div class="col-sm-10">
                    <textarea name="estudios" id="estudios" class="form-control" rows="3" placeholder="Describe brevemente tus estudios..." onchange="validarFormularioHojaVida()" ><?php echo isset($datosHojaVida[0]['ESTUDIOS']) ? $datosHojaVida[0]['ESTUDIOS'] : '';  ?></textarea>
                    <div id="validacionEstudios" name = "validacionEstudios" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="idiomas" class="col-sm-2 col-form-label">Idiomas:</label>
                <div class="col-sm-10">
                    <textarea name="idiomas" id="idiomas" class="form-control" rows="3" placeholder="Describe brevemente los idiomas que dominas..." onchange="validarFormularioHojaVida()" ><?php echo  isset($datosHojaVida[0]['IDIOMAS']) ? $datosHojaVida[0]['IDIOMAS'] : '';  ?></textarea>
                    <div id="validacionIdiomas" name = "validacionIdiomas" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary form-control">Enviar</button>
                </div>
                </div>
            </form>
            
            </div>

        
    </div>   <!-- Div Principal -->

    </body>
</html>