let Aircraft = {
    init: function () {
        $('.aircraft_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/aircraft',
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
                serverSorting: !1
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
                    field: 'manufacturer.name',
                    title: 'Manufacturer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_aircraft" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-aircraft" title="Edit" data-uuid=' +
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

        let aircraft_reset = function () {
            document.getElementById('name').value = '';
            document.getElementById('code').value = '';
            $('#manufacturer_id').select2('val', 'All');

            $('#code-error').html('');
            $('#name-error').html('');
            $('#manufacturer-error').html('');
        }

        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let simpan = $('.modal-footer').on('click', '.add-aircraft', function () {
            mApp.block(".add-aircraft");

            let name = $('input[name=name]').val();
            let code = $('input[name=code]').val();
            let manufacturer_id =$('#manufacturer_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/aircraft',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                    manufacturer_id: manufacturer_id
                },
                success: function (data) {
                    mApp.unblock(".add-aircraft");

                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }
                        if (data.errors.manufacturer_id) {
                            $('#manufacturer_id-error').html(data.errors.manufacturer_id[0]);

                        }


                    } else {

                        $('#modal_aircraft').modal('hide');

                        toastr.success('Aircraft has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.aircraft_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let edit = $('.aircraft_datatable').on('click', '.edit-aircraft', function edit () {
            save_changes_button();

            let triggerid = $(this).data('uuid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/aircraft/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('code').value = data.code;
                    $.ajax({
                        url: '/get-manufacturers/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (manufacturer) {
                            $('select[name="manufacturer_id"]').empty();

                            $.each(manufacturer, function (key, value) {
                                if(key == data.manufacturer_id){
                                    $('select[name="manufacturer_id"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="manufacturer_id"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#aircraft-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            let name = $('input[name=name]').val();
            let code = $('input[name=code]').val();
            let manufacturer_id =$('#manufacturer_id').val();
            let triggeruuid = $('input[name=uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/aircraft/' + triggeruuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                    manufacturer_id: manufacturer_id
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }
                        if (data.errors.manufacturer_id) {
                            $('#manufacturer_id-error').html(data.errors.manufacturer_id[0]);

                        }

                    } else {
                        save_changes_button();
                        aircraft_reset();
                        $('#modal_aircraft').modal('hide');

                        toastr.success('Aircraft has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.aircraft_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let close = $('.modal-footer').on('click', '.clse', function () {
            save_button();
            aircraft_reset();
        });

        $('.aircraft_datatable').on('click', '.delete', function () {
            let aircraft_uuid = $(this).data('uuid');

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
                        url: '/aircraft/' + aircraft_uuid + '',
                        success: function (data) {
                            toastr.success('Aircraft has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.aircraft_datatable').mDatatable();

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
    Aircraft.init();
});
