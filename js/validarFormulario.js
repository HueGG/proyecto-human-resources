


function validarCorreo(){
    const max = 35;
    //Variable que recupero el dato ingresado en el input con id "correo"
    var correoInput = document.getElementById("correo");
    correoInput.value = correoInput.value>max ? correoInput.value.slice(0, max) : correoInput.value ; //Se trunca el valor si es mayor a la longitud maxima
    var correo = correoInput.value;
    var txtValidacion = document.getElementById('validacionCorreo');
    var expresion = /^[\w.-]+@[a-zA-Z_-]+?(?:\.[a-zA-Z]{2,6})+$/; //Validar que el correo cumple con la expresion regular
    
            //Si el correo cumple con la expresion regular, se habilita el boton de envio del formulario
            if ((expresion.test(correo) ) && (correo.length <= max) && correo !== '') {
                correoInput.className = "form-control is-valid";
                txtValidacion.className = "valid-feedback";
                
                    txtValidacion.innerHTML = 'Correo con formato valido.';
                //console.log('Correo'+correo);
                //console.log('Correo Value Valido: '+correoInput.value);
                return true;
            } else {
                //Mientras el correo sea INcorrecto, se retorna FALSO
                correoInput.className = "form-control is-invalid";
                txtValidacion.className = "invalid-feedback";
                if(correo.length>max){
                    txtValidacion.innerHTML = 'Longitud maxima permitida: '+max+' caracteres';
                    correo = correo.slice(0, max); //Se trunca cadena
                    correoInput.value =  correo.slice(0, max); //Se trunca cadena
                    
                }else{
                    txtValidacion.innerHTML = 'Ingrese un correo valido: example@domain.com';
                }
                
                //console.log('Correo'+correo);
                //console.log('Correo Value erroneo: '+correoInput.value);
                return false;
            }
            
}

function mensajeFormularioEmpleado(){
    var nombre = document.getElementById('nombre');
    var txtValidacionNombre = document.getElementById('validacionNombre');

    var apellido = document.getElementById('apellido');
    var txtValidacion = document.getElementById('validacionApellido');
    
    var telefono = document.getElementById('telefono');
    var txtValidacion = document.getElementById('validacionTelefono');

    var fecha_contratacion = document.getElementById('fecha_contratacion');
    var txtValidacion = document.getElementById('validacionFechaContratacion');

    var trabajo_id = document.getElementById('trabajo_id');
    var txtValidacion = document.getElementById('validacionTrabajoId');

    var sueldo = document.getElementById('sueldo');
    var txtValidacion = document.getElementById('');

    var comision = document.getElementById('comision');
    var txtValidacion = document.getElementById('');

    var gerente_id = document.getElementById('gerente_id');
    var txtValidacion = document.getElementById('');

    var departamento_id = document.getElementById('departamento_id');
    var txtValidacion = document.getElementById('');
    
}

function validarNombre(){
    const max = 24;
    const expresion =  /^[A-Za-zÁ-ÿ.'-]+(?:\s[A-Za-zÁ-ÿ.'-]+)*$/;
    var nombreInput = document.getElementById('nombre');
    var txtValidacionNombre = document.getElementById('validacionNombre');
    
    nombreInput.value = nombreInput.value.length > max ? nombreInput.value.slice(0, max).trim() : nombreInput.value ; //Se trunca el valor 
    var nombre = nombreInput.value; //eliminan espacios en blanco al pricipio y fin

    if (nombre.length === 0 ) {
        nombreInput.className = "form-control is-invalid";
        txtValidacionNombre.className = "invalid-feedback";
        txtValidacionNombre.innerHTML = "Debe ingresar un nombre.";

        //console.log('Vacio: '+nombreInput.value);
        return false;
    } else if (nombre.length > max) {
        
        nombreInput.className = "form-control is-invalid";
        txtValidacionNombre.className = "invalid-feedback";
        txtValidacionNombre.innerHTML = "El nombre no puede exceder los "+max+" caracteres.";
        
        //console.log('Max Failure: '+nombreInput.value);
        return false;
        
    } else if (!expresion.test(nombre)) {
        nombreInput.className = "form-control is-invalid";
        txtValidacionNombre.className = "invalid-feedback";
        txtValidacionNombre.innerHTML = "El nombre no es válido. Solo se permiten letras y los siguientes caracteres especiales: . - '";
        
        //console.log('NoEXpre: '+nombreInput.value);
        return false;
        
    } else {
        // Nombre válido, no se muestra ningún mensaje de error
        nombreInput.className = "form-control is-valid";
        txtValidacionNombre.className = "valid-feedback";
        txtValidacionNombre.innerHTML = "";
        //console.log('Valido '+nombreInput.value);
        return true;
  }
}


