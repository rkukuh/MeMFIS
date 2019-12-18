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
                        if(t.approvals.length == 0){
                            return (
                                '<a href="/overtime/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" data-toggle="modal" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-check"></i>' +
                                '</a>' +
                                '<a href="#" data-toggle="modal" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill reject" title="Reject" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-remove"></i>' +
                                '</a>'
                            );
                        }else{
                            return ('PROCESSED');
                        }
                    }
                }
            ]
        });     

    }
};

$(document).ready(function() {
    $(".overtime_datatable").on("click", ".approve", function() {
        let overtime_uuid = $(this).data("uuid");

        swal({
            title: "Are you sure do you want to approve this transaction ?",
            text: "",
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
                    url: "/overtime/" + overtime_uuid + "/approve",
                    success: function(data) {
                        toastr.success(
                            "Overtime has been approved.",
                            "Approved",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".overtime_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    },
                    error: function(jqXhr, json, errorThrown) {

                        let errors = jqXhr.responseJSON;
                        
                        toastr.error(errors.error.message, errors.error.title, {
                            closeButton: true,
                            timeOut: "0"
                        });
                        
                    }
                });
            }
        });
    });

    $(".overtime_datatable").on("click", ".reject", function() {
        let overtime_uuid = $(this).data("uuid");

        swal({
            title: "Are you sure do you want to reject this transaction ?",
            text: "",
            type: "question",
            input: "textarea",
            inputAttributes: {
                autocapitalize: "on"
            },
            confirmButtonText: "Yes, Reject",
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
                    url: "/overtime/" + overtime_uuid + "/reject",
                    success: function(data) {
                        toastr.success(
                            "Overtime has been rejected.",
                            "Rejected",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".overtime_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    },
                    error: function(jqXhr, json, errorThrown) {

                        let errors = jqXhr.responseJSON;
                        
                        toastr.error(errors.error.message, errors.error.title, {
                            closeButton: true,
                            timeOut: "0"
                        });
                        
                    }
                });
            }
        });
    });
});

jQuery(document).ready(function () {
    Overtime.init();
});
