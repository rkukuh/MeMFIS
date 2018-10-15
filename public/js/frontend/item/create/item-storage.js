let ItemStorage = {
    init: function () {

        load_table_minmaxstock = function () {
            let code = $('input[name=code]').val();

            $('.m_datatable2').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/get-item-storages/' + code + '/',
                            map: function (raw) {
                                let dataSet = raw;

                                if (typeof raw.data !== 'undefined') {
                                    dataSet = raw.data;
                                }

                                return dataSet;
                            }
                        }
                    },
                    pageSize: 10,
                    serverPaging: !0,
                    serverFiltering: !0,
                    serverSorting: !0
                },
                layout: {
                    theme: 'default',
                    class: '',
                    scroll: false,
                    footer: !1
                },
                sortable: !0,
                filterable: !1,
                pagination: !0,
                search: {
                    input: $('#generalSearch')
                },
                toolbar: {
                    items: {
                        pagination: {
                            pageSizeSelect: [5, 10, 20, 30, 50, 100]
                        }
                    }
                },
                columns: [{
                        field: 'name',
                        title: 'Storage',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'pivot.max',
                        title: 'Max',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'pivot.min',
                        title: 'Min',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'Actions',
                        width: 110,
                        title: 'Actions',
                        sortable: !1,
                        overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="'+t.pivot.item_id+'"' +
                                'data-storage_id="'+t.pivot.storage_id+'"'+
                                ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                ]
            });
        };

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
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.min) {
                            $('#min-error').html(data.errors.min[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.max) {
                            $('#max-error').html(data.errors.max[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                    } else {
                        $('#modal_minmaxstock').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        load_table_minmaxstock();
                        minmaxstock_reset();
                        let table = $('.m_datatable2').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });


        let remove_storages = $('.m_datatable').on('click', '.delete', function () {
            let triggerid = $(this).data('id');
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

                            let table = $('.m_datatable').mDatatable();
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
