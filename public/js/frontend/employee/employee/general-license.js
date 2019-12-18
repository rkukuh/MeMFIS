let GeneralLicense = {
    init: function () {

        $('.m_datatable_general_license').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-general-licenses',

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
                input: $('#generalSearch4')
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
                    // width: 100
                },
                {
                    field: 'first_name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    // width: 250
                },
                {
                    field: 'aviation_degree',
                    title: 'Aciation Degree',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'exam_no',
                    title: 'Exam No',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'exam_date',
                    title: 'Exam Date',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'attendance_no',
                    title: 'attendance No',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'issued_at',
                    title: 'Issued At',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'valid_until',
                    title: 'Valid Until',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'revoke_at',
                    title: 'Revoke At',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'Actions',
                    width: 170,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            // '<a  data-toggle="modal" data-target="#modal_employee" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" ' +
                            // '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t' +
                            '<a  data-toggle="modal" data-target="#modal_general_license" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-general-license" title="Edit" data-employee="' + t.employee_id + '"  data-id=' +
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-general-license" href="#" data-employee="' + t.employee_id + '" data-id=' +
                            t.id +
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

        $('.modal-footer-general-license').on('click', '.reset', function () {
            employee_general_license_reset();
        });
        $('.general_license_class').on('click', '.btn-primary', function () {
            save_button();
            employee_general_license_reset();
        });

        $('.modal-footer-general-license').on('click', '.add-general-license', function () {
            let license = $('#license').val();
            let name = $('#name4').val();
            let aviation_degree = $('#aviation_degree').val();
            let code = $('input[name=code_general_license]').val();
            // let aviation_degree = $('input[name=aviation_degree]').val();
            let aviation_degree_no = $('input[name=aviation_degree_no]').val();
            let exam_no = $('input[name=exam_no]').val();
            let exam_date = $('#exam_date').val();
            let attendance_no = $('input[name=attendance_no]').val();
            let issued_at = $('#issued_at').val();
            let valid_until = $('#valid_until').val();
            let revoke_at = $('#revoke_at').val();

            if (license == "Select a License") {
                alert('eror');
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/general-license',
                    data: {
                        _token: $('input[name=_token]').val(),
                        name: name,
                        aviation_degree: aviation_degree,
                        code: code,
                        aviation_degree_no: aviation_degree_no,
                        exam_no: exam_no,
                        license: license,
                        exam_date: exam_date,
                        attendance_no: attendance_no,
                        issued_at: issued_at,
                        valid_until: valid_until,
                        revoke_at: revoke_at,

                    },
                    success: function (data) {
                        if (data.errors) {
                            alert('errors');
                            // if (data.errors.code) {
                            //     $('#code_employee-error').html(data.errors.code[0]);

                            // }

                            // if (data.errors.first_name) {
                            //     $('#first_name-error').html(data.errors.first_name[0]);

                            // }

                            // document.getElementById('code_employee').value = code;
                            // document.getElementById('first_name').value = first_name;
                            // document.getElementById('middle_name').value = middle_name;
                            // document.getElementById('last_name').value = last_name;
                            // if(gender == 'f'){
                            //     document.getElementById('f').checked = true;
                            // }
                            // else if(gender == 'm'){
                            //     document.getElementById('m').checked = true;
                            // }
                            //     document.getElementById('dob').value = dob;
                            // document.getElementById('hired_at').value = hired_at;

                        } else {
                            $('#modal_general_license').modal('hide');

                            let table = $('.m_datatable_general_license').mDatatable();

                            table.originalDataSet = [];
                            table.reload();


                            employee_employee_reset();
                            toastr.success('Data berhasil disimpan.', 'Sukses', {
                                timeOut: 5000
                            });
                            employee_general_license_reset();

                        }
                    }
                });
            }
        });

        let edit = $('.m_datatable_general_license').on('click', '.edit-general-license', function () {
            update_general_license_button();
            // $('.btn-success').removeClass('add-general-license');
            // $('.btn-success').addClass('update-general-license');
            let triggerid = $(this).data('id');
            let triggerid2 = $(this).data('employee');
            // alert(triggerid);
            // alert(triggerid2);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/general-license/' + triggerid + '/' + triggerid2 + '/edit',
                success: function (data) {
                    $('select[name="name"]').append(
                        '<option value="' + data.employee_id + '" selected>' + data.first_name + '</option>'
                    );
                    $('select[name="aviation_degree"]').append(
                        '<option value="' + data.aviation_degree + '" selected>' + data.code_aviation_degree + '</option>'
                    );
                    // document.getElementById('name4').text = data.first_name;
                    // document.getElementById('aviation_degree').value = data.first_name;
                    document.getElementById('code_general_license').value = data.code;
                    document.getElementById('exam_no').value = data.exam_no;
                    document.getElementById('exam_date').value = data.exam_date;
                    document.getElementById('attendance_no').value = data.attendance_no;
                    document.getElementById('aviation_degree_no').value = data.aviation_degree_no;
                    document.getElementById('issued_at').value = data.issued_at;
                    document.getElementById('valid_until').value = data.valid_until;
                    document.getElementById('revoke_at').value = data.revoke_at;
                    document.getElementById('general_license').value = data.uuid;
                    document.getElementById('employee_license').value = data.employee_license_id;
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

        let update = $('.modal-footer').on('click', '.update-general-license', function () {
            let id = $('input[name=general_license]').val();
            let employee_license = $('input[name=employee_license]').val();
            let license = $('#license').val();
            let name = $('#name4').val();
            let aviation_degree = $('#aviation_degree').val();
            let code = $('input[name=code_general_license]').val();
            // let aviation_degree = $('input[name=aviation_degree]').val();
            let aviation_degree_no = $('input[name=aviation_degree_no]').val();
            let exam_no = $('input[name=exam_no]').val();
            let exam_date = $('#exam_date').val();
            let attendance_no = $('input[name=attendance_no]').val();
            let issued_at = $('#issued_at').val();
            let valid_until = $('#valid_until').val();
            let revoke_at = $('#revoke_at').val();
            // let triggerid = $('input[name=id_employ]').val();
            // alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/general-license/' + id + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    employee_license: employee_license,
                    name: name,
                    aviation_degree: aviation_degree,
                    code: code,
                    aviation_degree_no: aviation_degree_no,
                    exam_no: exam_no,
                    license: license,
                    exam_date: exam_date,
                    attendance_no: attendance_no,
                    issued_at: issued_at,
                    valid_until: valid_until,
                    revoke_at: revoke_at,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code_employee-error').html(data.errors.code[0]);

                        } else if (data.errors.first_name) {
                            $('#first_name-error').html(data.errors.first_name[0]);

                        }

                        document.getElementById('code_employee').value = code;
                        document.getElementById('first_name').value = first_name;
                        document.getElementById('middle_name').value = middle_name;
                        document.getElementById('last_name').value = last_name;
                        if (gender == 'f') {
                            document.getElementById('f').checked = true;
                        } else if (gender == 'm') {
                            document.getElementById('m').checked = true;
                        }
                        document.getElementById('dob').value = dob;
                        document.getElementById('hired_at').value = hired_at;

                    } else {

                        save_button();
                        $('#modal_general_license').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable_general_license').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        employee_general_license_reset();

                    }
                }
            });
        });



        let remove_general_license = $('.m_datatable_general_license').on('click', '.delete-general-license', function () {
            let triggerid = $(this).data('id');
            let triggerid2 = $(this).data('employee');

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
                        url: '/general-license/' + triggerid + '/' + triggerid2 + '/',
                        success: function (data) {
                            toastr.success(
                                'Data berhasil dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable_general_license').mDatatable();

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




    }
};

jQuery(document).ready(function () {
    GeneralLicense.init();
});
