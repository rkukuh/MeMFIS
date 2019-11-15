let AttendanceCorrection = {
    init: function () {
        $('.attendance_correction_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/attendance-correction',
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
                    field: 'created_at',
                    title: 'Created Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'uuid',
                    title: 'Correction Number',
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
                    field: 'employee.first_name',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
               
                {
                    field: 'correction_date',
                    title: 'Corrected Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
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
                        if(t.status.name == "Open"){
                            return (
                                '<a href="/attendance-correction/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" data-toggle="modal" data-target="#modal_approve" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-check"></i>' +
                                '</a>' +
                                '<a href="#" data-toggle="modal" data-target="#modal_reject" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill reject" title="Reject" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-remove"></i>' +
                                '</a>'
                            );
                        }else{
                            return('');
                        }
                    }
                }
            ]
        });     

    }
};

jQuery(document).ready(function () {
    AttendanceCorrection.init();
});

$(document).ready(function() {
    $('.attendance_correction_datatable').on("click",".approve", function() {
        let correction_uuid = $(this).data("uuid");

        swal({
            title: '<label><h2>Are you sure?</h2><br> do you want to <strong style="color:#26C281;">approve</strong> this transaction ?</label>',
            text: "Remark",
            type: "question",
            input: "textarea",
            inputAttributes: {
                autocapitalize: "on"
            },
            confirmButtonText: "Yes, Approve",
            confirmButtonColor: "#34bfa3",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            showLoaderOnConfirm: true
        }).then(result => {
            if (result.value) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "POST",
                    data: {
                        note: result.value
                    },
                    url:
                        "/attendance-correction/" +
                        correction_uuid +
                        "/approve",
                    success: function(data) {
                        toastr.success(
                            "Attendance correction has been approved.",
                            "Approved",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".attendance_correction_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
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
            }
        });
    });
    $('.attendance_correction_datatable').on("click",".reject", function() {
        let correction_uuid = $(this).data("uuid");

        swal({
            title: '<label><h2>Are you sure?</h2><br> do you want to <strong style="color:#E43A45;">reject</strong> this transaction ?</label>',
            text: "Remark",
            type: "question",
            input: "textarea",
            inputAttributes: {
                autocapitalize: "on"
            },
            confirmButtonText: "Yes, Reject",
            confirmButtonColor: "#E43A45",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            showLoaderOnConfirm: true
        }).then(result => {
            if (result.value) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "POST",
                    data: {
                        note: result.value
                    },
                    url:
                        "/attendance-correction/" +
                        correction_uuid +
                        "/reject",
                    success: function(data) {
                        toastr.success(
                            "Attendance correction has been rejected.",
                            "Rejected",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".attendance_correction_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
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
            }
        });
    });
});