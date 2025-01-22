function peticionEmpleado(url, empleado_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuesta(this);
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(empleado_id);
    ajax.send("empleado_id=" + empleado_id);
}

function peticionEmpleadoEliminar(url, empleado_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuestaEliminar(this);
            setTimeout(function() {
                window.location.href = 'index.php';
              }, 5000); // 3000 milisegundos = 3 segundos
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(empleado_id);
    ajax.send("empleado_id=" + empleado_id);
    setTimeout(function() {
        window.location.href = 'index.php';
      }, 5000); // 3000 milisegundos = 3 segundos
    // Actualizar la página después de recibir la respuesta
    
}

/******************************************************* */
/******************************************************* */
/******************************************************* */
function peticionHistorialAsistencia(url, empleado_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuesta(this);
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(empleado_id);
    ajax.send("empleado_id=" + empleado_id);
}

function peticionHojaVida(url, empleado_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuesta(this);
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(empleado_id);
    ajax.send("empleado_id=" + empleado_id);
}
/********************************************************/
/********************************************************/
/********************************************************/
function peticionLocacion(url, locacion_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuesta(this);
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(locacion_id);
    ajax.send("locacion_id=" + locacion_id);
}
/********************************************************/
/********************************************************/
/********************************************************/
function peticionDepartamento(url, departamento_id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            respuesta(this);
        }
    };
    ajax.open("POST", url, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(departamento_id);
    ajax.send("departamento_id=" + departamento_id);
}


/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><*/
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><*/
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><*/
function respuesta(ajax) {
    var html = ajax.responseText;
    document.getElementById("contenedor_01").innerHTML = html;
}

function respuestaEliminar(ajax) {
    var html = ajax.responseText;
    document.getElementById("contenedor_tabla_resumen").innerHTML = html;
}