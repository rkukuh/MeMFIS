let NonRoutineWorkpackage = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.ad-sb_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ad-sb/',
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
                    field: 'eo_header.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'eo_header.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'eo_header.task_id',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
            ]
        });
        $('#m_accordion_2_item_1_head').on('click', function () {
            let table = $('.ad-sb_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

        $('.cmr-awl_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/cmr-awl/',
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
                    field: 'eo_header.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'eo_header.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'eo_header.task_id',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },            ]
        });
        $('#m_accordion_2_item_2_head').on('click', function () {
            let table = $('.cmr-awl_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

        $('.si_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/',
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
                    field: 'eo_header.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'eo_header.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'eo_header.task_id',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
            ]
        });
        $('#m_accordion_2_item_3_head').on('click', function () {
            let table = $('.si_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

        $('.ea_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/',
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
                    field: 'eo_header.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'eo_header.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'eo_header.task_id',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
            ]
        });
        $('#m_accordion_5_item_6_head').on('click', function () {
            let table = $('.si_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

        $('.eo_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/',
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
                    field: 'eo_header.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'eo_header.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'eo_header.task_id',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
            ]
        });
        $('#m_accordion_5_item_7_head').on('click', function () {
            let table = $('.si_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

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
                field: 'code',
                title: 'CRI No',
                sortable: !1,
            },
            {
                field: 'part_number',
                title: 'P/N',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'description',
                title: 'Title',
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
                field: 'removal_manhour_estimation',
                title: 'Removal Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'estimation_manhour',
                title: 'Installation Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'skill_name',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'material',
                title: 'Material',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_material_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material_htcrr" title="Material" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                    );
                }

            },
            {
                field: 'tool',
                title: 'Tool',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_tool_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            },
            ]
        });
        $('#m_accordion_2_item_4_head').on('click', function () {
            let table = $('.ht_crr_datatable').mDatatable();

            table.originalDataSet = [];
            table.reload();
        });

    }
};

jQuery(document).ready(function () {
    NonRoutineWorkpackage.init();
});