function validarApellido(){
    const max = 24;
    const expresion = /^[A-Za-zÁ-ÿ.'-]+(?:\s[A-Za-zÁ-ÿ.'-]+)*$/;
    var apellidoInput = document.getElementById('apellido');
    var txtValidacionApellido = document.getElementById('validacionApellido');
    
    apellidoInput.value = apellidoInput.value.length>max ? apellidoInput.value.slice(0, max).trim() : apellidoInput.value; //Truncamiento de cadena si excede maxima longitud
    var apellido = apellidoInput.value; // Eliminar espacios en blanco al principio y al final

    if (apellido.length === 0) {
        apellidoInput.className = "form-control is-invalid";
        txtValidacionApellido.className = "invalid-feedback";
        txtValidacionApellido.innerHTML = "Debe ingresar un apellido.";
        return false;
    } else if (apellido.length > max) {
        apellidoInput.className = "form-control is-invalid";
        txtValidacionApellido.className = "invalid-feedback";
        txtValidacionApellido.innerHTML = "El apellido no puede exceder los "+max+" caracteres.";
        return false;
        
    } else if (!expresion.test(apellido)) {
        apellidoInput.className = "form-control is-invalid";
        txtValidacionApellido.className = "invalid-feedback";
        txtValidacionApellido.innerHTML = "El apellido no es válido.<br> Solo se permiten letras y los siguientes caracteres especiales: . - '";
        return false;
        
    } else {
        // Nombre válido, no se muestra ningún mensaje de error
        apellidoInput.className = "form-control is-valid";
        txtValidacionApellido.className = "valid-feedback";
        txtValidacionApellido.innerHTML = "";
        return true;
  }
}


function validarTelefono(){
    const max = 19;
    const expresion = /^[+]?[0-9]{1,3}[-.]?[0-9]{1,3}[-.]?[0-9]{1,4}[-.]?[0-9]{1,9}$/; //--> /^[+]?[0-9]{1,3}[-]?[0-9]{1,3}[-]?[0-9]{4,10}$/;
    var telefonoInput = document.getElementById('telefono');
    var txtValidacionTelefono = document.getElementById('validacionTelefono');

    telefonoInput.value = telefonoInput.value.length > max ? telefonoInput.value.slice(0, max).trim() : telefonoInput.value;  //Truncamiento de cadena en caso de exceder la longitud maxima
    var telefono = telefonoInput.value ; // Eliminar espacios en blanco al principio y al final
    
    if (telefono.length > max){
        //Longitud no valida
        telefonoInput.className = "form-control is-invalid";
        txtValidacionTelefono.className = "invalid-feedback";
        txtValidacionTelefono.innerHTML = "La longitud maxima es de "+max+" caracteres.";
        return false;
    }else if (!expresion.test(telefonoInput.value)){
        //No cumple expresion regular
        telefonoInput.className = "form-control is-invalid";
        txtValidacionTelefono.className = "invalid-feedback";
        txtValidacionTelefono.innerHTML = "Por favor, ingresa un número de teléfono válido. <br>Ejemplos de números válidos: +123-4567-8901, 123-456-7890, 987654321, 515.123.8181, 011.44.1644.429263, 650.121.8009";
        return false;
    }else{
        //Telefono valido
        telefonoInput.className = "form-control is-valid";
        txtValidacionTelefono.className = "valid-feedback";
        txtValidacionTelefono.innerHTML = "Ejemplos de telefonos válidos: +123-4567-8901, 123-456-7890, 987654321, 515.123.8181, 011.44.1644.429263, 650.121.8009";
        return true;
    }

}

function validarFechaContratacion() {
    var fechaContratacionInput = document.getElementById('fecha_contratacion');
    var txtValidacionFechaContratacion = document.getElementById('validacionFechaContratacion');
    var fechaIngresada = new Date(fechaContratacionInput.value); //Conversion de fecha a YYYY-MM-DD

    var fechaMinima = new Date('2001-01-13');
    var fechaMaxima = new Date();
    fechaMaxima.setDate(fechaMaxima.getDate() + 7); //Fecha maxima de una semana a partir de la fecha actual

    if (fechaIngresada >= fechaMinima && fechaIngresada <= fechaMaxima) {
        // La fecha es válida
        
        fechaContratacionInput.className = "form-control is-valid";
        txtValidacionFechaContratacion.className = "valid-feedback";
        txtValidacionFechaContratacion.innerHTML = "Fecha valida.";
        return true; //Fecha Valida
      }else if(fechaContratacionInput.value ===""){
        // No se ha seleccionado ninguna fecha
        fechaContratacionInput.className = "form-control is-invalid";
        txtValidacionFechaContratacion.className = "invalid-feedback";
        txtValidacionFechaContratacion.innerHTML = "Por favor, seleccione una fecha.";
        return false; // Fecha inválida
      } else {
        // La fecha no cumple con los requisitos
        
        fechaContratacionInput.className = "form-control is-invalid";
        txtValidacionFechaContratacion.className = "invalid-feedback";
        txtValidacionFechaContratacion.innerHTML = "Fecha Invalida. Ingrese una fecha entre "+fechaMinima+' y '+ fechaMaxima;
        return false;
      }
    
}


