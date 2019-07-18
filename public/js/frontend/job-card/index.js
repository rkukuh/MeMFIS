let JobCard = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.job_card_datatable_ppc').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard',

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
                    field: 'number',
                    title: 'JC No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                    }
                },
                {
                    field: 'taskcard.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.type.name',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.task.name',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.taskcard.description) {
                            data = strtrunc(t.taskcard.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'taskcard.skill.name',
                    title: 'Skill',
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
                {
                    field: 'taskcard.estimation_manhour',
                    title: 'Est. Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Actual. Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="jobcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.job_card_engineer_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard',

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
                    field: 'number',
                    title: 'JC No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-engineer/'+t.uuid+'/edit">' + t.number + "</a>"
                    }
                },
                {
                    field: 'taskcard.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.type.name',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.task.name',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.taskcard.description) {
                            data = strtrunc(t.taskcard.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'taskcard.skill.name',
                    title: 'Skill',
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
                {
                    field: 'taskcard.estimation_manhour',
                    title: 'Est. Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Actual. Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="jobcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });


        let material_datatables_init = true;
        let triggeruuid ="";
        let material = $('.job_card_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                jobcard_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_item').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                jobcard_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
        });

        let tool_datatables_init = true;
        let triggeruuid2 ="";
        let tool = $('.job_card_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid2 = $(this).data('uuid');
                jobcard_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool').DataTable();
                table.destroy();
                triggeruuid2 = $(this).data('uuid');
                jobcard_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
        });

         material_datatables_init = true;
        let triggeruuid3 ="";
        let material2 = $('.job_card_engineer_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid3 = $(this).data('uuid');
                jobcard_item(triggeruuid3);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_item').DataTable();
                table.destroy();
                triggeruuid3 = $(this).data('uuid');
                jobcard_item(triggeruuid3);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
        });

         tool_datatables_init = true;
        let triggeruuid4 ="";
        let tool2 = $('.job_card_engineer_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid4 = $(this).data('uuid');
                jobcard_tool(triggeruuid4);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool').DataTable();
                table.destroy();
                triggeruuid4 = $(this).data('uuid');
                jobcard_tool(triggeruuid4);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
        });


    }
};

jQuery(document).ready(function () {
    JobCard.init();
});
