let JobScopeLevel = {
    init: function () {
        $('.job_scope_level_datatable').mDatatable({
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
                    field: '',
                    title: 'Created Date',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: '',
                    title: 'Level No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Job Scope Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Update By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });

    }
};

jQuery(document).ready(function () {
    JobScopeLevel.init();
});
