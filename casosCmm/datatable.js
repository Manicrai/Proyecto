$(document).ready(function(){
    var table = $('#user-table').DataTable({
      processing: true,
      serverSider: true,
      ajax: '{!! route('dataTableUser') !!}',
      columns: [
        {data: 'id'},
        {data: 'titulo'},
        {data: 'solicitante'},
        {data: 'categoria'},
        {data: 'btn' },
        // {data: 'edit'},
        // {data: 'delete'}
      ],
      // merge
      "columnDefs":[
        {
          "render": function(data, type, row){
            return data +' - '+row['categoria'];
          },
          "targets": 1
        },
        {
          "visible": false, "targets": [2]
        }
      ],
      "pageLength": 10,
      "lengthMenu": [10, 50],
      "dom": 'lrtip',
      "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        // "info": "_TOTAL_ registros",
        // "search": "Buscar",
        // "paginate":{
        //   "next": "siguiente",
        //   "previous": "anterior"
        // },
        // "lengthMenu": 'Mostrar <select>' +
        //               '<option value="10">10</option>'+
        //               '<option value="50">50</option>'+
        //               '</select> registros',
        // "loadingRecords": "Cargando...",
        // "processing": "Procesando",
        // "emptyTable": "No hay registros",
        // "zeroRecords": "Sin registros"
      }
    });
    // text search
    $('.filter-input').keyup(function(){
      table.column($(this).data('column'))
      .search($(this).val())
      .draw();
    });
    // dropdown
    $('.filter-select').change(function(){
    table.column($(this).data('column'))
    .search($(this).val())
    .draw();
    });
  });
