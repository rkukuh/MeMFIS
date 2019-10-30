let TaskCard = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.rts_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/release-to-service/progress',
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
                    title: 'Project No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'title',
                    title: 'Project Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer_name',
                    title: 'Customer',
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
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.status == 'RTS'){
                            return (
                            '<a href="rts/'+t.rts.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                            );
                        }else{
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                    '<i class="la la-check"></i>' +
                                '</a>'+
                                '<a href="/rts/'+t.uuid+'/project" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>'
                            );
                        }
                    }
                }
            ]
        });
        $('.rts_datatable').on('click', '.approve', function () {
            let project_uuid = $(this).data('id');
            swal({
                title: 'Are you sure do you want to approve this release to service?',
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
                        url: '/rts/' + project_uuid + '/project/approve',
                        success: function (data) {
                            toastr.success('Release to service has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.rts_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;
                            $.each(errors.error, function (index, value) {
                                toastr.error(value.message, value.title, {
                                    "closeButton": true,
                                    "timeOut": "0",
                                }
                            );
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
