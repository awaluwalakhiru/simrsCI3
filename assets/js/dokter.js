$(function () {
    $('#tb_dokter').dataTable({
        "columnDefs": [{
            "targets": [0, 1, 5, 6],
            "orderable": false
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
        if ($('.pilih:checked').length === $('.pilih').length) {
            $('#pilih_semua').prop('checked', true);
        } else {
            $('#pilih_semua').prop('checked', false);
        }
    });

});
function hapus() {
    if ($('.pilih:checked').length !== 0) {
        document.proses.submit();
    } else {
        swal(
            {
                title: 'Delete Tidak Bisa',
                text: 'Mohon Check list dahulu',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Ulangi lagi yaa', {
                        icon: 'info',
                        buttons: false,
                        timer: 1000
                    });
                } else {
                    swal('Delete tidak jadi', {
                        icon: 'error',
                        buttons: false,
                        timer: 1000
                    });
                }
            }
            );
    }
}