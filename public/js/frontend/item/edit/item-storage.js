let ItemStorage = {
    init: function () {

        let minmaxstock_reset = function () {
            document.getElementById('min').value = '';
            document.getElementById('max').value = '';
        
            $('#min-error').html('');
            $('#max-error').html('');
            $('#storage-error').html('');
            $('#storage').select2('val', 'All');
        }

        $('.modal-footer').on('click', '.reset', function () {
            minmaxstock_reset();
        });

        let simpan = $('.modal-footer').on('click', '.add-stock', function () {
            let code = $('input[name=code]').val();
            $('#name-error').html('');
            let storage = $('#storage').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-storage',
                data: {
                    _token: $('input[name=_token]').val(),
                    storage: storage,
                    min: min,
                    max: max,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.storage) {
                            $('#storage-error').html(data.errors.storage[0]);
                        }
                        if (data.errors.min) {
                            $('#min-error').html(data.errors.min[0]);
                        }
                        if (data.errors.max) {
                            $('#max-error').html(data.errors.max[0]);
                        }
                        document.getElementById('storage').value = storage;
                        document.getElementById('min').value = min;
                        document.getElementById('max').value = max;

                    } else {
                        $('#modal_minmaxstock').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        minmaxstock_reset();
                        let table = $('.item_storage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });


        let remove_storages = $('.item_storage_datatable').on('click', '.delete', function () {
            let triggerid = $(this).data('item_id');
            let triggerid2 = $(this).data('storage_id');
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
                        url: '/item-storage/' + triggerid + '/'+ triggerid2,
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_storage_datatable').mDatatable();
                            table.originalDataSet =[];
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
    ItemStorage.init();
});
