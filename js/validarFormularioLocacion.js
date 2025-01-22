function validarDireccion() {
    var direccion = document.getElementById("direccion");
    var validacionDireccion = document.getElementById("validacionDireccion");
    
    validacionDireccion.textContent = "";
    //Validar que la dirección no esté vacía 
    if (direccion.value.length === 0 ) {  //|| /^[a-zA-Z\s]*$/.test(ciudad.value)
        validacionDireccion.textContent = "Ingrese una dirección válida";
        direccion.classList.remove("is-valid");
        direccion.classList.add("is-invalid");
    }
    else if (direccion.value.length > 20) {
        validacionDireccion.textContent = "La dirección debe tener máximo 15 caracteres";
        direccion.classList.remove("is-valid");
        direccion.classList.add("is-invalid");
    }
    else {
        direccion.classList.remove("is-invalid");
        direccion.classList.add("is-valid");
    }
    verificarCamposInvalidosLocacion();
}
function validarCodigoPostal() {
    var codigoPostal = document.getElementById("codigo_postal");
    var validacionCodigoPostal = document.getElementById("validacionCodigoPostal");

    validacionCodigoPostal.textContent = "";
    //Validar que el código postal no esté vacío
    if (codigoPostal.value.length === 0) {
        validacionCodigoPostal.textContent = "Ingrese un código postal válido";
        codigoPostal.classList.remove("is-valid");
        codigoPostal.classList.add("is-invalid");
    }
    //Validar que el código postal tenga 10 dígitos numéricos
    else if (codigoPostal.value.length > 10 ) {
        validacionCodigoPostal.textContent = "El código postal debe contener como máximo 10 Caracteres";
        codigoPostal.classList.remove("is-valid");
        codigoPostal.classList.add("is-invalid");
    }
    else {
        codigoPostal.classList.remove("is-invalid");
        codigoPostal.classList.add("is-valid");
    }
    verificarCamposInvalidosLocacion();
}
function validarCiudad() {
    var ciudad = document.getElementById("ciudad");
    var validacionCiudad = document.getElementById("validacionCiudad");

    validacionCiudad.textContent = "";
    //Validar que la ciudad no esté vacía
    if (ciudad.value.length === 0) {
        validacionCiudad.textContent = "Ingrese una ciudad válida";
        ciudad.classList.remove("is-valid");
        ciudad.classList.add("is-invalid");
    }
    //Validar que la ciudad no tenga más de 15 letras, no se permiten números ni caracteres especiales
    else if (ciudad.value.length > 15 || /[0-9]/.test(ciudad.value) || /[^A-Za-z\s]/.test(ciudad.value)) {
        validacionCiudad.textContent = "La ciudad no debe contener más de 15 letras, no se permiten números ni caracteres especiales";
        ciudad.classList.remove("is-valid");
        ciudad.classList.add("is-invalid");
    }
    else {
        ciudad.classList.remove("is-invalid");
        ciudad.classList.add("is-valid");
    }
    verificarCamposInvalidosLocacion();
}
function validarEstado(){
    var estado = document.getElementById("estado_provincia");
    var validacionEstado = document.getElementById("validacionEstado");

    validacionEstado.textContent = "";

    if (estado.value.length === 0) {
        validacionEstado.textContent = "Ingrese un estado válido";
        estado.classList.remove("is-valid");
        estado.classList.add("is-invalid");
    }
    //Validar que el estado no tenga más de 20 letras, no se permiten números ni caracteres especiales
    else if (estado.value.length > 20 || /[0-9]/.test(estado.value) || /[^A-Za-z\s]/.test(estado.value)) {
        validacionEstado.textContent = "El estado no debe contener más de 15 letras, no se permiten números ni caracteres especiales";
        estado.classList.remove("is-valid");
        estado.classList.add("is-invalid");
    }
    else {
        estado.classList.remove("is-invalid");
        estado.classList.add("is-valid");
    }
    verificarCamposInvalidosLocacion();
}
function validarPais() {
    var seleccionarpais = document.getElementById('pais_id');
    var validacionPais = document.getElementById('validacionPais');

    validacionPais.textContent = '';
    //Validar que el país no esté vacío
    if (seleccionarpais.selectedIndex === 0) {
        validacionPais.textContent = 'Seleccione un país válido';
        seleccionarpais.classList.remove('is-valid');
        seleccionarpais.classList.add('is-invalid');
    } else {
        seleccionarpais.classList.remove('is-invalid');
        seleccionarpais.classList.add('is-valid');
    }
    verificarCamposInvalidosLocacion();
}

function verificarCamposInvalidosLocacion() {
    var direccion = document.getElementById("direccion");
    var codigoPostal = document.getElementById("codigo_postal");
    var ciudad = document.getElementById("ciudad");
    var estado = document.getElementById("estado_provincia");
    var seleccionarpais = document.getElementById('pais_id');
    var actualizarLoc = document.getElementById("Actualizar_Loc");
    //Si alguno de los campos está inválido, se deshabilita el botón de actualizar
   if (direccion.classList.contains("is-invalid") || codigoPostal.classList.contains("is-invalid") || ciudad.classList.contains("is-invalid") || estado.classList.contains("is-invalid") || seleccionarpais.classList.contains("is-invalid")) {
        actualizarLoc.disabled = true;
    }
    else {
        actualizarLoc.disabled = false;
    }
}
