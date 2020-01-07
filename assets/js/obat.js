$(function () {
    var semua = $('#table_obat').data('semua');
    var edit = $('#table_obat').data('edit');
    var hapus = $('#table_obat').data('hapus');

    $('#table_obat').dataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": semua,
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [3],
            "orderable": false,
            "searchable": false,
            "render": function (data, type, row) {
                var btn = "<a class=\"btn btn-sm btn-primary btn-action mr-1\" data-toggle=\"tooltip\" title=\"Edit\" href=" + edit + "" + data + "><i class=\"fas fa-edit\"></i></a><a class=\"btn btn-sm btn-danger btn-action\" onclick=\"hapus()\" data-toggle=\"tooltip\" title=\"Hapus\" href=" + hapus + "" + data + "><i class=\"fas fa-trash\"></i></a>";
                return btn;
            }
        }, {
            "targets": [0],
            "orderable": false,
            "searchable": false,
        }]
    });
});
