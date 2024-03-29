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

                            console.log(dataSet);
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
                    field: 'employee.code',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'employee.first_name',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'day',
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
                    field: 'late',
                    title: 'Late In',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'out',
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
                        if(typeof t.parent === 'undefined' || t.parent === null){
                            if(t.attendance_overtime){
                                return '<a data-toggle="modal" data-target="#modal_transaction_overtime"  data-uuid="'+t.attendance_overtime.uuid+'" href="#" class="attendace_correction_modal">' + t.attendance_overtime.code + "</a>"
                            }else{
                                return "-";
                            }
                        }else{
                            if(t.parent.attendance_overtime){
                                return '<a data-toggle="modal" data-target="#modal_transaction_overtime"  data-uuid="'+t.parent.attendance_overtime.uuid+'" href="#" class="attendace_correction_modal">' + t.parent.attendance_overtime.code + "</a>"
                            }else{
                                return "-";
                            }
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
                    field: 'attendance_correction',
                    title: 'Correction Remark',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(typeof t.parent === 'undefined' || t.parent === null){
                            if(t.attendance_correction){
                                return '<a data-toggle="modal" data-target="#modal_transaction_correction"  data-uuid="'+t.attendance_correction.uuid+'" href="#" class="attendace_correction_modal">' + t.attendance_correction.code + "</a>"
                            }else{
                                return "-";
                            }
                        }else{
                            if(t.parent.attendance_correction){
                                return '<a data-toggle="modal" data-target="#modal_transaction_correction"  data-uuid="'+t.parent.attendance_correction.uuid+'" href="#" class="attendace_correction_modal">' + t.parent.attendance_correction.code + "</a>"
                            }else{
                                return "-";
                            }
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
                $("#leave-code").html(data.code);
                $("#leave-status").html(data.status.name);
                $("#leave-approve").html(data.conductedBy.first_name+";"+data.approval.created_at);
                $("#leave-job-title").html(data.conductedBy.job_title_id);
                $("#leave-remark").html(data.description);

                $("#leave-start-date").html(data.start_date);
                $("#leave-end-date").html(data.end_date);
                $("#leave-type").html(data.leave_type.name);
                $("#leave-type-description").html(data.leave_type.description);
                $("#leave-created").html(data.created_at);

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

    $('.attendance_datatable').on("click",".attendace_correction_modal", function() {
        let attcor_uuid = $(this).data("uuid");
        $("#modal_transaction_correction").modal('show');

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                )
            },
            type: "GET",
            url:
                "/attendance-correction/" +
                attcor_uuid +
                "/api",
            success: function(data) {
                console.log(data);
                $("#attcor-code").html(data.code);
                $("#attcor-status").html(data.status.name);
                $("#attcor-approve").html(data.conductedBy);
                $("#attcor-job-title").html(data.conductedBy.job_title_id);
                $("#attcor-remark").html(data.description);

                $("#attcor-code").html(data.code);
                $("#attcor-check-in").html(data.attendance.in);
                $("#attcor-check-out").html(data.attendance.out);
                $("#attcor-description").html(data.description);
                $("#attcor-created").html(data.created_at);

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