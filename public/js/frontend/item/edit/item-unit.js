let ItemUnit = {
    init: function () {

        let uom_reset = function () {
            document.getElementById('uom_quantity').value = '';

            $('#unit2-error').html('');
            $('#unit2').select2('val', 'All');
            $('#uom_quantity-error').html('');
        }

        $('.modal-footer').on('click', '.reset', function () {
            uom_reset();
        });


        errorMessageUom = function () {
            $('#uom_quantity-error').html('');
            $('#unit2-error').html('');
        };


        $('.modal-footer').on('click', '.add-uom', function () {
            errorMessageUom();

            let uom_quantity = $('input[name=uom_quantity]').val();
            let item_unit_id = $('#item_unit_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item/' + item_uuid + '/unit',
                data: {
                    _token: $('input[name=_token]').val(),
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
                        errorMessageUom();
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

        $('.item_unit_datatable').on('click', '.delete', function () {
            let triggerid = $(this).data('item_id');
            let triggerid2 = $(this).data('unit_id');

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

                            let table = $('.item_unit_datatable').mDatatable();
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
