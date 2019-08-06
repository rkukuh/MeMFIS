let JobTitle = {
    init: function () {
        $('.m_datatable_job_title').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee',

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
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/employee/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Job Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'dob',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_job_title" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-employee" title="Edit" data-id=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-employee" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $(document).ready(function () {
            $('.btn-success').removeClass('add');
            // document.getElementById('isppn').onchange = function () {
            //     document.getElementById('ppn').disabled = !this.checked;
            // };
        });

        $('.employee_class').on('click', '.btn-primary', function () {
            save_general_license_button();
            employee_employee_reset();
        });

        $('.modal-footer-employee').on('click', '.reset-employee', function () {
            employee_employee_reset();
        });


        $('.modal-footer-employee').on('click', '.add-employee', function () {
            let code = $('input[name=code_employee]').val();
            let first_name = $('input[name=first_name]').val();
            let middle_name = $('input[name=middle_name]').val();
            let last_name = $('input[name=last_name]').val();
            let gender = $('input[name=gender]:checked').val();
            let dob = $('#dob').val();
            let hired_at = $('#hired_at').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/employee',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    first_name: first_name,
                    middle_name: middle_name,
                    last_name: last_name,
                    gender: gender,
                    dob: dob,
                    hired_at: hired_at,

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code_employee-error').html(data.errors.code[0]);

                        }

                        if (data.errors.first_name) {
                            $('#first_name-error').html(data.errors.first_name[0]);

                        }

                        document.getElementById('code_employee').value = code;
                        document.getElementById('first_name').value = first_name;
                        document.getElementById('middle_name').value = middle_name;
                        document.getElementById('last_name').value = last_name;
                        if(gender == 'f'){
                            document.getElementById('f').checked = true;
                        }
                        else if(gender == 'm'){
                            document.getElementById('m').checked = true;
                        }
                            document.getElementById('dob').value = dob;
                        document.getElementById('hired_at').value = hired_at;

                    } else {
                        $('#modal_employee').modal('hide');

                        let table = $('.m_datatable_employee').mDatatable();

                        table.originalDataSet = [];
                        table.reload();


                        employee_employee_reset();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        update_item_button();
                    }
                }
            });
        });

        let edit = $('.m_datatable_employee').on('click', '.edit-employee', function () {
            let triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/employee/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('code_employee').value = data.code;
                    document.getElementById('first_name').value = data.first_name;
                    document.getElementById('middle_name').value = data.middle_name;
                    document.getElementById('last_name').value = data.last_name;
                    // document.getElementById('gender').value = data.gender;
                    document.getElementById('dob').value = data.dob;
                    document.getElementById('hired_at').value = data.hired_at;
                    document.getElementById('id_employ').value = data.uuid;

                    if(data.gender != null){
                        if(data.gender == 'f'){
                            document.getElementById('f').checked = true;
                        }
                        else if(data.gender == 'm'){
                            document.getElementById('m').checked = true;
                        }
                    }
                        $('.btn-success').removeClass('add-employee');
                        $('.btn-success').addClass('update-employee');
                        $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save Changes</span></span>");

                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#employee-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer-employee').on('click', '.update-employee', function () {
            let code = $('input[name=code_employee]').val();
            let first_name = $('input[name=first_name]').val();
            let middle_name = $('input[name=middle_name]').val();
            let last_name = $('input[name=last_name]').val();
            let gender = $('input[name=gender]:checked').val();
            let dob = $('#dob').val();
            let hired_at = $('#hired_at').val();
            let triggerid = $('input[name=id_employ]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/employee/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    first_name: first_name,
                    middle_name: middle_name,
                    last_name: last_name,
                    gender: gender,
                    dob: dob,
                    hired_at: hired_at,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code_employee-error').html(data.errors.code[0]);

                        }

                        else if (data.errors.first_name) {
                            $('#first_name-error').html(data.errors.first_name[0]);

                        }

                        document.getElementById('code_employee').value = code;
                        document.getElementById('first_name').value = first_name;
                        document.getElementById('middle_name').value = middle_name;
                        document.getElementById('last_name').value = last_name;
                        if(gender == 'f'){
                            document.getElementById('f').checked = true;
                        }
                        else if(gender == 'm'){
                            document.getElementById('m').checked = true;
                        }
                            document.getElementById('dob').value = dob;
                        document.getElementById('hired_at').value = hired_at;

                    } else {
                        employee_employee_reset();

                        save_button();
                        $('#modal_employee').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable_employee').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.m_datatable_employee').on('click', '.delete-employee', function () {
            let employee_uuid = $(this).data('uuid');

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
                        url: '/employee/' + employee_uuid + '',
                        success: function (data) {
                            toastr.success('Employee has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable_employee').mDatatable();

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
        // let remove_employee = $('.m_datatable_employee').on('click', '.delete-employee', function () {
        //     let triggerid = $(this).data('id');

        //     swal({
        //         title: 'Are you sure?',
        //         text: 'You will not be able to recover this imaginary file!',
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it!',
        //         cancelButtonText: 'No, keep it'
        //     }).then(result => {
        //         if (result.value) {
        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
        //                         'content'
        //                     )
        //                 },
        //                 type: 'DELETE',
        //                 url: '/employee/' + triggerid + '',
        //                 success: function (data) {
        //                     toastr.success(
        //                         'Data berhasil dihapus.',
        //                         'Sukses!', {
        //                             timeOut: 5000
        //                         }
        //                     );

        //                     let table = $('.m_datatable_employee').mDatatable();

        //                     table.originalDataSet = [];
        //                     table.reload();
        //                 },
        //                 error: function (jqXhr, json, errorThrown) {
        //                     let errorsHtml = '';
        //                     let errors = jqXhr.responseJSON;

        //                     $.each(errors.errors, function (index, value) {
        //                         $('#delete-error').html(value);
        //                     });
        //                 }
        //             });
        //             swal(
        //                 'Deleted!',
        //                 'Your imaginary file has been deleted.',
        //                 'success'
        //             );
        //         } else {
        //             swal(
        //                 'Cancelled',
        //                 'Your imaginary file is safe :)',
        //                 'error'
        //             );
        //         }
        //     });
        // });



    }
};

jQuery(document).ready(function () {
    JobTitle.init();
});
