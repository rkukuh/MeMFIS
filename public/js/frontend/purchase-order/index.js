let PurchaseOrder = {
    init: function () {
        $('.purchase_order_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/purchase-order',
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
                    field: 'number',
                    title: 'PO Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/purchase-order/'+t.uuid+'">' + t.number + "</a>"
                    }
                },
                {
                    field: 'vendor.code',
                    title: 'PR Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'ordered_at',
                    title: 'Date',
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
                    field: 'total_after_tax',
                    title: 'Total',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'valid_until',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: '1st Approved',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: '2nd Approved By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.status == "Approved"){
                            return "";
                        }else{
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-check"></i>' +
                                '</a>' +
                                '<a href="/purchase-order/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid="' + t.uuid +'">' +
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

        $('.purchase_order_datatable').on('click', '.approve', function () {
            let purchase_order_uuid = $(this).data('uuid');

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
                        url: '/purchase-order/' +  purchase_order_uuid +'/approve',
                        success: function (data) {
                            if(data.status == 'error'){
                                toastr.error("Can't Approve, Quantity exceed limit", 'Dinied', {
                                    timeOut: 5000
                                    }
                                );

                            }else{
                                toastr.success('Purchase Order has been Approved.', 'Approved', {
                                    timeOut: 5000
                                    }
                                );

                                let table = $('.purchase_order_datatable').mDatatable();

                                table.originalDataSet = [];
                                table.reload();

                            }
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
        $('.purchase_order_datatable').on('click', '.delete', function () {
            let purchase_order_uuid = $(this).data('uuid');

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
                        url: '/purchase-order/' + purchase_order_uuid + '',
                        success: function (data) {
                            toastr.success('Purchase Order has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.purchase_order_datatable').mDatatable();

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
    PurchaseOrder.init();
});
