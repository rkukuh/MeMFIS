let Bank = {
    init: function () {
        $('.bank_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/bank',
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
                serverFiltering: !1,
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
            columns: [
                {
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_bank" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-bank" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        let bank_reset = function () {
            document.getElementById('code').value = '';
            document.getElementById('name').value = '';

            $('#code-error').html('');
            $('#name-error').html('');
        }

        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let simpan = $('.modal-footer').on('click', '.add-bank', function () {
            let name = $('input[name=name]').val();
            let code = $('input[name=code]').val();
            let type_id =$('#type_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/bank',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                    } else {
                        $('#modal_bank').modal('hide');

                        toastr.success('Bank has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.bank_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let edit = $('.bank_datatable').on('click', '.edit-bank', function edit () {
            save_changes_button();

            let triggerid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/bank/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('code').value = data.code;


                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#bank-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            let name = $('input[name=name]').val();
            let code = $('input[name=code]').val();
            let triggerid = $('input[name=uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/bank/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                    } else {
                        save_changes_button();
                        bank_reset();
                        $('#modal_bank').modal('hide');

                        toastr.success('Bank has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.bank_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let close = $('.modal-footer').on('click', '.clse', function () {
            save_button();
            bank_reset();
        });

        $('.bank_datatable').on('click', '.delete', function () {
            let bank_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/bank/' + bank_uuid + '',
                        success: function (data) {
                            toastr.success('Bank has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.bank_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
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
    Bank.init();
});
