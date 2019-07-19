let AdditionalTask = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.additional_task_datatable').mDatatable({
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
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                    }
                },
                {
                    field: 'taskcard.number',
                    title: 'Additional Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'Project No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.type.name',
                    title: 'WO No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.task.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'A/C Type',
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
                    title: 'A/C Reg.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '1',
                    title: 'A/C Serial No.',
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
                    title: 'Created By',
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
                            '<a href="jobcard/'+t.taskcard.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

    }
};

jQuery(document).ready(function () {
    AdditionalTask.init();
});
