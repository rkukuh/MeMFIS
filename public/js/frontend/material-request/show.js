let MaterialRequestShow = {
    init: function () {
        $('.material_request_project_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation',
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
                serverFiltering: !0,
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
                    field: 'id',
                    title: '#',
                    sortable: !1,
                    width: 40
                },
                {
                    field: 'quotation_number',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'customer',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'valid_until',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'status',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'status',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    MaterialRequestShow.init();
});
