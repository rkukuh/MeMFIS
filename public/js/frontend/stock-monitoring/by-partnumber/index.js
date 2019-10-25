let ByPartNumber = {
    init: function () {
        $('.m_datatable_by_partnumber').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee/statuses',

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
                    field: '',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Serial No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Storage',
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
                    field: '',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Total Stock',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Allocated Stock',
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
                    field: '',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
            ]
        });
    }
};

jQuery(document).ready(function () {
    ByPartNumber.init();
});
