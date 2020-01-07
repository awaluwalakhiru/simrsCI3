$(function () {
    var semua = $('#table_pasien').data('semua');
    var edit = $('#table_pasien').data('edit');
    var hapus = $('#table_pasien').data('hapus');

    $('#table_pasien').dataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": semua,
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [6],
            "orderable": false,
            "searchable": false,
            "render": function (data, type, row) {
                var btn = "<a class=\"btn btn-sm btn-primary btn-action mr-1\" data-toggle=\"tooltip\" title=\"Edit\" href=" + edit + "" + data + "><i class=\"fas fa-edit\"></i></a><a class=\"btn btn-sm btn-danger btn-action\" onclick=\"return confirm('Yakin mau menghapus data?');\" data-toggle=\"tooltip\" title=\"Hapus\" href=" + hapus + "" + data + "><i class=\"fas fa-trash\"></i></a>";
                return btn;
            }
        }, {
            "targets": [0, 3, 5],
            "orderable": false,
            "searchable": false,
        }],
        // scrollY: "400px",
        dom: "Bfrtip",
        buttons: [{
            extend: 'pdf',
            orientation: 'potrait',
            pageSize: 'Legal',
            title: 'Data Pasien',
            download: 'open'
        }, 'csv', 'excel', 'print', 'copy'],
    });
});