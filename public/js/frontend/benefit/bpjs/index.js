
let Bpjs = {
    init: function () {
        $('.bpjs_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/bpjs',
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
                serverPaging: !1,
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
                    template: function (t) {
                        return '<a id="show" data-target="#modal_bpjs_show" data-toggle="modal" data-uuid="'+t.uuid+'" href="#modal_bpjs_show">'+t.code+'</a>'
                    }
                },
                {
                    field: 'name',
                    title: 'BPJS Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Last Update',
                    sortable: 'asc',
                    filterable: !1
                }
            ]
        });

        let reset = function (){
            $('#bpjs_code').val('')
            $('#bpjs_name').val('')
            $('#basic_salary_employee').val('')
            $('#min_employee').val('')
            $('#max_employee').val('')
            $('#basic_salary_company').val('')
            $('#min_company').val('')
            $('#max_company').val('')

            $('#bpjs_code-error').html('')
            $('#bpjs_name-error').html('')
            $('#basic_salary_employee-error').html('')
            $('#min_employee-error').html('')
            $('#max_employee-error').html('')
            $('#basic_salary_company-error').html('')
            $('#min_company-error').html('')
            $('#max_company-error').html('')
        }

        let button_reset = $(document).on('click','#reset-bpjs', function (){
            reset()
        });

        let button_close = $(document).on('click','#close-bpjs', function (){
            reset()
        });

        let button_create = $(document).on('click','#modal-create-bpjs', function (){
            reset()
        });

        let store = $(document).on('click', '#create-bpjs', function () {
            let code = $('input[name=bpjs_code]').val();
            let name = $('input[name=bpjs_name]').val();
            let employee_paid = $('input[name=basic_salary_employee]').val();
            let min_employee = $('input[name=min_employee]').val();
            let max_employee = $('input[name=max_employee]').val();
            let company_paid = $('input[name=basic_salary_company]').val();
            let min_company = $('input[name=min_company]').val();
            let max_company = $('input[name=max_company]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/bpjs',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    employee_paid: employee_paid,
                    min_employee: min_employee,
                    max_employee: max_employee,
                    company_paid: company_paid,
                    min_company: min_company,
                    max_company: max_company,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#bpjs_code-error').html(data.errors.code[0]);
                        }else{
                            $('#bpjs_code-error').html('')
                        }
                        if (data.errors.name) {
                            $('#bpjs_name-error').html(data.errors.name[0]);
                        }else{
                            $('#bpjs_name-error').html('')
                        }
                        if (data.errors.employee_paid) {
                            $('#basic_salary_employee-error').html(data.errors.employee_paid[0]);
                        }else{
                            $('#basic_salary_employee-error').html('')
                        }
                        if (data.errors.min_employee) {
                            $('#min_employee-error').html(data.errors.min_employee[0]);
                        }else{
                            $('#min_employee-error').html('')
                        }
                        if (data.errors.max_employee) {
                            $('#max_employee-error').html(data.errors.max_employee[0]);
                        }else{
                            $('#max_employee-error').html('')
                        }
                        if (data.errors.company_paid) {
                            $('#basic_salary_company-error').html(data.errors.company_paid[0]);
                        }else{
                            $('#basic_salary_company-error').html('')
                        }
                        if (data.errors.min_company) {
                            $('#min_company-error').html(data.errors.min_company[0]);
                        }else{
                            $('#min_company-error').html('')
                        }
                        if (data.errors.max_company) {
                            $('#max_company-error').html(data.errors.max_company[0]);
                        }else{
                            $('#max_company-error').html('')
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


        let show = $(document).on('click', '#show', function () {

            reset()
            let triggerid = $(this).data('uuid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/bpjs/' + triggerid,
                success: function (data) {
                    $('#bpjs_code_show').html(data.code)
                    $('#bpjs_name_show').text(data.name)
                    $('#basic_salary_employee_show').text(data.employee_paid)
                    $('#min_employee_show').text(data.min_employee_value)
                    $('#max_employee_show').text(data.employee_max_value)
                    $('#basic_salary_company_show').text(data.company_paid)
                    $('#min_company_show').text(data.min_company_value)
                    $('#max_company_show').text(data.company_max_value)
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        // alert(value);
                    });
                }
            });

        });

    }
};


jQuery(document).ready(function () {
    Bpjs.init();
});
