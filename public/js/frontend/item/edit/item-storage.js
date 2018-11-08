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

        errorMessageStorage = function () {
            $('#min-error').html('');
            $('#max-error').html('');
            $('#storage-error').html('');
        };

        
        $('#item-storage_stock').on('click', function () {
            minmaxstock_reset();
        });

        let simpan = $('.modal-footer').on('click', '.add-stock', function () {

            errorMessageStorage();
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
                    uuid: item_uuid,
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
                        $('#modal_storage_stock').modal('hide');

                        errorMessageStorage();
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

        let edit_storages = $('.item_storage_datatable').on('click', '.edit', function () {
            save_changes_button();
            let item_id = $(this).data('item_id');
            let storage_id = $(this).data('storage_id');

            $('select[name="storage"]').empty();
            $.ajax({
                url: '/get-storages-combobox/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;
    
                    $('select[name="storage"]').empty();
    
                    $.each(data, function (key, value) {
                        if (key == storage_id){
                        $('select[name="storage"]').append(
                            '<option value="' + key + '" selected>' + value + '</option>'
                        );
                        }else{
                            $('select[name="storage"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );    
                        }

                    });
                }
            });

            let min = $(this).data('min');
            let max = $(this).data('max');

            // document.getElementById('storage').value = storage;
            document.getElementById('min').value = min;
            document.getElementById('max').value = max;
            document.getElementById('item_id').value = item_id;

        });

        

        let update = $('.modal-footer').on('click', '.update-storage', function () {
            errorMessageStorage();
            $('#name-error').html('');
            let item_id = $('input[name=item_id]').val();
            let storage = $('#storage').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/item-storage/'+item_id,
                data: {
                    _token: $('input[name=_token]').val(),
                    storage: storage,
                    min: min,
                    max: max,
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
                        $('#modal_storage_stock').modal('hide');

                        errorMessageStorage();
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
