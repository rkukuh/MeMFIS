let Category = {
    init: function () {
        $('.unit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/unit',
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
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 60
                },
                {
                    field: 'symbol',
                    title: 'Symbol',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'type.name',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_unit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-category" title="Edit" data-id=' +
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

        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let simpan = $('.modal-footer').on('click', '.add-unit', function () {
            let name = $('input[name=name]').val();
            let symbol = $('input[name=symbol]').val();
            let type_id =$('#type_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/unit',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    symbol: symbol,
                    type_id: type_id,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.symbol) {
                            $('#symbol-error').html(data.errors.symbol[0]);

                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                        }

                    } else {
                        $('#modal_unit').modal('hide');

                        toastr.success('Unit has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.unit_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let edit = $('.m_datatable').on('click', '.edit-category', function edit () {
            save_changes_button();

            $('#button').show();
            $('#simpan').text('Perbarui');

            let triggerid = $(this).data('id');
            // alert(triggerid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/category-item/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('id').value = data.uuid;
                    document.getElementById('code_category').value = data.code;
                    document.getElementById('name_category').value = data.name;
                    document.getElementById('description_category').value = data.description;

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            $('#button').show();
            $('#name-error').html('');
            $('#simpan').text('Perbarui');

            let code = $('input[name=code_category]').val();
            let name = $('input[name=name_category]').val();
            let description =$('#description_category').val();
            let triggerid = $('input[name=id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/category-item/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-category-error').html(data.errors.code[0]);

                        }
                        if (data.errors.name) {
                            $('#name-category-error').html(data.errors.name[0]);

                        }

                    } else {
                        $('#modal_category').modal('hide');

                        toastr.success('Category has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.unit_datatable').on('click', '.delete', function () {
            let unit_uuid = $(this).data('uuid');

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
                        url: '/unit/' + unit_uuid + '',
                        success: function (data) {
                            toastr.success('Unit has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.unit_datatable').mDatatable();

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

        $('#modal_customer').on('hidden.bs.modal', function (e) {
            $(this).find('#CustomerForm')[0].reset();

            $('#name-error').html('');
        });
    }
};

jQuery(document).ready(function () {
    Category.init();
});
