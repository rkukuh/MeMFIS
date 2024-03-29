let Overtime = {
    init: function () {
        $('.overtime_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/overtime',
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
                    field: 'date',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Overtime Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a data-toggle="modal" data-target="#modal_transaction_correction" href="#">' + t.code + "</a>"
                    }
                },
                {
                    field: 'employee.code',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'employee_full_name',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.employee.first_name +' '+ t.employee.last_name
                    }
                },
                {
                    field: 'start',
                    title: 'Start Time',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'end',
                    title: 'End Time',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'total',
                    title: 'Total',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'desc',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status.name',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'conductedBy',
                    title: 'Approval',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    title: 'Action',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/overtime/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" data-toggle="modal" data-target="#modal_approve" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                '<i class="la la-check"></i>' +
                            '</a>' +
                            '<a href="#" data-toggle="modal" data-target="#modal_reject" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                '<i class="la la-remove"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });     

    }
};

jQuery(document).ready(function () {
    Overtime.init();
});
