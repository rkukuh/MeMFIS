let ItemUnit = {
    init: function () {

        $('.modal-footer').on('click', '.reset', function () {
            uom_reset();
        });


        let simpan = $('.modal-footer').on('click', '.add-uom', function () {
            let uom_quantity = $('input[name=uom_quantity]').val();
            let item_unit_id = $('#item_unit_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-unit',
                data: {
                    _token: $('input[name=_token]').val(),
                    uuid: item_uuid,
                    uom_quantity: uom_quantity,
                    unit_id: item_unit_id,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.uom_quantity) {
                            $('#uom_quantity-error').html(data.errors.uom_quantity[0]);

                        }
                        if (data.errors.unit_id) {
                            $('#item_unit-error').html(data.errors.unit_id[0]);

                        }
                        document.getElementById('uom_quantity').value = uom_quantity;
                        document.getElementById('item_unit_id').value = item_unit_id;
                    } else {
                        $('#modal_uom').modal('hide');

                        toastr.success('Material has been updated.', 'Success', {
                            timeOut: 5000
                        });
                        uom_reset();
                        let table = $('.item_unit_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });

        let remove_uom = $('.m_datatable1').on('click', '.delete', function () {
            let triggerid = $(this).data('id');
            let triggerid2 = $(this).data('unit_id');
            // alert(triggerid);

            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/item-unit/' + triggerid + '/' + triggerid2,
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable1').mDatatable();
                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                    swal(
                        'Deleted!',
                        'Your imaginary file has been deleted.',
                        'success'
                    );
                } else {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });

        $('#modal_customer').on('hidden.bs.modal', function (e) {
            $(this).find('#CustomerForm')[0].reset();

            $('#name-error').html('');
        });
    }
};

jQuery(document).ready(function () {
    ItemUnit.init();
});
