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
                        if (data.title == "Danger") {
                            toastr.error("Storage already exists!", "Error", {
                                timeOut: 5000
                            });
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
                }
            });
        });

        $('.item_storage_datatable').on('click', '.edit', function () {
            save_changes_button();

            let storage_id = $(this).data('storage_id');

            $('select[name="item_storage_id"]').empty();

            $.ajax({
                url: '/get-storages-combobox/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;

                    $('select[name="item_storage_id"]').empty();

                    $.each(data, function (key, value) {
                        if (key == storage_id) {
                            $('select[name="item_storage_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="item_storage_id"]').append(
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
                        document.getElementById('min').value = min;
                        document.getElementById('max').value = max;

                    } else {
                        $('#item_storage_id').select2('val', 'All');

                        errorMessageStorage();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        let table = $('.item_storage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_storage_stock').modal('hide');

                    }
                }
            });
        });

        $('.item_storage_datatable').on('click', '.delete', function () {
            let item_uuid = $(this).data('item_uuid');
            let storage_uuid = $(this).data('storage_uuid');

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
                        url: '/item/' + item_uuid + '/'+ storage_uuid+ '/storage/',
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
