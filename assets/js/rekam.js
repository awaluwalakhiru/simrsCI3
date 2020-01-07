$(function () {
    $('#table_rekam_medis').dataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [7, 8]
        }]
    });
});