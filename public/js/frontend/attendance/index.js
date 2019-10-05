let Attendance = {
    init: function () {
        $('.attendance_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/attendance',
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
                    field: 'nrp',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'employee_name',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'days',
                    title: 'Day Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'date',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'in',
                    title: 'In',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'out',
                    title: 'Out',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'late_in',
                    title: 'Late In',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'earlier_out',
                    title: 'Earlier Out',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'overtime',
                    title: 'Overtime',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'title',
                    title: 'Approved Overtime',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        // if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_overtime" href="#">' + "Transaction No" + "</a>"
                        // }
                        // else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                        //     return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        // }
                    }

                },
                {
                    field: 'title',
                    title: 'Leaves Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        // if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_leave" href="#">' + "Transaction No" + "</a>"
                        // }
                        // else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                        //     return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        // }
                    }

                },
                {
                    field: 'title',
                    title: 'Correction Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        // if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_correction" href="#">' + "Transaction No" + "</a>"
                        // }
                        // else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            // return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        // }
                    }

                },
                {
                    field: 'statuses_name',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Processed to Payroll',
                    sortable: 'asc',
                    filterable: !1,

                }
            ]
        });

    }
};

jQuery(document).ready(function () {
    Attendance.init();
});
