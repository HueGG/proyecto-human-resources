const tiempo = document.getElementById('TIEMPO');
const fecha = document.getElementById('date');

const nombresMes = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
];

const intervalo = setInterval(() => {
    const local = new Date();
    let dia = local.getDate(),
        mes = local.getMonth(),
        anio = local.getFullYear();
    let a = local.toLocaleTimeString();
    tiempo.innerHTML = a;
    //date.innerHTML = '${dia} ${nombresMes[mes]} ${anio}';
    fecha.innerHTML = dia + ' ' + nombresMes[mes] + ' '+anio;

},1000);
