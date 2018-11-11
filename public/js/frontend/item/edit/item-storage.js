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

        $('.modal-footer').on('click', '.add-stock', function () {
            errorMessageStorage();

            $('#name-error').html('');

            let storage_id = $('#item_storage_id').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/item/' + item_uuid + '/storage',
                data: {
                    _token: $('input[name=_token]').val(),
                    storage_id: storage_id,
                    min: min,
                    max: max,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.storage_id) {
                            $('#storage-error').html(data.errors.storage_id[0]);
                        }

                        if (data.errors.min) {
                            $('#min-error').html(data.errors.min[0]);
                        }

                        if (data.errors.max) {
                            $('#max-error').html(data.errors.max[0]);
                        }

                        document.getElementById('storage_id').value = storage_id;
                        document.getElementById('min').value = min;
                        document.getElementById('max').value = max;

                    } else {
                        $('#modal_storage_stock').modal('hide');

                        errorMessageStorage();

                        toastr.success('Storage Stock has been created.', 'Success', {
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

        $('.item_storage_datatable').on('click', '.edit', function () {
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
                        if (key == storage_id) {
                            $('select[name="storage"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="storage"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });

            let min = $(this).data('min');
            let max = $(this).data('max');

            document.getElementById('min').value = min;
            document.getElementById('max').value = max;
            document.getElementById('item_id').value = item_id;
        });

        $('.modal-footer').on('click', '.update-storage', function () {
            errorMessageStorage();

            $('#name-error').html('');

            let storage_id = $('#item_storage_id').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/'+item_uuid+'/storage/',
                data: {
                    _token: $('input[name=_token]').val(),
                    storage_id: storage_id,
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

        $('.item_storage_datatable').on('click', '.delete', function () {
            let item_id = $(this).data('item_id');
            let storage_id = $(this).data('storage_id');

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
                        url: '/item/' + item_id + '/'+ storage_id+ '/storage/',
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_storage_datatable').mDatatable();

                            table.originalDataSet =[];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            alert(item_id);
                            alert(storage_id);
        
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
    ItemStorage.init();
});
