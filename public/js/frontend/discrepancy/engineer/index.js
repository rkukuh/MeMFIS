let TaskCard = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.Discrepancy_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/discrepancy',
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
                    title: 'Discrepancy No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/defectcard/'+t.uuid+'/">' + t.code + "</a>"
                    }
                },
                {
                    field: 'jobcard.number',
                    title: 'JobCard Reference',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/jobcard-ppc/'+t.jobcard.uuid+'">' + t.jobcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.taskcard.number',
                    title: 'Taskcard No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.jobcard.taskcard.uuid+'">' + t.jobcard.taskcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.quotation.project.customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.taskcard.type.name',
                    title: 'TC Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft.name',
                    title: 'A/C',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'jobcard.taskcard.skill.name',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.taskcard.estimation_manhour',
                    title: 'Manhours',
                    sortable: 'asc',
                    filterable: !1,
                },

                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/tool/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'+
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-check"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        let remove = $('.Discrepancy_datatable').on('click', '.delete', function () {
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

        $('.Discrepancy_datatable').on('click', '.approve', function () {
            let discrepancy_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to Approve?',
                type: 'question',
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
                        type: 'PUT',
                        url: '/discrepancy/' + discrepancy_uuid + '/engineer/approve',
                        success: function (data) {
                            toastr.success('Discrepancy has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.Discrepancy_datatable').mDatatable();

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
    TaskCard.init();
});
