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
                    field: 'overtime_remark',
                    title: 'Approved Overtime',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.overime){
                            return '<a data-toggle="modal" data-target="#modal_transaction_overtime" href="#">' + "Transaction No" + "</a>"
                        }else{
                            return "-";
                        }
                    }

                },
                {
                    field: 'leave_remark',
                    title: 'Leaves Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.leave){
                            return '<a data-toggle="modal" data-uuid="'+t.leave.uuid+'" href="#" class="leave_modal">' + t.leave.code + "</a>";
                        }else{
                            return "-";
                        }
                    }
                },
                {
                    field: 'correction_remark',
                    title: 'Correction Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.correction){
                            return '<a data-toggle="modal" data-target="#modal_transaction_correction" href="#">' + "Transaction No" + "</a>"
                        }else{
                            return "-";
                        }
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

$(document).ready(function() {
    $('.attendance_datatable').on("click",".leave_modal", function() {
        let leave_uuid = $(this).data("uuid");

        $("#modal_transaction_leave").modal('show');
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                )
            },
            type: "GET",
            url:
                "/leave/" +
                leave_uuid +
                "/api",
            success: function(data) {
                console.log(data);
                $("#leave-code").html(data.code);
                $("#leave-status").html(data.status.name);
                $("#leave-approve").html(data.conductedBy.first_name+";"+data.approval.created_at);
                $("#leave-job-title").html(data.conductedBy.job_title_id);
                $("#leave-remark").html(data.description);

                $("#leave-start-date").html(data.start_date);
                $("#leave-end-date").html(data.end_date);
                $("#leave-type").html(data.leave_type.name);
                $("#leave-type-description").html(data.leave_type.description);
                $("#leave-created").html(data.leave_type.created_at);

            },
            error: function(jqXhr, json, errorThrown) {
                let errors = jqXhr.responseJSON;
                $.each(errors.error, function(index, value) {
                    toastr.error(value.message, value.title, {
                        closeButton: true,
                        timeOut: "0"
                    });
                });
            }
        });
    });
});