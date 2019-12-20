let Item = {
    init: function () {
        $('.item_unit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item/' +  item_uuid  + '/units',
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
                    field: 'uom.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
                },
                {
                    field: 'convension',
                    title: 'Conversion Rate',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        let unit = $("#unit_id option:selected").text();
                        return '1'+unit+' = '+t.uom.quantity+''+t.name
                    }
                },
            ]
        });

        $('.item_storage_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item/' +  item_uuid  + '/storages',
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
                    field: 'name',
                    title: 'Storage',
                    sortable: 'asc',
                    filterable: !1,
                    width: 250
                },
                {
                    field: 'pivot.min',
                    title: 'Min',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'pivot.max',
                    title: 'Max',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
            ]
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
