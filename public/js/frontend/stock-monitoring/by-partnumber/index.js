let ByPartNumber = {
    init: function () {
        function item(uuid) {
            $('.m_datatable_by_partnumber').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/stock-monitoring/item/'+uuid,

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
                        field: 'item.code',
                        title: 'Part Number',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'serial_number',
                        title: 'Serial No.',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'item.name',
                        title: 'Item Description',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'storage.name',
                        title: 'Storage.',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'category',
                        title: 'Category',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'expired_at',
                        title: 'Expired Date',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'avaliable_stock',
                        title: 'Available Stock',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t, e, i) {
                            return t.quantity-t.used_quantity
                        }
                    },
                    {
                        field: 'project_number',
                        title: 'Allocation',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t, e, i) {
                            if(t.grn_id){
                                return t.good_received.purchase_order.purchase_request.purchase_requestable.code
                            }else{
                                return "free"
                            }
                        }
                    },
                    {
                        field: 'min',
                        title: 'Min Stock',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'max',
                        title: 'Max Stock',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'unit',
                        title: 'Unit',
                        sortable: 'asc',
                        filterable: !1,
                    }
                ]
            });
        }
        let item_datatables_init = true;
        $('select[name="part_number"]').on("change", function() {
            let uuid = $("#part_number").val();
            if (item_datatables_init == true) {
                item_datatables_init = false;
                item(uuid);
                table = $(".m_datatable_by_partnumber").mDatatable();
                table.originalDataSet = [];
                table.reload();
            } else {
                let table = $(".m_datatable_by_partnumber").mDatatable();
                table.destroy();
                item(uuid);
                table = $(".m_datatable_by_partnumber").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        });


    }
};

jQuery(document).ready(function () {
    ByPartNumber.init();
});
