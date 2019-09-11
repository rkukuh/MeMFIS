let Grn = {
    init: function () {
        $('.good_recieved_note_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/goods-received',
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
                    field: 'received_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'number',
                    title: 'GRN Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/goods-received/'+t.uuid+'">' + t.number + "</a>"
                    }
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
                    field: 'vendor.code',
                    title: 'Vendor',
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
                    field: '',
                    title: 'Created By',
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
                                '<a href="/goods-received/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                    }
                }
            ]
        });

        $('.good_recieved_note_datatable').on('click', '.approve', function () {
            let grn_uuid = $(this).data('uuid');

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
                        url: '/goods-received/' +  grn_uuid +'/approve',
                        success: function (data) {
                            toastr.success('Goods Received has been Approved.', 'Approved', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.good_recieved_note_datatable').mDatatable();

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

        $('.good_recieved_note_datatable').on('click', '.delete', function () {
            let grn_uuid = $(this).data('uuid');

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
                        url: '/goods-received/' + grn_uuid ,
                        success: function (data) {
                            toastr.success('Goods Received has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.good_recieved_note_datatable').mDatatable();

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
