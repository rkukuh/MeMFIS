let ItemUnit = {
    init: function () {

        errorMessageUom = function () {
            $('#uom_quantity-error').html('');
            $('#item_unit-error').html('');
        };

        $('.modal-footer').on('click', '.add-uom', function () {
            errorMessageUom();

            let item_unit_id = $('#item_unit_id').val();
            let uom_quantity = $('input[name=uom_quantity]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
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
            let item_id = $(this).data('item_id');
            let unit_id = $(this).data('unit_id');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/item/' + item_id + '/' + unit_id,
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
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    ItemUnit.init();
});
