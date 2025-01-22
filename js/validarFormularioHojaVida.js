function validarNombreEmpleado(){
    const max = 24; //Numero de caracteres limite
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
        txtValidacionTelefono.innerHTML = "Telefono valido - Ejemplos de telefonos válidos: +123-4567-8901, 123-456-7890, 987654321, 515.123.8181, 011.44.1644.429263, 650.121.8009";
        return true;
    }

}
function validarFecha(){
        // Validación del campo de fecha
    var fechaInput = document.getElementById('fecha');
    var txtValidacionFecha = document.getElementById('validacionFecha');

    if (!fechaInput.value || fechaInput.value === "") {
        fechaInput.className = "form-control is-invalid";
        txtValidacionFecha.className = "invalid-feedback";
        txtValidacionFecha.innerHTML = "Por favor, selecciona una fecha.";
        return false;
    } else {
        fechaInput.className = "form-control is-valid";
        txtValidacionFecha.className = "valid-feedback";
        txtValidacionFecha.innerHTML = "Fecha válida";
    }
    return true;
}

function validarNacionalidad(){
    // Validación del campo de fecha
    
        var selectElement = document.getElementById('nacionalidad');
        var selectedValue = selectElement.value;
        var errorElement = document.getElementById('validacionNacionalidad');
        
        if (selectElement.selectedIndex == 0) {
          // No se ha seleccionado ninguna opción
          selectElement.className = "form-control is-invalid";
          errorElement.className = "invalid-feedback";
          errorElement.innerHTML = "Por favor, selecciona una opción.";
          return false;
        } else {
          // Se ha seleccionado una opción válida
          selectElement.className = "form-control is-valid";
          errorElement.className = "valid-feedback";
          errorElement.innerHTML = "Selección valida";
          return true;
        }
}

function validarEstadoCivil(){
    // Validación del campo de fecha
    
        var selectElement = document.getElementById('estadoCivil');
        var selectedValue = selectElement.value;
        var errorElement = document.getElementById('validacionEstadoCivil');
        
        if (selectElement.selectedIndex == 0) {
          // No se ha seleccionado ninguna opción
          selectElement.className = "form-control is-invalid";
          errorElement.className = "invalid-feedback";
          errorElement.innerHTML = "Por favor, selecciona una opción.";
          return false;
        } else {
          // Se ha seleccionado una opción válida
          selectElement.className = "form-control is-valid";
          errorElement.className = "valid-feedback";
          errorElement.innerHTML = "Selección valida";
          return true;
        }
}

function validarDireccion(){
    const max = 100;
    //const expresion = /^[a-zA-Z0-9\s.,'-]*$/;
    var expresion = /^[a-zA-Z0-9\s]+$/;
    var direccionInput = document.getElementById('direccion');
    var txtValidacionDireccion = document.getElementById('validacionDireccion');
    
    direccionInput.value = direccionInput.value.length>max ? direccionInput.value.slice(0, max).trim() : direccionInput.value; //Truncamiento de cadena si excede maxima longitud
    var direccion = direccionInput.value; // Eliminar espacios en blanco al principio y al final

    if (direccion.length === 0) {
        direccionInput.className = "form-control is-invalid";
        txtValidacionDireccion.className = "invalid-feedback";
        txtValidacionDireccion.innerHTML = "Debe ingresar una dirección.";
        return false;
    } else if (direccion.length > max) {
        direccionInput.className = "form-control is-invalid";
        txtValidacionDireccion.className = "invalid-feedback";
        txtValidacionDireccion.innerHTML = "la dirección no puede exceder los "+max+" caracteres.";
        return false;
        
    } /*else if (!expresion.test(direccion)) {
        direccionInput.className = "form-control is-invalid";
        txtValidacionDireccion.className = "invalid-feedback";
        txtValidacionDireccion.innerHTML = "La dirección no es válido.<br> Solo se permiten letras y los siguientes caracteres especiales: . - '";
        return false;
        
    } */else {
        // Nombre válido, no se muestra ningún mensaje de error
        direccionInput.className = "form-control is-valid";
        txtValidacionDireccion.className = "valid-feedback";
        txtValidacionDireccion.innerHTML = "Dirección valida";
        return true;
  }
}