function validarComision(){
    const max = 4;
    var comisionInput = document.getElementById('comision');
    var txtValidacionComision = document.getElementById('validacionComision');
    

    // Limitar la longitud del número ingresado
    comisionInput.value = comisionInput.value.length > max ? comisionInput.value.slice(0, max) : comisionInput.value;
    var comision = parseFloat(comisionInput.value);
    
    if( comision >= 0 && comision <= 0.4 ) {
        // Valor válido, 
        console.log('Comision valida');
        comisionInput.className = "form-control is-valid";
        txtValidacionComision.className = "valid-feedback";
        comision=='' ? txtValidacionComision.innerHTML = "" : txtValidacionComision.innerHTML = "Comision valida.";
        return true;
    }else{
        //Valor invalido
        console.log('Comision NO valida');
        comisionInput.className = "form-control is-invalid";
        txtValidacionComision.className = "invalid-feedback";
        txtValidacionComision.innerHTML = "Comision no valida. Ingrese un valor decimal entre 0.00 y 0.40";
        return false;
    }

}



function validarFormularioEmpleadoNuevo(){

    var seleccionTrabajo = document.getElementById("trabajo_id");
    var seleccionGerente = document.getElementById('gerente_id');
    var seleccionDepartamento = document.getElementById("departamento_id");

    
    var botonSubmit = document.getElementById('submitBtn');
    //console.log('Nombre: '+validarNombre());
    //console.log('Apellido: '+validarApellido());
    //console.log('Correo: '+validarCorreo());
    //console.log('Telefono: '+validarTelefono());
    //validarFechaContratacion();
    //console.log('ListaTrabaj: '+validarListaTrabajo());
    //console.log('Comision: '+validarComision());
    
    if( !validarNombre() || !validarApellido() || !validarCorreo()  || !validarTelefono() || !validarFechaContratacion() ||
        seleccionTrabajo.selectedIndex === 0 || (seleccionGerente.selectedIndex === 0 && (seleccionTrabajo.value != 'INACT_EMP' && seleccionTrabajo.value != 'RET_EMP' && seleccionTrabajo.value != 'FORM_EMP')) || seleccionDepartamento.selectedIndex === 0){
        botonSubmit.disabled = true;
    }else{
        botonSubmit.disabled = false;
    }
}




function validarFomularioEmpleadoActualizar(){
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var correo = document.getElementById('correo').value;
    var seleccionTrabajo = document.getElementById("trabajo_id");
    var seleccionGerente = document.getElementById('gerente_id');
    var seleccionDepartamento = document.getElementById("departamento_id");
    

    var botonSubmit = document.getElementById('submitBtn');

    validarListaTrabajoActualizarEmp();
    
    if(  !validarNombre() || !validarApellido() || !validarCorreo()  || !validarTelefono() || !validarFechaContratacion() || seleccionTrabajo.selectedIndex === 0 || (seleccionGerente.selectedIndex === 0 && (seleccionTrabajo.value != 'INACT_EMP' && seleccionTrabajo.value != 'RET_EMP' && seleccionTrabajo.value != 'FORM_EMP')) || seleccionDepartamento.selectedIndex === 0){
        botonSubmit.disabled = true;
    }else{
        botonSubmit.disabled = false;
    }
}


