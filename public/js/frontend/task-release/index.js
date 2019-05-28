let TaskRelease = {
    init: function () {

        $('.taskrelease_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/task-release',
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
                    field: 'number',
                    title: 'No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'title',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type.name',
                    title: 'TaskCard No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Job Card No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<a href="/task-release/create">' + t.number + "</a>"
                        );
                    }
                },
                {
                    field: 'pesawat',
                    title: 'Company Task No',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'skill',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'A/C Serial No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {

                            return (
                                '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Release" data-id="' + t.uuid +'">' +
                                    '<i class="fa fa-check-circle"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Open Job Card" data-uuid="' + t.uuid + '">' +
                                    '<i class="fa fa-external-link-alt"></i>' +
                                '</a>'
                            );
                    }
                }
            ]
        });

        let remove = $('.taskcard_datatable').on('click', '.delete', function () {
            let tascard_uuid = $(this).data('uuid');

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
                        url: '/taskcard/' + tascard_uuid + '',
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.taskcard_datatable').mDatatable();

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
    TaskRelease.init();
});
