let PurchaseRequest = {
    init: function () {
        function item(uuid) {
            $('.item_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url:
                            "/datatables/purchase-request/item/" +
                            uuid +
                            "/general",

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
                columns: [{
                    field: 'code',
                    title: 'Part No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Material Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'price',
                    title: 'Price',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'total',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'discount',
                    title: 'Disc PR',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'discount_presentasi',
                    title: 'Disc %',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'total',
                    title: 'Total',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "note",
                    title: "Note",
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_check" type="button" href="#" class="m-badge m-badge--brand m-badge--wide " title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\tCheck\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
                ]
            });
        };

        $("#purhcase_request_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/datatables/purchase-request/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "type.name"
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
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-purchase-request" title="View" data-uuid="' + t.uuid + '" data-number="' + t.number + '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#m_datatable_journal').DataTable().ajax.reload();
        });

        let item_datatables_init = true;

        $('.dataTable').on('click', '.select-purchase-request', function () {
            let uuid = $(this).data('uuid');

            let number = $(this).data('number');

            document.getElementById('ref-pr').value = uuid;
            $('.search-purchase_request').html(number);
            $('#modal_purchase_request').modal('hide');


            if(item_datatables_init == true){
                item_datatables_init = false;
                item(uuid);
                table = $(".item_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
            else{
                let table = $('.item_datatable').mDatatable();
                table.destroy();
                item(uuid);
                table = $(".item_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
                item_datatables_init = true;
            }
        });
    }
};

jQuery(document).ready(function () {
    PurchaseRequest.init();
});