function validarListaTrabajo(){
    var seleccionTrabajo = document.getElementById('trabajo_id');
    var validacionTrabajoMensaje = document.getElementById('validacionTrabajoId');
    
    var seleccionDepartamento = document.getElementById('departamento_id');
    var validacionDepartamentoMensaje = document.getElementById('validacionDepartamentoId');

    console.log(seleccionTrabajo.value);
    //seleccionDepartamento.disabled = false;
    if (seleccionTrabajo.value === 'INACT_EMP' || seleccionTrabajo.value === 'RET_EMP' || seleccionTrabajo.value === 'FORM_EMP' ){
        switch (seleccionTrabajo.value) {
            case 'INACT_EMP':
                seleccionDepartamento.value = 7;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
                seleccionTrabajo.className = "form-control is-valid";
                validacionTrabajoMensaje.className = "valid-feedback";
                validacionTrabajoMensaje.innerHTML = "Departamento seleccionado";

                seleccionDepartamento.className = "form-control is-valid";
                validacionDepartamentoMensaje.className = "valid-feedback";
                validacionDepartamentoMensaje.innerHTML = "Departamento seleccionado";
            break;
    
            case 'RET_EMP':
                seleccionDepartamento.value = 8;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
                seleccionTrabajo.className = "form-control is-valid";
                validacionTrabajoMensaje.className = "valid-feedback";
                validacionTrabajoMensaje.innerHTML = "Departamento seleccionado";

                seleccionDepartamento.className = "form-control is-valid";
                validacionDepartamentoMensaje.className = "valid-feedback";
                validacionDepartamentoMensaje.innerHTML = "Departamento seleccionado";
            break;
            
            case 'FORM_EMP':
                seleccionDepartamento.value = 9;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
                seleccionTrabajo.className = "form-control is-valid";
                validacionTrabajoMensaje.className = "valid-feedback";
                validacionTrabajoMensaje.innerHTML = "Departamento seleccionado";

                seleccionDepartamento.className = "form-control is-valid";
                validacionDepartamentoMensaje.className = "valid-feedback";
                validacionDepartamentoMensaje.innerHTML = "Departamento seleccionado";
            break;
        
            default:
                //En caso de que el trabajo no sea ninguno de los validados
                //seleccionDepartamento.disabled = false;
                console.log('No modifiqué departamento');
                seleccionDepartamento.selectedIndex = 0;
                console.log(seleccionDepartamento.value);
                seleccionTrabajo.className = "form-control is-valid";
                validacionTrabajoMensaje.className = "valid-feedback";
                validacionTrabajoMensaje.innerHTML = "Trabajo seleccionao: <br>Asegurese de seleccionar un departamento distinto a reslatados con rojo, amarillo y gris";

            break;
        }
    }else{
        //Si el trabajo no es igual a los anteriores, se valida que los departamentos no correspondan a INACT_EMP, RET_EMP o FORM_EMP
        if(seleccionDepartamento.value == 7 || seleccionDepartamento.value == 8 || seleccionDepartamento.value == 9){
            seleccionDepartamento.selectedIndex = 0;
        }
        
    }
    
}





function validarListaTrabajoActualizarEmp(){
    var seleccionTrabajo = document.getElementById('trabajo_id');
    var seleccionDepartamento = document.getElementById('departamento_id');
    console.log(seleccionTrabajo.value);
    //seleccionDepartamento.disabled = false;
    if (seleccionTrabajo.value === 'INACT_EMP' || seleccionTrabajo.value === 'RET_EMP' || seleccionTrabajo.value === 'FORM_EMP' ){
        switch (seleccionTrabajo.value) {
            case 'INACT_EMP':
                seleccionDepartamento.value = 7;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
                
            break;
    
            case 'RET_EMP':
                seleccionDepartamento.value = 8;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
            break;
            
            case 'FORM_EMP':
                seleccionDepartamento.value = 9;
                console.log(seleccionDepartamento.value);
                //seleccionDepartamento.disabled = true;
            break;
        
            default:
                //En caso de que el trabajo no sea ninguno de los validados
                //seleccionDepartamento.disabled = false;
                console.log('No modifiqué departamento');
                seleccionDepartamento.selectedIndex = 0;
                console.log(seleccionDepartamento.value);
            break;
        }
    }else{
        //Si el trabajo no es igual a los anteriores, se valida que los departamentos no correspondan a INACT_EMP, RET_EMP o FORM_EMP
        if(seleccionDepartamento.value == 7 || seleccionDepartamento.value == 8 || seleccionDepartamento.value == 9){
            seleccionDepartamento.selectedIndex = 0;
        }
    }
    
}







function validarFecha(){
    var fechaIngresada = document.getElementById('fecha_contratacion');
    if(fechaIngresada.value === ''){
        return false;
    }else{
        return true;
    }
}




function confirmarEliminacionEmpleado(empleadoId, nombre){
    if (confirm('¿Estás seguro de que deseas eliminar al empleado '+ nombre +'?')) {
        peticionEmpleadoEliminar('eliminar.php', empleadoId);
    }
}

