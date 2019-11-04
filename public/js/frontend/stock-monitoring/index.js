let StockMonitoring = {
    init: function () {
        $('.stock_monitoring_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/stock-monitoring',

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
                    field: '',
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
                    field: '',
                    title: 'Available Stock',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'project_number',
                    title: 'Allocation',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Min Stock',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Max Stock',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    StockMonitoring.init();
});
