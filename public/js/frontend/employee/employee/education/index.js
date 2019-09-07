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
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        let edit = $(document).on('click', '#edit-employee-education', function () {
            let triggerid = $(this).data('uuid')
            let uuid = $('input[name=employee_uuid]').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/employee/' + uuid + '/education/' + triggerid + '/edit',
                    success: function (data) {
                        $('#institute').val(data.institute)
                        $('#graduation_date').val(data.graduated_at)
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

    }
};

jQuery(document).ready(function () {
    EducationEmployee.init();
});
