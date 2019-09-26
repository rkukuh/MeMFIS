let Attendance = {
    init: function () {
        $('.attendance_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard',
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
                    field: '',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Day Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'In',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Out',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Late In',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Earlier Out',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
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
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_overtime" href="#">' + "Transaction No" + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        }
                    }

                },
                {
                    field: 'title',
                    title: 'Leaves Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_leave" href="#">' + "Transaction No" + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        }
                    }

                },
                {
                    field: 'title',
                    title: 'Correction Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a data-toggle="modal" data-target="#modal_transaction_correction" href="#">' + "Transaction No" + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + "Propose" + "</a>"
                        }
                    }

                },
                {
                    field: '',
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
