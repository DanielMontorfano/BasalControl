$(document).ready(function() {    
    $('#listado').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Viendo _START_ al _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
		"ordering": false,  //Funciona bien, desactiva los botones  de orden de toda las columnas
        
		// columnDefs: [
		//	{ orderable: false, targets: [3,4] } //desactiva boton de ordenar en las columnas
		//  ],


		 // order: [[1, 'asc']]
		 //"order": [[ 1, "desc" ]],

		 dom: 'Brftilp',
buttons: [ 
    {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-info btn-success'
    },
    {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info btn-success'
    },
    {
        text: '<i class="fa-solid fa-children"></i> Todos',
        className: 'btn btn-info',
        action: function () {
            var table = $('#listado').DataTable();
            table.search('').draw();
        }
    },
    {
        text: '<i class="fa-solid fa-arrow-right-to-bracket"></i> Salieron',
        className: 'btn btn-info',
        action: function () {
            var table = $('#listado').DataTable();
            table.search('salió').draw();
        }
    },
    {
        text: '<i class="fa-solid fa-arrow-right-from-bracket"></i> Ingresaron',
        className: 'btn btn-info',
        action: function () {
            var table = $('#listado').DataTable();
            table.search('En planta').draw();
        }
    },
	{
		text: '<i class="fa-solid fa-calendar-day"></i> Hoy',
		className: 'btn btn-info',
		action: function () {
			var table = $('#listado').DataTable();
			var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
			var today = new Date().toLocaleDateString('es-ES', options);
			today = today.split('/').reverse().join('-');
			table.search(today).draw();
		}
	}
]




	
		//"columnDefs": [ {
		//	"targets": 2,
		//	"orderable": false
			//} ],
			



    });     
});