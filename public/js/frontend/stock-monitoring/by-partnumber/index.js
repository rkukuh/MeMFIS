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
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Employment Status Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Action',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button id="edit-employee-status" data-toggle="modal" data-target="#modal_employment_status" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-unit" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    ByPartNumber.init();
});
