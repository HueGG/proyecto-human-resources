<?php


    ini_set("display_error", E_ALL);

    require_once ('../class/Empleado.php');
    require_once ('../class/Trabajo.php');
    require_once ('../class/Departamento.php');
    
    //Archivo que define los procesos a utilizar para la tabla de empleados
    //Definicion de 
    //Nota: No incluye el metodo un modificador de acceso ya que solo se aplican a las propiedades y métodos de las clases. No se pueden aplicar directamente a las funciones definidas fuera de una clase.
    //Se recibe como parametro un objeto de la clase Empleado

    
?>
    
    
    <?php
    //Funcion para imprimir la tabla de empleados resumida
    function tablaEmpleadosResumen(  /*$listaEmpleados*/  ){ 
        

        $empleado = new Empleado();
        $listaEmpleados = $empleado->consultarEmpleadosResumen();    
    ?>
    <div class="table-responsive">
        <table id="tabla_Empleado" class="table table-striped table-striped table-sm table-hover">
            
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
                                <?php if (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') : ?>
                                    <a href="#" onclick="confirmarEliminacionEmpleado(<?php echo  $fila['EMPLEADO_ID']; ?>, '<?php echo  $fila['NOMBRE']; ?>' ); return false;"> <?php echo 'Eliminar'//echo var_dump($fila) ?> </a>
                                <?php endif ?>
                                

                                <a href="#" onclick="peticionEmpleado('actualizar.php', <?php echo $fila['EMPLEADO_ID'] ?> ); return false;"> <?php  echo 'Detalles/Actualizar '//.$fila['EMPLEADO_ID'] //echo var_dump($fila) ?> </a>

                                <!--
                                <form method="post" action="eliminar.php">
                                    <input type="hidden" name="empleado_id" value="<?php //echo $fila['EMPLEADO_ID']; ?>">
                                    <input class="btn btn-danger my-1" type ="submit"  value="Eliminar">
                                </form>  
                                -->
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
        //Imprimir formulario de Actualizacion de empleado //Recibe un arreglo asociativo de parametro para llenar el formulario
        function formularioActualizarEmp($empleadoBuscado){
            //session_start(); //
            //En caso de que se detecte que hubo un error regresado por la pagina actualizar.php, se recuperan los datos devueltos
            /*Mensaje de error con respecto a la actuaizazion*/
            //echo '<br>Arreglo empleadoBuscado: <br>'.var_dump($empleadoBuscado).'<br>';
            
        if(isset($_POST['validacionErrorActualizar'])){
            $datosActualizarEmpleado[0] = $_POST;
            
            //echo '<br>Arreglo datosNuevoEmpleado: <br>'.var_dump($datosNuevoEmpleado);
            //echo '<br><br>Datos por GET:'.var_dump($datosActualizarEmpleado);
            mensajeError($datosActualizarEmpleado[0]['validacionErrorActualizar'], $datosActualizarEmpleado[0]['tipoError'], $datosActualizarEmpleado[0]['mensaje']);
        }

            //Creacion de objetos mediante los cuales se accedera a los metodos de busqueda y consulta de gerente, trabajo y departamentos
            $gerente = new Empleado(); //Permite acceder al metodo de listado de gerentes para la lista desplegable
            $trabajo = new Trabajo();   //Permite acceder al metodo de listado de puestos de trabajo para la lista desplegable
            $departamento = new Departamento(); //Permite acceder al metodo de listado de departamentos para la lista desplegable
            //Recuperar listado de gerentes
            $listaGerentes = $gerente->consultarGerentes();
            //Recuperar listado de puestos de trabajo
            $listaPuestosTrabajo = $trabajo->consultarListaTrabajos();
            //Recuperar Listado de departamentos
            $listaDepartamentos = $departamento->consultarListaDepartamentos();
            
            //echo var_dump($empleadoBuscado);
            //echo var_dump($empleadoBuscado);
        ?>
            
            <form id="formularioActualizarEmpleado" method = "POST" action="actualizar.php" >
                
                <h1> <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ? 'Actualizar empleado' : 'Detalles de empleado' ?> </h1>   

                <div class="form-group">
                    <div class="form-group">
                        <label hidden> Empleado_ID </label>
                        <input type="text" class="form-control" id = "empleado_id" name = "empleado_id"  value="<?php echo isset($empleadoBuscado[0]['EMPLEADO_ID']) ? $empleadoBuscado[0]['EMPLEADO_ID'] : $empleadoBuscado[0]['empleado_id'] ; ?>" readonly>
                        </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre"> Nombre* </label>
                        <input type="text" class="form-control" id  = "nombre" name = "nombre"  onkeyup="validarFomularioEmpleadoActualizar()"   value="<?php echo isset($empleadoBuscado[0]['NOMBRE']) ? $empleadoBuscado[0]['NOMBRE'] : $empleadoBuscado[0]['nombre'] ; ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?>  required>
                        <div id="validacionNombre" name = "validacionNombre" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label for="apellido"> Apellido* </label>
                        <input type="text" class="form-control" id = "apellido" name = "apellido" onkeyup="validarFomularioEmpleadoActualizar()"   value="<?php echo isset($empleadoBuscado[0]['APELLIDO']) ? $empleadoBuscado[0]['APELLIDO'] : $empleadoBuscado[0]['apellido'] ; ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> required>
                        <div id="validacionApellido" name = "validacionApellido" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label for="correo"> Correo* </label>
                        <input type="text" class="form-control" id = "correo" name = "correo" onkeyup="validarFomularioEmpleadoActualizar()"  value="<?php echo isset($empleadoBuscado[0]['CORREO']) ? $empleadoBuscado[0]['CORREO']  : $empleadoBuscado[0]['correo'] ; ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?>  >
                        <div id="validacionCorreo" name = "validacionCorreo" class="">   </div>
                    </div>
                </div>

                

                <div class="form-row">
                    <div class="form-group">
                        <label> Telefono* </label>
                        <input type="text" class="form-control" id = "telefono" name = "telefono"  onkeyup="validarFomularioEmpleadoActualizar()"   value="<?php echo isset($empleadoBuscado[0]['TELEFONO']) ? $empleadoBuscado[0]['TELEFONO'] : $empleadoBuscado[0]['telefono'] ; ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> >
                        <div id="validacionTelefono" name = "validacionTelefono" class="">   </div>
                    </div>
                    
                    <div class="form-group">
                        <label> Fecha de contratacion* (En caso de actualizar, verificar cambio en HISTORICO)</label>
                        <input type="date"  class="form-control" id = "fecha_contratacion" name = "fecha_contratacion"  onchange="validarFechaContratacion()" oninput="validarFormularioEmpleadoNuevo()"   value="<?php echo isset($empleadoBuscado[0]['FECHA_CONTRATACION']) ? $empleadoBuscado[0]['FECHA_CONTRATACION'] : $empleadoBuscado[0]['fecha_contratacion'] ; ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> required>
                        <div id="validacionFechaContratacion" name = "validacionFechaContratacion" class="">   </div>
                    </div>


                    <!-- Listado de Puestos de trabajo-->
                    <div class="form-group col-md-12">
                    <label for="trabajo_id">Puesto de trabajo* (En caso de actualizar, verificar cambio en HISTORICO)</label>
                            <select class="form-control" id="trabajo_id"  name = "trabajo_id"  onchange="validarFomularioEmpleadoActualizar()"  <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?>  >
                                <!-- Validacon de si el id de trabajo es nulo o no -->
                                <option value="<?php if ( isset($empleadoBuscado[0]['TRABAJO_ID']) &&  $empleadoBuscado[0]['TRABAJO_ID'] != null ){/*Valor no nulo*/ echo $empleadoBuscado[0]['TRABAJO_ID'];} else{/*Valor nulo*/echo 'null';} ?>" selected>Seleccione un puesto de trabajo...</option>
                                <?php 
                                    
                                    foreach ($listaPuestosTrabajo as $puestoTrabajo) : ?>
                                    <option 
                                        class="<?php if($puestoTrabajo['TRABAJO_ID'] == 'INACT_EMP'){ echo 'bg-secondary text-white';}else if($puestoTrabajo['TRABAJO_ID'] == 'RET_EMP'){ echo 'bg-warning text-dark'; }else if($puestoTrabajo['TRABAJO_ID'] == 'FORM_EMP'){echo 'bg-danger text-white';} ?>"
                                        value="<?php echo $puestoTrabajo['TRABAJO_ID']?>" <?php if (isset($empleadoBuscado[0]['TRABAJO_ID']) && $empleadoBuscado[0]['TRABAJO_ID'] == $puestoTrabajo['TRABAJO_ID']) { echo 'selected'; }else if( isset($empleadoBuscado[0]['trabajo_id']) && $empleadoBuscado[0]['trabajo_id'] == $puestoTrabajo['TRABAJO_ID']){echo 'selected';}?> >
                                        <?php echo $puestoTrabajo['PUESTO_TRABAJO']?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        <div id="validacionTrabajoId" name = "validacionTrabajoId" class="">   </div>
                    </div>

                    
                </div>

                <div class="form-row">


                    <div class="form-group">
                        <label> Sueldo </label>
                        <input type="text" class="form-control" id = "sueldo" name = "sueldo" value="<?php if(isset($empleadoBuscado[0]['SUELDO'])){echo  $empleadoBuscado[0]['SUELDO'];}else if (isset($empleadoBuscado[0]['sueldo'])){echo $empleadoBuscado[0]['sueldo'];}else{echo '';}?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> readonly>
                        <div id="validacionSueldo" name = "validacionSueldo" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label> Comision (opcional) </label>
                        <input type="number" step="0.01" min="0" max="0.40" class="form-control" id = "comision" name = "comision" onchange="validarFomularioEmpleadoActualizar()" value="<?php if (isset($empleadoBuscado[0]['COMISION']) &&(empty($empleadoBuscado[0]['COMISION']) || !empty($empleadoBuscado[0]['COMISION']))) {echo $empleadoBuscado[0]['COMISION'];}else if (isset( $empleadoBuscado[0]['comision']) && (empty( $empleadoBuscado[0]['comision']) || !empty( $empleadoBuscado[0]['comision']))){echo  $empleadoBuscado[0]['comision'];}                            ?>" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?>>
                        <div id="validacionComision" name = "validacionComision" class="">   </div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Listado de Gerentes-->
                    
                    <div class="form-group col-md-12">
                    <label for="gerente_id">Gerente* </label>
                    <select class="form-control" id = "gerente_id" name = "gerente_id"  onchange="validarFomularioEmpleadoActualizar()" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> >
                        <!-- Validacion de si el id del gerente es nulo o no -->
                        <option value="<?php if( isset($empleadoBuscado[0]['GERENTE_ID']) && $empleadoBuscado[0]['GERENTE_ID'] != null ){ /*Valor no nulo*/ echo $empleadoBuscado[0]['GERENTE_ID']; }else{ /**Valor NULO */ echo 'null';  } ?>" selected>Seleccione un Gerente...</option>
                        <?php 
                            
                            foreach ($listaGerentes as $gerente) : ?>
                            <option  value="<?php echo $gerente['GERENTE_ID']?>" <?php if ( isset($empleadoBuscado[0]['GERENTE_ID']) && $empleadoBuscado[0]['GERENTE_ID'] == $gerente['GERENTE_ID']) { echo 'selected'; }else if( isset($empleadoBuscado[0]['gerente_id']) && $empleadoBuscado[0]['gerente_id'] == $gerente['GERENTE_ID'] ){echo 'selected';}?> >
                                <?php if( is_null($gerente['DEPARTAMENTO']) ) {echo $gerente['GERENTE']; } else { echo $gerente['GERENTE'].' de '.$gerente['DEPARTAMENTO']; } ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <div id="validacionGerenteId" name = "validacionGerenteId" class="">   </div>
                    </div>

                    


                    <!-- Listado de Departamentos-->
                    <div class="form-group col-md-12">
                        <label for="departamento_id">Departamento* (En caso de actualizar, verificar cambio en HISTORICO)</label>
                            <select class="form-control" id = "departamento_id" name = "departamento_id"  onchange="validarFomularioEmpleadoActualizar()" <?php echo (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') ?'' :'disabled' ?> >
                                <!-- Validacion de si el id del DEPARTAMENTO es nulo o no -->
                                <option class="bg-danger text-white" value="<?php if( isset($empleadoBuscado[0]['DEPARTAMENTO_ID']) && $empleadoBuscado[0]['DEPARTAMENTO_ID'] != null ){/* Valor NO NULO*/ echo $empleadoBuscado[0]['DEPARTAMENTO_ID']; }else{ /*Valor NULO*/ echo ''; } ?>" >Seleccione un Departamento...</option>
                                <?php 
                                    
                                    foreach ($listaDepartamentos as $departamento) : ?>
                                    <option class="<?php if($departamento['DEPARTAMENTO_ID'] == 7){ echo 'bg-secondary text-white';}else if($departamento['DEPARTAMENTO_ID'] == 8){ echo 'bg-warning text-dark'; }else if($departamento['DEPARTAMENTO_ID'] == 9){echo 'bg-danger text-white';} ?>"
                                            value="<?php echo $departamento['DEPARTAMENTO_ID']?>" <?php if (isset($empleadoBuscado[0]['DEPARTAMENTO_ID'])  && $empleadoBuscado[0]['DEPARTAMENTO_ID'] == $departamento['DEPARTAMENTO_ID'] ) { echo 'selected'; }else if(isset($empleadoBuscado[0]['departamento_id'])  && $empleadoBuscado[0]['departamento_id'] == $departamento['DEPARTAMENTO_ID'] ) { echo 'selected'; }?> >
                                        <?php echo $departamento['DEPARTAMENTO']?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        <div id="validacionDepartamentoId" name = "validacionDepartamentoId" class="">   </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group">

                    </div>
                    <div class="form-group">

                    </div>
                </div>
                    <?php if (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') : ?>
                        <input class="btn btn-primary my-1" type ="submit" id="submitBtn" value="Actualizar">
                    <?php endif ?>
                    
                
            </form>
        <?php
        }
    ?>



<?php
        //Imprimir formulario de REGISTRO DE NUEVO empleado //Recibe un arreglo asociativo de parametro para llenar el formulario
        function formularioRegistrarEmp(){

            //En caso de que se detecte que hubo un error regresado por la pagina registrar.php, se recuperan los datos devueltos
            if(isset($_POST['validacionError'])){
                $datosNuevoEmpleado = $_POST;
                
                mensajeError($_POST['validacionError'], $_POST['tipoError'], $_POST['mensaje']);
            }
            
            //Creacion de objetos mediante los cuales se accedera a los metodos de busqueda y consulta de gerente, trabajo y departamentos
            $gerente = new Empleado(); //Permite acceder al metodo de listado de gerentes para la lista desplegable
            $trabajo = new Trabajo();   //Permite acceder al metodo de listado de puestos de trabajo para la lista desplegable
            $departamento = new Departamento(); //Permite acceder al metodo de listado de departamentos para la lista desplegable
            //Recuperar listado de gerentes
            $listaGerentes = $gerente->consultarGerentes();
            //Recuperar listado de puestos de trabajo
            $listaPuestosTrabajo = $trabajo->consultarListaTrabajos();
            //Recuperar Listado de departamentos
            $listaDepartamentos = $departamento->consultarListaDepartamentos();
            
            //echo var_dump($empleadoBuscado);
        ?>
            <form id="formularioRegistrarEmpleado" method = "POST" action="registrar.php" >
                
                <h1>Registrar nuevo empleado</h1>
            
                <div class="form-group">
                    <div class="form-group">
                        <label hidden> Empleado_ID </label>
                        <input type="hidden" class="form-control" id = "empleado_id" name = "empleado_id" value="" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre"> Nombre* </label>
                        <input type="text" class="form-control" id  = "nombre" name = "nombre" onkeyup="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError']) ? $datosNuevoEmpleado['nombre'] : ''; ?>" >
                        <div id="validacionNombre" name = "validacionNombre" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label for="apellido"> Apellido* </label>
                        <input type="text" class="form-control" id = "apellido" name = "apellido" onkeyup="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['apellido'] : ''; ?>">
                        <div id="validacionApellido" name = "validacionApellido" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label for="correo"> Correo* </label>
                        <input type="text" class="form-control" id = "correo" name = "correo" onkeyup="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['correo'] : ''; ?>" oninput="validarCorreo()">
                        <div id="validacionCorreo" name = "validacionCorreo" class="">   </div>
                    </div>

                    
                </div>

                

                <div class="form-row">
                    <div class="form-group">
                        <label> Telefono* </label>
                        <input type="text" class="form-control" id = "telefono" name = "telefono" onkeyup="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['telefono'] : ''; ?>">
                        <div id="validacionTelefono" name = "validacionTelefono" class="">   </div>
                    </div>
                    
                    <div class="form-group">
                        <label> Fecha de contratacion* </label>
                        <input type="date"  class="form-control" id = "fecha_contratacion" name = "fecha_contratacion" onchange="validarFechaContratacion()" oninput="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['fecha_contratacion'] : ''; ?>" required>
                        <div id="validacionFechaContratacion" name = "validacionFechaContratacion" class="">   </div>
                    </div>


                    <!-- Listado de Puestos de trabajo-->
                    <div class="form-group col-md-12">
                    <label for="trabajo_id">Puesto de trabajo* </label>
                            <select class="form-control" id="trabajo_id"  name = "trabajo_id" onchange="validarFormularioEmpleadoNuevo()" required>
                                <!-- Validacon de si el id de trabajo es nulo o no -->
                                <option value="" selected>Seleccione un puesto de trabajo...</option>
                                <?php 
                                    
                                    foreach ($listaPuestosTrabajo as $puestoTrabajo) : ?>
                                    <option 
                                        class="<?php if($puestoTrabajo['TRABAJO_ID'] == 'INACT_EMP'){ echo 'bg-secondary text-white';}else if($puestoTrabajo['TRABAJO_ID'] == 'RET_EMP'){ echo 'bg-warning text-dark'; }else if($puestoTrabajo['TRABAJO_ID'] == 'FORM_EMP'){echo 'bg-danger text-white';} ?>"
                                        value="<?php echo $puestoTrabajo['TRABAJO_ID']?>" <?php echo (isset( $_POST['validacionError']) && !$_POST['validacionError'] && $datosNuevoEmpleado['trabajo_id'] == $puestoTrabajo['TRABAJO_ID']) ? 'selected' : ''; ?> >
                                        <?php echo $puestoTrabajo['PUESTO_TRABAJO']?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        <div id="validacionTrabajoId" name = "validacionTrabajoId" class="">   </div>
                    </div>

                    
                </div>

                <div class="form-row">


                    <div class="form-group">
                        <label> Sueldo (Se asigna de acuerdo al Puesto de trabajo despues de registrar)</label>
                        <input type="text" class="form-control" id = "sueldo" name = "sueldo" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['sueldo'] : ''; ?>" readonly>
                        <div id="validacionSueldo" name = "validacionSueldo" class="">   </div>
                    </div>

                    <div class="form-group">
                        <label> Comision (opcional) </label>
                        <input type="number" step="0.01" min="0" max="0.40" class="form-control" id = "comision" name = "comision" onchange="validarFormularioEmpleadoNuevo()" value="<?php /*Impresion de valores dependiendo de si hay o no error*/ echo (isset($_POST['validacionError']) && !$_POST['validacionError'])  ? $datosNuevoEmpleado['comision'] : ''; ?>">
                        <div id="validacionComision" name = "validacionComision" class="">   </div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Listado de Gerentes-->
                    
                    <div class="form-group col-md-12">
                    <label for="gerente_id">Gerente* </label>
                            <select class="form-control" id = "gerente_id" name = "gerente_id" onchange="validarFormularioEmpleadoNuevo()" >
                                <!-- Validacion de si el id del gerente es nulo o no -->
                                <option value="" selected>Seleccione un Gerente...</option>
                                <?php 
                                    
                                    foreach ($listaGerentes as $gerente) : ?>
                                    <option  value="<?php echo $gerente['GERENTE_ID']?>"  <?php echo (isset( $_POST['validacionError']) && !$_POST['validacionError'] && $datosNuevoEmpleado['gerente_id'] == $gerente['GERENTE_ID']) ? 'selected' : ''; ?>   >
                                        <?php if( is_null($gerente['DEPARTAMENTO']) ) {echo $gerente['GERENTE']; } else { echo $gerente['GERENTE'].' de '.$gerente['DEPARTAMENTO']; } ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        <div id="validacionGerenteId" name = "validacionGerenteId" class="">   </div>
                    </div>

                    


                    <!-- Listado de Departamentos-->
                    <div class="form-group col-md-12">
                        <label for="departamento_id">Departamento* </label>
                                <select class="form-control" id = "departamento_id" name = "departamento_id" onchange="validarFormularioEmpleadoNuevo()" required>
                                    <!-- Validacion de si el id del DEPARTAMENTO es nulo o no -->
                                    <option class="bg-danger text-white" value="" selected>Seleccione un Departamento...</option>
                                    <?php 
                                        
                                        foreach ($listaDepartamentos as $departamento) : ?>
                                        <option class="<?php if($departamento['DEPARTAMENTO_ID'] == 7){ echo 'bg-secondary text-white';}else if($departamento['DEPARTAMENTO_ID'] == 8){ echo 'bg-warning text-dark'; }else if($departamento['DEPARTAMENTO_ID'] == 9){echo 'bg-danger text-white';} ?>"
                                                value="<?php echo $departamento['DEPARTAMENTO_ID']?>"  <?php echo (isset( $_POST['validacionError']) && !$_POST['validacionError'] && $datosNuevoEmpleado['departamento_id'] == $departamento['DEPARTAMENTO_ID']) ? 'selected' : ''; ?>  >
                                            <?php echo $departamento['DEPARTAMENTO']?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <div id="validacionDepartamentoId" name = "validacionDepartamentoId" class="">   </div>
                        </div>
                </div>

                <div class="form-row">

                    <div class="form-group">

                    </div>
                    <div class="form-group">

                    </div>
                </div>
                    <?php 
                        if (isset($_SESSION['ROL_ID']) && $_SESSION['ROL_ID'] === 'SYS_ADMIN') : ?>
                            <input class="btn btn-primary my-1" type ="submit" id="submitBtn" value="Registrar" disabled>
                        <?php endif ?>
                    
                
            </form>
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