function validarEstudios(){
    const max = 100;
    //const expresion = /^[a-zA-Z0-9\s.,'-]*$/;
    var expresion = /^[a-zA-Z0-9\s.,'-]*$/;
    var estudiosInput = document.getElementById('estudios');
    var txtValidacionEstudios = document.getElementById('validacionEstudios');
    
    estudiosInput.value = estudiosInput.value.length>max ? estudiosInput.value.slice(0, max).trim() : estudiosInput.value; //Truncamiento de cadena si excede maxima longitud
    var estudios = estudiosInput.value; // Eliminar espacios en blanco al principio y al final

    if (estudios.length === 0) {
        estudiosInput.className = "form-control is-invalid";
        txtValidacionEstudios.className = "invalid-feedback";
        txtValidacionEstudios.innerHTML = "Debe ingresar información de los estudios.";
        return false;
    } else if (estudios.length > max) {
        estudiosInput.className = "form-control is-invalid";
        txtValidacionEstudios.className = "invalid-feedback";
        txtValidacionEstudios.innerHTML = "la información de los estuduos no puede exceder los "+max+" caracteres.";
        return false;
        
    } /* else if (!expresion.test(estudios)) {
        estudiosInput.className = "form-control is-invalid";
        txtValidacionEstudios.className = "invalid-feedback";
        txtValidacionEstudios.innerHTML = "La informacio  de los estudios no es válida.<br> Solo se permiten letras y los siguientes caracteres especiales: . - '";
        return false;
        
    }*/ else {
        // Nombre válido, no se muestra ningún mensaje de error
        estudiosInput.className = "form-control is-valid";
        txtValidacionEstudios.className = "valid-feedback";
        txtValidacionEstudios.innerHTML = "Información de los estudios valida";
        return true;
  }
}
function validarIdiomas(){
    const max = 100;
    const expresion = /^[a-zA-Z0-9\s.,'-]*$/;
    var idiomasInput = document.getElementById('idiomas');
    var txtValidacionIdiomas = document.getElementById('validacionIdiomas');
    
    idiomasInput.value = idiomasInput.value.length>max ? idiomasInput.value.slice(0, max).trim() : idiomasInput.value; //Truncamiento de cadena si excede maxima longitud
    var idiomas = idiomasInput.value; // Eliminar espacios en blanco al principio y al final

    if (idiomas.length === 0) {
        idiomasInput.className = "form-control is-invalid";
        txtValidacionIdiomas.className = "invalid-feedback";
        txtValidacionIdiomas.innerHTML = "Debe ingresar información de los idiomas que dominas.";
        return false;
    } else if (idiomas.length > max) {
        idiomasInput.className = "form-control is-invalid";
        txtValidacionIdiomas.className = "invalid-feedback";
        txtValidacionIdiomas.innerHTML = "la información de los idiomas no puede exceder los "+max+" caracteres.";
        return false;
        
    } /* else if (!expresion.test(idiomas)) {
        idiomasInput.className = "form-control is-invalid";
        txtValidacionIdiomas.className = "invalid-feedback";
        txtValidacionIdiomas.innerHTML = "La informacio de los idiomas no es válida.<br> Solo se permiten letras y los siguientes caracteres especiales: . - '";
        return false;
        
    } */ else {
        // Nombre válido, no se muestra ningún mensaje de error
        idiomasInput.className = "form-control is-valid";
        txtValidacionIdiomas.className = "valid-feedback";
        txtValidacionIdiomas.innerHTML = "Información de los idiomas valida";
        return true;
  }
}




function validarFormularioHojaVida(){
    var botonSubmit = document.getElementById('submitBtn');

    if( !validarDireccion() || !validarEstudios() || !validarIdiomas() || !validarNacionalidad() || !validarEstadoCivil()){
        console.log('Deshabiliatr boton');
        botonSubmit.disabled = true;
    }else{
        console.log('Habilitar boton');
        botonSubmit.disabled = false;
    }
    
}