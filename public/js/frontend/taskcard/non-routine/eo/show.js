let TaskCard = {
    init: function () {
        $('.instruction_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-eo/'+taskcard_uuid+'/eo-instructions',
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
                    field: 'workarea_name',
                    title: 'Work Area',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'skill',
                    title: 'Skill',
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
                    field: 'engineer_quantity',
                    title: 'Engineer Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'helper_quantity',
                    title: 'Helper Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'Rii?',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        var e = {
                            1: {
                                title: "Yes",
                                class: "m-badge--brand"
                            },
                            0: {
                                title: "No",
                                class: " m-badge--warning"
                            }
                        };

                        return '<span class="m-badge ' + e[t.is_rii].class + ' m-badge--wide">' + e[t.is_rii].title + "</span>"
                    }

                },
                {
                    field: 'performance_factor',
                    title: 'Performance Factor',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'sequence',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '1',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }

                },
                {
                    field: '2',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
            ]
        });

        $('.threshold_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/thresholds',
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
                perpage: 5,
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
                    field: 'amount',
                    title: 'Amount',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
            ]
        });

        $('.repeat_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/repeats',
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
                perpage: 5,
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
                    field: 'amount',
                    title: 'Amount',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
            ]
        });

        let material_datatables_init = true;
        let triggeruuid = "";
        let material = $('.instruction_datatable').on('click', '.material', function () {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_item').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
        });

        let tool_datatables_init = true;
        let triggeruuid2 = "";
        let tool = $('.instruction_datatable').on('click', '.tool', function () {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid2 = $(this).data('uuid');
                EO_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_tool').DataTable();
                table.destroy();
                triggeruuid2 = $(this).data('uuid');
                EO_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
        });



    }
};


jQuery(document).ready(function () {
    TaskCard.init();
});
