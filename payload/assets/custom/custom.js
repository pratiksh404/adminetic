$(document).ready(function() {
     /**********************************
     *        Admin Global Datatable    *
     **********************************/
    $(".datatable").DataTable({
        "responsive": true,
        "autoWidth": true,
        "order": [],
        "info": true,
        "dom": '<"d-flex justify-content-between align-items-center btn-group">Bfrtip',
        "buttons": [
            {
               extend: 'copy',
               exportOptions: {
               columns: ':not(:last-child)',
               }
            },
            {
                extend: 'csv',
                exportOptions: {
                columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                columns: ':not(:last-child)',
                }
            },
            {
                    extend: 'pdf',
                    exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'print',
                exportOptions: {
                columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary btn-air-primary');

    /**********************************
     *        Admin Global Select2    *
     **********************************/
    $('.select2').select2();
    
    $('.tag').select2({
        dropdownAutoWidth: true,
        tags: true,
        tokenSeparators: [',', ' ']
    });
    /**********************************
     *        Admin Global Simple Texteditor    *
     **********************************/
      $('.texteditor').summernote({
            height: 300,
            tabsize: 2
        });
});
/* ==================================================================================== */
