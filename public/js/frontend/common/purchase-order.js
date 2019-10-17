let Grn = {
    init: function () {
        function item(uuid) {
            $('.purchase_order_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url:
                            "/datatables/purchase-order/item/" +
                            uuid,
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
                        title: 'P/N',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'name',
                        title: 'Item Description',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: '',
                        title: 'Qty PR',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'pivot.quantity',
                        title: 'Qty PO',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    },
                    {
                        field: '',
                        title: 'Qty',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    },
                    {
                        field: '',
                        title: 'Unit',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    },
                    {
                        field: '',
                        title: 'Remark',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    },
                    {
                        field: '',
                        title: 'Expired Date',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    }
                ]
            });
        };

        $("#purhcase_order_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/datatables/purchase-order/modal",
            columns: [
                {
                    data: "ordered_at"
                },
                {
                    data: "number"
                },
                {
                    data: "purchase_request.number"
                },
                {
                    data: "vendor.code"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-purchase-order   " title="View" data-uuid="' + t.uuid + '" data-code="' + t.number + '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        let item_datatables_init = true;
        $('.dataTable').on('click', '.select-purchase-order', function () {
            let uuid = $(this).data('uuid');
            let code = $(this).data('code');

            document.getElementById('ref-po').value = uuid;

            $.ajax({
                url: '/label/get-vendors/'+uuid+'/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#vendor-code').html(data.vendor.code);
                    $('#vendor-name').html(data.vendor.code);
                }
            });

            $.ajax({
                url: '/label/get-purchase-request/'+uuid+'/',
                type: 'GET',
                dataType: 'json',
                success: function (data2) {
                    $('#pr-number').html(data2.purchase_request.number);
                }
            });

            //TODO kalau misal grn dari po pr general gimana?
            // $('#project-number').html('323331');

            $('.search-purchase-order').html(code);

            if(item_datatables_init == true){
                item_datatables_init = false;
                item(uuid);
                table = $(".purchase_order_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
            else{
                let table = $('.purchase_order_datatable').mDatatable();
                table.destroy();
                item(uuid);
                table = $(".purchase_order_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }

            $('#modal_purchase_order').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    Grn.init();
});
