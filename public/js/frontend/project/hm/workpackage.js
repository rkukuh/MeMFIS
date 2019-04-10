let Workpackage = {
    init: function () {
        $('.ht_crr_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/basic/',
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
                    field: '',
                    title: 'CRI No',
                    sortable: !1,
                },
                {
                    field: '',
                    title: 'P/N',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Position',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Removal Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Installation Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
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
                            '<button data-toggle="modal" data-target="#modal_material_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
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
                            '<button data-toggle="modal" data-target="#modal_tool_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '<button data-toggle="modal" data-target="#modal_workshop_task" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill " title="Create Workshop Task" data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    Workpackage.init();
});

