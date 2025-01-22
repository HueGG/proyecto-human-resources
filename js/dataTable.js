$(document).ready(function() {
    $('#tabla_Empleado').DataTable({
        responsive: "true",
        dom: 'Bfrtilp',
        pageLength: 10,
        language: {
            search: 'Filtro para reportes:', // Remueve el texto "Buscar" predeterminado
        },
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                orientation: 'landscape', // Establece la orientación horizontal
                customize: function(doc) {
                    doc.defaultStyle.alignment = 'center'; // Centra el contenido del documento
                },
                exportOptions: {
                    action: 'open' // Abre el PDF en una nueva pestaña
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ],
    });
});


//DataTable con botones para la tabla del Job History
$(document).ready(function () {
    $('#tabla_historico').DataTable({
        responsive: "true",
        dom: 'Bfrtilp',
        language: {
            search: 'Filtro para reportes:', // Remueve el texto "Buscar" predeterminado
        },
        buttons: [
            {
                extend: 'excelHtml5',
                text:   '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text:   '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text:   '<i class="fas fa-print"></i>',
                titleAttr: 'imprimir',
                className: 'btn btn-info'
            },
        ]
    });
});

//DataTable con botones para la tabla de Locaciones
$(document).ready(function () {
    $('#tabla_locaciones').DataTable({
        responsive: "true",
        dom: 'Bfrtilp',
        language: {
            search: 'Filtro para reportes:', // Remueve el texto "Buscar" predeterminado
        },
        pageLength: 6,
        buttons: [
            {
                extend: 'excelHtml5',
                text:   '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text:   '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text:   '<i class="fas fa-print"></i>',
                titleAttr: 'imprimir',
                className: 'btn btn-info'
            },
        ]
    });
});

//DataTable con botones para la tabla de Departamentos
$(document).ready(function () {
    $('#tabla_departamentos').DataTable({
        responsive: "true",
        dom: 'Bfrtilp',
        pageLength: 6,
        language: {
            search: 'Filtro para reportes:', // Remueve el texto "Buscar" predeterminado
        },
        buttons: [
            {
                extend: 'excelHtml5',
                text:   '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text:   '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text:   '<i class="fas fa-print"></i>',
                titleAttr: 'imprimir',
                className: 'btn btn-info'
            },
        ]
    });
});

//DataTable con botones para la tabla de Departamentos
$(document).ready(function () {
    $('#tabla_Asistencias').DataTable({
        responsive: "true",
        
        pageLength: 10,
        language: {
            search: 'Buscar Empleado:', // Remueve el texto "Buscar" predeterminado
        }        
    });
});

//DataTable con botones para la tabla de Departamentos
$(document).ready(function () {
    $('#tabla_hojavida').DataTable({
        responsive: "true",
        
        pageLength: 10,
        language: {
            search: 'Buscar Empleado:', // Remueve el texto "Buscar" predeterminado
        }        
    });
});