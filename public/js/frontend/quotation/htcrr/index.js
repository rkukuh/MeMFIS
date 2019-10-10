let Htcrr = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.ht_crr_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/' + project_uuid + '/htcrr/',
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
                title: 'CRI No',
                sortable: !1,
            },
            {
                field: 'item.code',
                title: 'P/N',
                sortable: 'asc',
                filterable: !1,
            },
            // {
            //     field: 'item.name',
            //     title: 'Title',
            //     sortable: 'asc',
            //     filterable: !1,
            // },
            {
                field: 'item.name',
                title: 'item Description',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'position',
                title: 'Position',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'removal',
                title: 'Removal Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'installation',
                title: 'Installation Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'skill_name',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            }
            ]
        });

    }
};

jQuery(document).ready(function () {
    Htcrr.init();
});
