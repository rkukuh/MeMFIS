
let ImportFingerprint = {
    init: function () {
        $('.import_fingerprint_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee/attendance-file',
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
                serverPaging: !1,
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
                    field: 'imported_date',
                    title: 'Imported Date',
                    sortable: 'asc',
                    filterable: !1,
                    // template: function (t) {
                    //     return '<a href="/leave-period/'+t.uuid+'">' + t.code + "</a>"
                    // }
                },
                {
                    field: 'filename',
                    title: 'File Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'imported_by',
                    title: 'Import By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    ImportFingerprint.init();
});
