// SweetAlert
    const flashData = $('.flash-data').data('flash');

    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'SUKSES',
            text: 'Data Berhasil ' + flashData
        });
    };

    const flashDataGagal = $('.flash-data-gagal').data('flashgagal');

    if (flashDataGagal) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data sedang digunakan pada ' + flashDataGagal
        });
    };

    const flashDataToken = $('.flash-data-token').data('flashtoken');

    if (flashDataToken) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Token yang anda masukkan ' + flashDataToken
        });
    };

    // tombol hapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Yakin??',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });

// Select2
$(document).ready(function() {
    $('.selectMultiple').select2();
});

function edit_periode(guru_id) {
    $('#kelasUbah' + guru_id).select2();
}

function edit_periode1(mapel_id) {
    $('#jurusanUbah' + mapel_id).select2();
}

function reloadpage()
{
    location.reload()
}

$(document).ready(function() {
    $('.summernote').summernote({
        placeholder: 'Silakan tulis sesuatu disini..',
        tabsize: 2,
        height: 0,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['', 'codeview', 'help']]
        ]
    });
});
