let EmployeeJobTitle = {
    init: function () {
        $('.m_datatable_job_title').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/job-title',

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
                    field: '#',
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
                        return '<a id="view-job-title" data-toggle="modal" data-target="#modal_job_title" href="#" data-uuid=' +
                            t.uuid +'>'+t.code+'</a>'
                    }
                },
                {
                    field: 'name',
                    title: 'Job Title Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Action',
                    width: 110,
                    title: 'Action',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button id="edit-job-title" data-toggle="modal" data-target="#modal_job_title" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-unit" title="Edit" data-uuid-job=' +
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

        let reset = function (){
            $('#code_job_title').val('')
            $('#name_job_title').val('')
            $('#description_job_title').val('')
            $('#specification').val('')
            $('#code_job_title-error').html('')
            $('#name_job_title-error').html('')
            $('#description_job_title-error').html('')
            $('#specification-error').html('')
        }

        let disabled = function(){
            $('#code_job_title').attr('disabled', true)
            $('#name_job_title').attr('disabled', true)
            $('#description_job_title').attr('disabled', true)
            $('#specification').attr('disabled', true)
            $('.modal-change-job-title').hide()
            $('#reset-job-title').hide()
            
        }

        let enabled = function(){
            $('#code_job_title').attr('disabled', false)
            $('#name_job_title').attr('disabled', false)
            $('#description_job_title').attr('disabled', false)
            $('#specification').attr('disabled', false)
            $('.modal-change-job-title').show()
            $('#reset-job-title').show()
        }

        let button_reset = $(document).on('click','#reset-job-title', function (){
            reset()
        });

        let button_close = $(document).on('click','#close-job-title', function (){
            reset()
        });

        let show = $(document).on('click', '#add-job-title', function () {      
            reset()
            enabled()
            $('.labelModal-Job').children('span').text('Create New');
            $('.modal-change-job-title').attr('id','add-job')
        });

        let store = $(document).on('click', '#add-job', function () {
            let code = $('input[name=code_job_title]').val()
            let name = $('input[name=name_job_title]').val()
            let description_job = $('#description_job_title').val()
            let specification = $('#specification').val()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/job-title',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description_job,
                    specification: specification
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code_job_title-error').html(data.errors.code[0]);
                        }else{
                            $('#code_job_title-error').html('');
                        }
                        if (data.errors.name) {
                            $('#name_job_title-error').html(data.errors.name[0]);
                        }else{
                            $('#name_job_title-error').html('');
                        }
                        if (data.errors.description) {
                            $('#description_job_title-error').html(data.errors.description[0]);
                        }else{
                            $('#description_job_title-error').html('');
                        }
                        if (data.errors.specification) {
                            $('#spesification-error').html(data.errors.description[0]);
                        }else{
                            $('#spesification-error').html('')
                        }
                    } else {
                        $('#modal_job_title').modal('hide');

                        toastr.success('Job title has been create.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable_job_title').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            }); 
        });


        let edit = $(document).on('click', '#edit-job-title', function () {      
               reset()
               enabled()
                $('.labelModal-Job').children('span').text('Edit');
                $('.modal-change-job-title').attr('id','update-job')
                let triggerid = $(this).data('uuid-job');

                $('#employee_uuid').val(triggerid)

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/job-title/' + triggerid + '/edit',
                    success: function (data) {
                        $('#code_job_title').val(data.code)
                        $('#name_job_title').val(data.name)
                        $('#description_job_title').val(data.description)
                        $('#specification').val(data.specification)
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

            let showView = $(document).on('click', '#view-job-title', function () {      
                reset()
                disabled()
                 $('.labelModal-Job').children('span').text('View');
                 $('.modal-change-job-title').attr('id','update-job')
                 let triggerid = $(this).data('uuid');
 
                 $('#employee_uuid').val(triggerid)
 
                 $.ajax({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'get',
                     url: '/job-title/' + triggerid,
                     success: function (data) {
                         $('#code_job_title').val(data.code)
                         $('#name_job_title').val(data.name)
                         $('#description_job_title').val(data.description)
                         $('#specification').val(data.specification)
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


            let update = $(document).on('click', '#update-job', function () {
                let code = $('input[name=code_job_title]').val()
                let name = $('input[name=name_job_title]').val()
                let description_job = $('#description_job_title').val()
                let specification = $('#specification').val()

                let triggerid = $('input[name=employee_uuid]').val()

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'put',
                    url: '/job-title/' + triggerid,
                    data: {
                        _token: $('input[name=_token]').val(),
                        code: code,
                        name: name,
                        description: description_job,
                        specification: specification,
                    },
                    success: function (data) {
                        if (data.errors) {
                            if (data.errors.code) {
                                $('#code_job_title-error').html(data.errors.code[0]);
                            }else{
                                $('#code_job_title-error').html('');
                            }
                            if (data.errors.name) {
                                $('#name_job_title-error').html(data.errors.name[0]);
                            }else{
                                $('#name_job_title-error').html('');
                            }
                            if (data.errors.description) {
                                $('#description_job_title-error').html(data.errors.description[0]);
                            }else{
                                $('#description_job_title-error').html('');
                            }
                            if (data.errors.specification) {
                                $('#spesification-error').html(data.errors.description[0]);
                            }else{
                                $('#spesification-error').html('')
                            }
                        } else {
                            $('#modal_job_title').modal('hide');

                            toastr.success('Job title has been updated.', 'Success', {
                            timeOut: 5000
                            });

                            let table = $('.m_datatable_job_title').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                            }
                    }
                });
            });

            $('.m_datatable_job_title').on('click', '.delete', function () {
                let uuid = $('#edit-job-title').data('uuid-job');
    
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
                            url: '/job-title/' + uuid + '',
                            success: function (data) {
                                toastr.success('Job title has been deleted.', 'Deleted', {
                                        timeOut: 5000
                                    }
                                );
    
                                let table = $('.m_datatable_job_title').mDatatable();
    
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

            let refresh_datatable = $(document).on('click', '#m_tab_6_2', function () {
                let table = $('.m_datatable_job_title').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
            });

    }
};

jQuery(document).ready(function () {
    EmployeeJobTitle.init();
});
