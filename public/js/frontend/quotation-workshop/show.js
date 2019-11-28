let QuotationWorkshop = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '',
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
                    field: '#',
                    title: 'No',
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: '',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Items Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Job Request',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Complaint',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Evaluation Cost',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Full Package Cost',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
            ]
        });

    }
};

jQuery(document).ready(function () {
    QuotationWorkshop.init();
});