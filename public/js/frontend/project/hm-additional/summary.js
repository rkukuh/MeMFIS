let summary = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };
        $('.materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/additional/'+project_uuid+'/materials',
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
            columns: [{
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Name',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit.name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.note',
                title: 'Description',
                sortable: 'asc',
                filterable: !1,
            }
            ]
        });
        $('.tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/additional/'+project_uuid+'/tools',
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
            columns: [{
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit.name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.note',
                title: 'Description',
                sortable: 'asc',
                filterable: !1,
            }
            ]
        });
    }
};

jQuery(document).ready(function () {
    summary.init();
});
