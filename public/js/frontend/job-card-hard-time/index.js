let JobCard = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.job_card_htcrr_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard-htcrr',

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
                    field: 'code',
                    title: 'HTCRR No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-hardtime/'+t.uuid+'/edit">' + t.code + "</a>"
                    }
                },
                {
                    field: 'project.code',
                    title: 'Project No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.code',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Item Description',
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
                    field: 'removal',
                    title: 'Removal Manhour Est',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'installation',
                    title: 'Installation Manhour Est',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'RII',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.is_rii == 0) {
                            return (
                                '<p>No</p>'
                            );
                        }else{
                            return (
                                '<p>Yes</p>'
                            );
                        }
                    }
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
                            '<a href="jobcard-hardtime/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.job_card_htcrr_datatable_ppc').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard-htcrr',

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
                    field: 'code',
                    title: 'HTCRR No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-hardtime-engineer/'+t.uuid+'/edit">' + t.code + "</a>"
                    }
                },
                {
                    field: 'project.code',
                    title: 'Project No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Item Description',
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
                    field: 'removal',
                    title: 'Removal Manhour Est',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'installation',
                    title: 'Installation Manhour Est',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'RII',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.is_rii == 0) {
                            return (
                                '<p>No</p>'
                            );
                        }else{
                            return (
                                '<p>Yes</p>'
                            );
                        }
                    }
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
                            '<a href="/jobcard-hardtime/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
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
