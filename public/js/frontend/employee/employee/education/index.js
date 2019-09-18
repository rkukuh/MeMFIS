let EducationEmployee = {
    init: function () {
        let uuid = $('input[name=employee_uuid]').val();
        $('.education_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee/'+uuid+'/employee-school',

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
                    field: 'institute',
                    title: 'Institute/University',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'qualification',
                    title: 'Qualification',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'field_of_study',
                    title: 'Field of Study',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'graduated_at',
                    title: 'Graduation Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button id="edit-employee-education" data-toggle="modal" data-target="#modal_education" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-unit" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-education" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        let reset = $(document).on('click', '#create-new', function () {
            $('.button-education').attr('id','create-education')
            $('.button-education').removeAttr('data-uuid')
            document.getElementById("education-reset").click()
        })

        let edit = $(document).on('click', '#edit-employee-education', function () {
            $('.button-education').attr('id','edit-education')
            $('#edit-education').attr('data-uuid',$(this).data('uuid'))
            $('#education_document').val(null)

            let triggerid = $(this).data('uuid')
            let uuid = $('input[name=employee_uuid]').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/employee/' + uuid + '/education/' + triggerid + '/edit',
                    success: function (data) {
                        $('#institute').val(data['data'].institute)
                        $('#graduation_date').val(data['data'].graduated_at)
                        $('#field_of_study').val(data['data'].field_of_study)
                        $('#education_document-label').text(data['media'])
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
        })

        let update = $(document).on('click', '#edit-education', function () {
            let triggerid = $(this).data('uuid')
            let uuid = $('input[name=employee_uuid]').val();

            let institute = $('input[name=institute]').val()
            let qualification = $('#qualification option:selected').val()
            let field_of_study = $('input[name=field_of_study]').val()
            let graduation_date = $('input[name=graduation_date]').val()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/employee/'+uuid+'/education/'+ triggerid,
                data: {
                    institute: institute,
                    qualification: qualification,
                    field_of_study: field_of_study,
                    graduation_date: graduation_date
                },
                success: function (data) {
                   if (data.errors) {
                       $.each(data.errors, function (key, value) {
                           if (data.errors.institute) {
                               $('#institute-error').html(data.errors.institute[0]);
                           }else{
                               $('#institute-error').html('');
                           }
   
                           if (data.errors.graduation_date) {
                               $('#graduation_date-error').html(data.errors.graduation_date[0]);
                           }else{
                               $('#graduation_date-error').html('');
                           }
                           if (data.errors.field_of_study) {
                            $('#field_of_study-error').html(data.errors.field_of_study[0]);
                        }else{
                            $('#field_of_study-error').html('');
                        }
                       });
                   } else {

                    if($("#education_document")[0].files[0]){
                        formData = new FormData()
                        formData.append('document',$("#education_document")[0].files[0])
                        let uuid = $('input[name=employee_uuid]').val()
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/employee/'+uuid+'/education/'+ triggerid +'/update-document', 
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            type: 'POST',
                            success: function (response) {
                                if (response.errors) {
                                    alert(response.errors)
                                    location.reload();
                                }else{
                                toastr.success('Data has been saved.', 'Sukses', {
                                    timeOut: 5000
                                });

                                location.reload();
                            }
                            }
                        })
                    }else{
                       toastr.success('Data has been saved.', 'Sukses', {
                           timeOut: 5000
                       });

                       location.reload();

                    }
   
                   }
                       }
                   })
        })

        let destroy = $(document).on('click', '.delete-education', function () {
            let uuid = $('input[name=employee_uuid]').val()
            let triggerid = $(this).data('uuid')

            swal({
                title: 'Are you sure?',
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
                        url: '/employee/' + uuid + '/education/' + triggerid,
                        success: function (data) {
                            toastr.success('Employee education has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );
                        let table = $('.education_datatable').mDatatable();

                            table.originalDataSet = [];
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
        })

    }
    
};

jQuery(document).ready(function () {
    EducationEmployee.init();
});
