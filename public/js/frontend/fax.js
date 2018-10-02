let simpan = $('#add').click(function () {
    let namearray = [];

    $('#name').each(function (i) {
        namearray[i] = document.getElementsByName('[' + i + '][name]')[0].value;
    });

    let registerForm = $('#AjaxTest');
    let formData = registerForm.serialize();

    $('#ajax-error').html('');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/fax',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': namearray,
        },
        success: function (data) {
            if (data.errors) {
                if (data.errors.name) {
                    $('#ajax-error').html(data.errors.name[0]);
                }
            } else {
                $('#modal_fax').modal('hide');

                toastr.success('Data berhasil disimpan.', 'Sukses', {
                    timeOut: 5000
                });

                let table = $('.m_datatable').mDatatable();

                $('#simpan').text('Simpan');
                $('#clean').text('Bersihkan');
            }
        },
    });
});
