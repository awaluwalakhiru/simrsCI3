/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

$(window).on('load', function () {
    $('.loading').fadeOut('slow');
})

$(function () {
    $(document).on('click', '.logout', function (e) {
        e.preventDefault();
        swal(
            {
                title: 'Apa anda yakin?',
                text: 'Setelah klik ini anda akan keluar',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Selamat Anda sedang keluar', {
                        icon: 'success',
                        buttons: false,
                    });
                    var href = $(this).attr('href');
                    setTimeout(function () {
                        window.location = href;
                    }, 2000);
                } else {
                    swal('Anda tidak jadi keluar', {
                        icon: 'info',
                        buttons: false,
<<<<<<< HEAD
                        timer: 2000
=======
                        timer: 3000
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
                    });
                }
            }
            );
<<<<<<< HEAD
    });
    $("a.hapus").click(function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        swal({
            title: 'Yakin akan menghapus data?',
            text: 'Data akan dihapus.',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    location.href = href;
                }
            });
    });
=======
    })
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
})