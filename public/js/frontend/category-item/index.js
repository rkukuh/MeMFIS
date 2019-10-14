let CategoryItem = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };
        $('.category_item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/inventory-in',
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
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Category Code',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Category Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Updated By',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/inventory-in/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    CategoryItem.init();
});
