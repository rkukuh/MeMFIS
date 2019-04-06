let Project = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.workpackage_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/'+project_uuid+'/workpackage/',
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
            columns: [
                {
                    field: 'code',
                    title: 'Workpackage Number',
                    sortable: !1,
                },
                {
                    field: 'title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/project/'+project_uuid+'/workpackage/'+t.uuid+'">' + t.title + "</a>"
                    }
                },
                {
                    field: 'aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-workpackage" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                }
            ]
        });

        $("#project_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/modal",
            columns: [
                {
                    data: "code"
                },
                {
                    data: "title"
                },
                {
                    data: "aircraft_id"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-workpackage" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('#project_datatable').on('click', '.select-workpackage', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project/' + project_uuid +'/workpackage',
                data: {
                    _token: $('input[name=_token]').val(),
                    workpackage: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.customer_id) {
                            $('#customer-error').html(data.errors.customer_id[0]);
                        }
                        if (data.errors.aircraft_register) {
                            $('#reg-error').html(data.errors.aircraft_register[0]);
                        }
                        if (data.errors.aircraft_sn) {
                            $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                        }
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.no_wo) {
                            $('#work-order-error').html(data.errors.no_wo[0]);
                        }

                        document.getElementById('customer').value = data.getAll('customer_id');
                        document.getElementById('work-order').value = data.getAll('no_wo');
                        document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                        document.getElementById('reg').value = data.getAll('aircraft_register');
                        document.getElementById('serial-number').value = data.getAll('aircraft_sn');
                    } else {
                        $('#modal_project').modal('hide');

                        toastr.success('Workpackage has been created.', 'Success',  {
                            timeOut: 5000
                        });

                        let table = $('.workpackage_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.workpackage_datatable').on('click', '.delete-workpackage', function () {
            let workpackage_uuid = $(this).data('uuid');

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
                        url: '/project/' + project_uuid +'/workpackage/'+workpackage_uuid,
                        success: function (data) {
                            toastr.success('Unit has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.workpackage_datatable').mDatatable();

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
        $('.add-project').on('click', function () {
            // $('#name-error').html('');
            // $('#simpan').text('Simpan');
            let registerForm = $('#CustomerForm');
            let customer =$('#customer').val();
            let project_title =$('#project_title').val();
            let work_order = $('input[name=work-order]').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let reg = $('input[name=reg]').val();
            let serial_number = $('input[name=serial-number]').val();
            let formData = registerForm.serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: '1122',
                    customer_id: customer,
                    title: project_title,
                    no_wo: work_order,
                    aircraft_id: applicability_airplane,
                    aircraft_register: reg,
                    aircraft_sn: serial_number,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });
                        window.location.href = '/project-hm/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Project.init();
});
