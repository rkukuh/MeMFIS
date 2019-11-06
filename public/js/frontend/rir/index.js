let Grn = {
    init: function () {
        $('.rir_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/rir',
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
                    field: '#',
                    title: 'No',
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'purchase_order.number',
                    title: 'PR Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'purchase_order.purchase_request.number',
                    title: 'PO Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'vendor.name',
                    title: 'Vendor',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Status',
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
                    field: '',
                    title: 'Approved By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.status == "Approved"){
                            return '';
                        }else{
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-check"></i>' +
                                '</a>' +
                                '<a href="/rir/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="/rir/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                    '<i class="la la-print"></i>' +
                                '</a>'
                            );
                        }
                    }
                }
            ]
        });

        $('.rir_datatable').on('click', '.approve', function () {
            let rir_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to approve?',
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
                        url: '/rir/' +  rir_uuid +'/approve',
                        success: function (data) {
                            toastr.success('Receiving Inspection Report has been Approved.', 'Approved', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.rir_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function(jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;
                            $.each(errors, function(index, value) {
                                toastr.error(value.message, value.title, {
                                    closeButton: true,
                                    timeOut: "0"
                                });
                            });
                        }
                    });
                }
            });
        });

        $('.rir_datatable').on('click', '.delete', function () {
            let rir_uuid = $(this).data('uuid');

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
                        url: '/rir/' + rir_uuid ,
                        success: function (data) {
                            toastr.success('Receiving Inspection Report has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.rir_datatable').mDatatable();

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
    Grn.init();
});
