let Aircraft = {
    init: function () {
        let t;
        (t = $('.project_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project',
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
            columns: [
                {
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.parent_id == null){
                            return '<a href="/project-hm/'+t.uuid+'">' + t.code + "</a>"
                        }
                        else{
                            return '<a href="/project-hm-additional/'+t.uuid+'">' + t.code + "</a>"
                        }
                    }
                },
                {
                    field: 'title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Additional Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'no_wo',
                    title: 'WO No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Project No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft_type',
                    title: 'AC Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft_register',
                    title: 'AC Register',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft_sn',
                    title: 'AC SN',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'project_type',
                    title: 'Project Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.parent_id == null){
                            if(t.status == 'Project Approved' || t.status == 'Quotation Approved'){
                                return (
                                    ''
                                );
                            }else{
                                return (
                                    '<a href="/project-hm/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-check"></i>' +
                                    '</a>'
                                );
                            }
                        }
                        else{
                            if(t.status == 'Project Approved' || t.status == 'Quotation Approved'){
                                return (
                                    ''
                                );
                            }else{
                                return (
                                    '<a href="/project-hm-additional/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-check"></i>' +
                                    '</a>'
                                );
                            }
                        }
                    }
                }
            ]
        })),
        $("#m_form_status").on("change", function() {
            t.search($(this).val(), "Status");
          }),
          $("#m_form_type").on("change", function() {
            t.search($(this).val(), "Type");
          }),
          $("#m_form_status, #m_form_type").selectpicker();
      }
    };


        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        $('.project_datatable').on('click', '.delete', function () {
            let project_uuid = $(this).data('uuid');

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
                        url: '/project/' + project_uuid + '',
                        success: function (data) {
                            toastr.success('Project has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.project_datatable').mDatatable();

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

        $('.project_datatable').on('click', '.approve', function () {
            let project_uuid = $(this).data('uuid');

            swal({
                title: 'Are you sure do you want to approve this transaction?',
                type: 'warning',
                confirmButtonText: 'Yes, Approve',
                confirmButtonColor: '#34bfa3',
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
                        type: 'POST',
                        url: '/project/' + project_uuid + '/approve',
                        success: function (data) {
                            toastr.success('Quotation has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.project_datatable').mDatatable();

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


jQuery(document).ready(function () {
    Aircraft.init();
});
