let EmploymentStatus = {
    init: function () {
        $('.m_datatable_employee_status').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee/statuses',

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
                    field: '',
                    title: 'No',
                    width: '40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a id="view-employee-status" data-toggle="modal" data-target="#modal_employment_status" href="#" data-uuid=' +
                            t.uuid +'>'+t.code+'</a>'
                    }
                },
                {
                    field: 'name',
                    title: 'Employment Status Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     width: 110,
                //     title: 'Action',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<button id="edit-employee-status" data-toggle="modal" data-target="#modal_employment_status" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-unit" title="Edit" data-uuid=' +
                //             t.uuid +
                //             '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                //             '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                //             t.uuid +
                //             ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                //         );
                //     }
                // }
            ]
        });

        let reset = function (){
            $('#code_statuses').val('')
            $('#name').val('')
            $('#description').val('')
            $('#code_statuses-error').html('')
            $('#name-error').html('')
            $('#description-error').html('')
        }

        let disabled = function(){
            $('#uuid').attr('disabled',true)
            $('#code_statuses').attr('disabled',true)
            $('#name').attr('disabled',true)
            $('#description').attr('disabled',true)
            $('.modal-change').hide()
            $('#reset').hide()
        }

        let enabled = function(){
            $('#uuid').attr('disabled',false)
            $('#code_statuses').attr('disabled',false)
            $('#name').attr('disabled',false)
            $('#description').attr('disabled',false)
            $('.modal-change').show()
            $('#reset').show()
        }

        let button_reset = $(document).on('click','#reset', function (){
            reset()
        });

        let button_close = $(document).on('click','#close', function (){
            reset()
        });

        let show = $(document).on('click', '#add-employment-status', function () {
            reset()
            enabled()
            $('.labelModal').children('span').text('Create New');
            $('.modal-change').attr('id','add')
        });

        let store = $(document).on('click', '#add', function () {
            let code = $('input[name=code_statuses]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/statuses',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code_statuses-error').html(data.errors.code[0]);
                        }else{
                            $('#code_statuses-error').html('');
                        }
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }else{
                            $('#name-error').html('');
                        }
                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);
                        }else{
                            $('#description-error').html('');
                        }
                    } else {
                        $('#modal_employment_status').modal('hide');

                        toastr.success('Employee status has been create.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable_employee_status').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let showView = $(document).on('click', '#view-employee-status', function () {
            reset()
            disabled()
             $('.labelModal').children('span').text('View')
             $('.modal-change').attr('id','update')
             let triggerid = $(this).data('uuid')

             $('#employee_uuid').val(triggerid)

             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: 'get',
                 url: '/statuses/' + triggerid,
                 success: function (data) {
                     $('#uuid').val(data.uuid)
                     $('#code_statuses').val(data.code)
                     $('#name').val(data.name)
                     $('#description').val(data.description)
                 },
                 error: function (jqXhr, json, errorThrown) {
                     // this are default for ajax errors
                     let errorsHtml = '';
                     let errors = jqXhr.responseJSON;

                     $.each(errors.errors, function (index, value) {
                         alert(value);
                     });
                 }
             });

         });

        let edit = $(document).on('click', '#edit-employee-status', function () {
               reset()
               enabled()
                $('.labelModal').children('span').text('Edit')
                $('.modal-change').attr('id','update')
                let triggerid = $(this).data('uuid')

                $('#employee_uuid').val(triggerid)

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/statuses/' + triggerid + '/edit',
                    success: function (data) {
                        $('#uuid').val(data.uuid)
                        $('#code_statuses').val(data.code)
                        $('#name').val(data.name)
                        $('#description').val(data.description)
                    },
                    error: function (jqXhr, json, errorThrown) {
                        // this are default for ajax errors
                        let errorsHtml = '';
                        let errors = jqXhr.responseJSON;

                        $.each(errors.errors, function (index, value) {
                            alert(value);
                        });
                    }
                });

            });

            let update = $(document).on('click', '#update', function () {
                let code = $('input[name=code_statuses]').val()
                let name = $('input[name=name]').val()
                let description = $('#description').val()
                let triggerid = $('input[name=employee_uuid]').val()

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'put',
                    url: '/statuses/' + triggerid,
                    data: {
                        _token: $('input[name=_token]').val(),
                        code: code,
                        name: name,
                        description: description,
                    },
                    success: function (data) {
                        if (data.errors) {
                            if (data.errors.code) {
                                $('#code_statuses-error').html(data.errors.code[0]);
                            }else{
                                $('#code_statuses-error').html('');
                            }
                            if (data.errors.name) {
                                $('#name-error').html(data.errors.name[0]);
                            }else{
                                $('#name-error').html('');
                            }
                            if (data.errors.description) {
                                $('#description-error').html(data.errors.description[0]);
                            }else{
                                $('#description-error').html('');
                            }
                        } else {
                            $('#modal_employment_status').modal('hide');

                            toastr.success('Employee status has been updated.', 'Success', {
                                timeOut: 5000
                            });

                            let table = $('.m_datatable_employee_status').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                });
            });

            $('.m_datatable_employee_status').on('click', '.delete', function () {
                let uuid = $('#edit-employee-status').data('uuid');

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
                            url: '/statuses/' + uuid + '',
                            success: function (data) {
                                toastr.success('Employee status has been deleted.', 'Deleted', {
                                        timeOut: 5000
                                    }
                                );

                                let table = $('.m_datatable_employee_status').mDatatable();

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

            let refresh_datatable = $(document).on('click', '#m_tab_6_1', function () {
                let table = $('.m_datatable_employee_status').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
            });

    }
};

jQuery(document).ready(function () {
    EmploymentStatus.init();
});
