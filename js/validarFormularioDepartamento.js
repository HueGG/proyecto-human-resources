/*function validarFormulario() {
    var seleccionGerente = document.getElementById('gerente_id');
    var seleccionLocacion = document.getElementById('locacion_id');
  
    var validacionGerente = document.getElementById('validacionGerente');
    var validacionLocacion = document.getElementById('validacionLocacion');
  
    //Limpia los mensajes de error si es que existen 
    validacionGerente.textContent = '';
    validacionLocacion.textContent = '';
  
    if (seleccionGerente.selectedIndex === 0) {
      validacionGerente.textContent = 'Seleccione un gerente válido';
      return false; // No se envia el formulario
    }
  
    if (seleccionLocacion.selectedIndex === 0) {
      validacionLocacion.textContent = 'Seleccione una locación válida';
      return false; // No se envia el formulario
    }
  
    return true; // Permite enviar el formulario si todas las validaciones son exitosas
  } */
  /*function validarGerente() {
    var seleccionGerente = document.getElementById('gerente_id');
    var validacionGerente = document.getElementById('validacionGerente');

    validacionGerente.textContent = '';

    if (seleccionGerente.selectedIndex === 0) {
        validacionGerente.textContent = 'Seleccione un gerente válido';
    }
}

function validarLocacion() {
    var seleccionLocacion = document.getElementById('locacion_id');
    var validacionLocacion = document.getElementById('validacionLocacion');

    validacionLocacion.textContent = '';

    if (seleccionLocacion.selectedIndex === 0) {
        validacionLocacion.textContent = 'Seleccione una locación válida';
    }
}*/
function validarGerente() {
    var seleccionGerente = document.getElementById('gerente_id');
    var validacionGerente = document.getElementById('validacionGerente');

    validacionGerente.textContent = '';

    if (seleccionGerente.selectedIndex === 0) {
        validacionGerente.textContent = 'Seleccione un gerente válido';
        seleccionGerente.classList.remove('is-valid');
        seleccionGerente.classList.add('is-invalid');
    } else {
        seleccionGerente.classList.remove('is-invalid');
        seleccionGerente.classList.add('is-valid');
    }
    verificarCamposInvalidos();
}

function validarLocacion() {
    var seleccionLocacion = document.getElementById('locacion_id');
    var validacionLocacion = document.getElementById('validacionLocacion');

    validacionLocacion.textContent = '';

    if (seleccionLocacion.selectedIndex === 0) {
        validacionLocacion.textContent = 'Seleccione una locación válida';
        seleccionLocacion.classList.remove('is-valid');
        seleccionLocacion.classList.add('is-invalid');
        
    } else {
        seleccionLocacion.classList.remove('is-invalid');
        seleccionLocacion.classList.add('is-valid');
    }
    verificarCamposInvalidos();
}

function verificarCamposInvalidos() {
    var seleccionGerente = document.getElementById('gerente_id');
    var seleccionLocacion = document.getElementById('locacion_id');
    var actualizarBtn = document.getElementById('actualizarBtn');

    if (seleccionGerente.classList.contains('is-invalid') || seleccionLocacion.classList.contains('is-invalid')) {
        actualizarBtn.disabled = true;
    } else {
        actualizarBtn.disabled = false;
    }
}

