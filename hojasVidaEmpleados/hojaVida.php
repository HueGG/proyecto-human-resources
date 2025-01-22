<?php 
ob_start();
?>

<?php 
    require_once ('../class/HojaVida.php');
    require_once ('../class/Empleado.php');
    require_once ('../procesos/procesoHojaVida.php');

    $hojaVida = new HojaVida();
    $hojaVida->setEmployeeId(intval($_POST['empleado_id']));
    $hojaVidaEmpleado = $hojaVida->buscarHojaVidaEmpleado();
    $hojaVida = null;
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .container {
        margin: 15px auto;
        max-width: 700px;
        padding: 15px;
        border: 1px solid #ccc;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        width: 90%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-primary {
        width: 90%;
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        border: none;
    }

</style>

</head>
<body>
    <?php ?>
        <div class="container my-3 border">
        <center>
        <p class="h2 text-center">Hoja de vida <?php echo (isset($hojaVidaEmpleado[0]['NOMBRE']) && isset($hojaVidaEmpleado[0]['APELLIDO'])) ? ' de "'.$hojaVidaEmpleado[0]['NOMBRE'].' '.$hojaVidaEmpleado[0]['APELLIDO'].'"' : ''; ?> </p>
        </center>
        <br/>

            <form id="formularioActualizarHojaVida" method="POST" action="hojaVida.php">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID del empleado:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="Ingresa el ID" value="<?php echo $hojaVidaEmpleado[0]['EMPLEADO_ID']?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-sm-6">
                        <label for="nombre">Nombres:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre o nombres"  
                            value="<?php 
                            /*Impresion de valores */ 
                            echo isset($hojaVidaEmpleado[0]['NOMBRE']) ? $hojaVidaEmpleado[0]['NOMBRE'] : '' ;?>" >
                            <div id="validacionNombre" name = "validacionNombre" class=""> </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa los apellidos"  value="<?php 
                            /*Impresion de valores */ 
                            echo isset($hojaVidaEmpleado[0]['APELLIDO']) ? $hojaVidaEmpleado[0]['APELLIDO'] : '' ;?>"  >
                            <div id="validacionApellido" name = "validacionApellido" class=""> </div>
                    </div>
                </div>
                
                <div class="form-group row">
                <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="correo" id="correo" placeholder="Ingresa el correo electrónico"  value="<?php 
                            /*Impresion de valores */ 
                            echo isset($hojaVidaEmpleado[0]['CORREO']) ? $hojaVidaEmpleado[0]['CORREO'] : '' ;?>"  >
                            <div id="validacionCorreo" name = "validacionCorreo" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Número de Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="<?php echo (is_null($hojaVidaEmpleado[0]['TELEFONO']) || $hojaVidaEmpleado[0]['TELEFONO'] == "") ? 'No cuenta con telefono aun' : '' ?> " value="<?php 
                            /*Impresion de valores */ 
                            echo ( is_null($hojaVidaEmpleado[0]['TELEFONO']) || $hojaVidaEmpleado[0]['TELEFONO'] == "") ? '' : $hojaVidaEmpleado[0]['TELEFONO'] ?>"  >
                            <div id="validacionTelefono" name = "validacionTelefono" class=""> </div>
                </div>
                </div>
                
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                    <input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo isset($hojaVidaEmpleado[0]['FECHA_NACIMIENTO']) ? $hojaVidaEmpleado[0]['FECHA_NACIMIENTO'] : ''; ?>"  >
                    <div id="validacionFecha" name = "validacionFecha" class="">   </div>

                </div>
                <div class="form-group col-sm-6">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select class="form-control" id="nacionalidad" name="nacionalidad" onchange="validarNacionalidad()" value=""  >
                    
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
                <select class="form-control" id="estadoCivil" name="estadoCivil" class="estadoCivil" oninput="validarEstadoCivil()" value=""  >
                    
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
                    <textarea name="direccion" id="direccion" class="form-control" rows="3" placeholder="Escribe tu direccion..." onkeyup="validarDireccion()"  ><?php echo isset($hojaVidaEmpleado[0]['DIRECCION']) ? $hojaVidaEmpleado[0]['DIRECCION'] : '';?></textarea>
                    <div id="validacionDireccion" name = "validacionDireccion" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="estudios" class="col-sm-2 col-form-label">Estudios:</label>
                <div class="col-sm-10">
                    <textarea name="estudios" id="estudios" class="form-control" rows="3" placeholder="Describe brevemente tus estudios..." onkeyup="validarEstudios()"  ><?php echo isset($hojaVidaEmpleado[0]['ESTUDIOS']) ? $hojaVidaEmpleado[0]['ESTUDIOS'] : '';  ?></textarea>
                    <div id="validacionEstudios" name = "validacionEstudios" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="idiomas" class="col-sm-2 col-form-label">Idiomas:</label>
                <div class="col-sm-10">
                    <textarea name="idiomas" id="idiomas" class="form-control" rows="3" placeholder="Describe brevemente los idiomas que dominas..." onkeyup="validarIdiomas()" ><?php echo  isset($hojaVidaEmpleado[0]['IDIOMAS']) ? $hojaVidaEmpleado[0]['IDIOMAS'] : '';  ?></textarea>
                    <div id="validacionIdiomas" name = "validacionIdiomas" class=""> </div>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    
                </div>
                </div>
            </form>
    </div>

    
</body>
</html>


<?php 

    $html=ob_get_clean();

    require_once '../libreria/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);
    $dompdf ->loadHtml($html);
    $dompdf -> setPaper('letter');
     $dompdf -> render();
     $dompdf -> stream("HOJAVIDA_.pdf", array("Attachement" => false));
?>