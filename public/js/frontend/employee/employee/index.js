let Employee = {
    init: function () {
        $('.m_datatable_employee').mDatatable({
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
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    template:  function (t) {

                        let employee_name

                        if(t.middle_name == null || t.last_name == null){
                            if(t.middle_name == null){
                                employee_name = t.first_name +' '+t.last_name
                            }
                            if(t.last_name == null){
                                employee_name = t.first_name+' '+t.middle_name
                            }
                            if(t.middle_name == null && t.last_name == null){
                                employee_name = t.first_name
                            }
                        }else if(t.middle_name != null || t.last_name != null){
                            if(t.middle_name != null){
                                employee_name = t.first_name +' '+t.middle_name
                            }
                            if(t.last_name != null){
                                employee_name = t.first_name+' '+t.last_name
                            }
                            if(t.middle_name != null && t.last_name != null){
                                employee_name = t.first_name+' '+t.middle_name+' '+t.last_name
                            }
                        }

                        return employee_name
                    }
                },
                {
                    field: 'dob',
                    title: 'dob',
                    sortable: 'asc',
                    filterable: !1,
                    template:  function (t) {
                        let dob;

                        if(t.dob == null){
                            dob = 'Not Known'
                        }else{
                            dob = t.dob
                        }

                        return dob;
                    }
                },
                {
                    field: 'gender',
                    title: 'Gender',
                    sortable: 'asc',
                    filterable: !1,
                    template:  function (t) {
                        let gender;

                        if(t.gender == 'm'){
                            gender = 'MALE'
                        }else if(t.gender == 'f'){
                            gender = 'FEMALE'
                        }else{
                            gender = 'Not Known'
                        }

                        return gender;
                    }
                },
                {
                    field: 'hired_at',
                    title: 'Hired At',
                    sortable: 'asc',
                    filterable: !1,
                    template:  function (t) {
                        let hired_at;

                        if(t.hired_at == null){
                            hired_at = 'Not Known'
                        }else{
                            hired_at = t.hired_at
                        }

                        return hired_at;
                    }
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/employee/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-employee" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
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
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
