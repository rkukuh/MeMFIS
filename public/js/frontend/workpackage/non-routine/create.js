let NonRoutineWorkpackage = {
    init: function () {
        $('.ad-sb_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tools',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat2',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<input type="number" id="sequence" name="sequence" class="form-control m-input">'
                    }
                },
                {
                    field: 'stat3',
                    title: 'Predecessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="predecessor" name="predecessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat4',
                    title: 'Sucessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="sucessor" name="sucessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat5',
                    title: 'Mandatory/Critical TC',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            'title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
        $('.cmr-awl_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tools',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<input type="number" id="sequence" name="sequence" class="form-control m-input">'
                    }
                },
                {
                    field: 'stat2',
                    title: 'Predecessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="predecessor" name="predecessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat3',
                    title: 'Sucessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="sucessor" name="sucessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat4',
                    title: 'Mandatory/Critical TC',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            'title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
        $('.si_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tools',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat2',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<input type="number" id="sequence" name="sequence" class="form-control m-input">'
                    }
                },
                {
                    field: 'stat3',
                    title: 'Predecessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="predecessor" name="predecessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat4',
                    title: 'Sucessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="sucessor" name="sucessor" class="form-control m-input" data-toggle="modal" data-target="#modal_basic">Add</button>'
                    }
                },
                {
                    field: 'stat5',
                    title: 'Mandatory/Critical TC',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            'title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    NonRoutineWorkpackage.init();
});
