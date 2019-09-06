let PurchaseOrder = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url:
                        "/datatables/purchase-order/item/" +
                        po_uuid ,

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
                field: 'pivot.price',
                title: 'Price',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.subtotal_before_discount',
                title: 'Sub Total',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.discount_amount',
                title: 'Disc PR',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.discount_percentage',
                title: 'Disc %',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.subtotal_after_discount',
                title: 'Total',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: "pivot.note",
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



    }
};

jQuery(document).ready(function () {
    PurchaseOrder.init();
});
