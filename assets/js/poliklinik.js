$(function () {
    $('#table_poliklinik').dataTable({
        "columnDefs": [{
            "targets": [3],
            "orderable": false,
            "searchable": false,
        }]
    });
    $('#pilih_semua').click(function () {
        if (this.checked) {
            $('.pilih').each(function () {
                this.checked = true;
            });
        } else {
            $('.pilih').each(function () {
                this.checked = false;
            });
        }
    });
    $('.pilih').click(function () {
        if ($('.pilih:checked').length == $('.pilih').length) {
            $('#pilih_semua').prop('checked', true);
        } else {
            $('#pilih_semua').prop('checked', false);
        }
    });
});


