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



function validarLongitudPass() {
    
  
    const max = 45;
    
    var passwordInput = document.getElementById('contrasena');
    var txtValidacionPassword = document.getElementById('validacionPassword');
    
    passwordInput.value = passwordInput.value.length > max ? passwordInput.value.slice(0, max) : passwordInput.value ; //Se trunca el valor 
    var passwd = passwordInput.value; //eliminan espacios en blanco al pricipio y fin

    if (passwd.length === 0 ) {
        passwordInput.className = "form-control is-invalid";
        txtValidacionPassword.className = "invalid-feedback";
        txtValidacionPassword.innerHTML = "Debe ingresar una contraseña.";

        //console.log('Vacio: '+passwordInput.value);
        return false;
    } else if (passwd.length > max) {
        
        passwordInput.className = "form-control is-invalid";
        txtValidacionPassword.className = "invalid-feedback";
        txtValidacionPassword.innerHTML = "La contraseña no puede exceder los "+max+" caracteres.";
        
        //console.log('Max Failure: '+passwordInput.value);
        return false;
        
    } else {
        // passwd válido, no se muestra ningún mensaje de error
        passwordInput.className = "form-control is-valid";
        txtValidacionPassword.className = "valid-feedback";
        txtValidacionPassword.innerHTML = "";
        //console.log('Valido '+passwordInput.value);
        return true;
  }
  }


function validarFormularioLogIn(){
    var botonSubmit = document.getElementById('submitBtn');

    if(  !validarCorreo() || !validarLongitudPass() ){
        botonSubmit.disabled = true;
        botonSubmit.style.color = "red";
    }else{
        botonSubmit.style.color = "white";
        botonSubmit.disabled = false;
    }
}