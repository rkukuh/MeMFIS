let Datatables = {
    init: function() {
        $("#basic_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/basic/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-basic" title="Use" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });
        $("#sip_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/sip/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-sip" title="Use" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });
        $("#cpcp_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/cpcp/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-cpcp" title="Use" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });
        $("#adsb_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-eo/adsb/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return (
                            '<button class="btn btn-primary btn-sm m-btn--hover-brand instructions" data-toggle="modal" data-target="#modal_instruction" type="button"  title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Select</span></span></button>'
                        );
                    }
                },

            ]
        })

        $("#cmrawl_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-eo/cmrawl/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<button class="btn btn-primary btn-sm m-btn--hover-brand instructions" data-toggle="modal" data-target="#modal_instruction" type="button"  title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Select</span></span></button>'
                        );
                    }
                }
            ]
        });

        $("#preliminary_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-preliminary/preliminary/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-preliminary" title="Use" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });

        $("#si_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-si/si/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-si" title="Use" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });

        $("#ea_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-ea/ea/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<button class="btn btn-primary btn-sm m-btn--hover-brand instructions" data-toggle="modal" data-target="#modal_instruction" type="button"  title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Select</span></span></button>'
                        );
                    }
                }
            ]
        });

        $("#eo_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-eo/eo/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function(a, e, t, n) {
                        return (
                            '<button class="btn btn-primary btn-sm m-btn--hover-brand instructions" data-toggle="modal" data-target="#modal_instruction" type="button"  title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Select</span></span></button>'
                        );
                    }
                }
            ]
        });

        // $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $(".paging_simple_numbers").addClass("pull-left");
        $(".dataTables_length").addClass("pull-right");
        $(".dataTables_info").addClass("pull-left");
        $(".dataTables_info").addClass("margin-info");
        $(".paging_simple_numbers").addClass("padding-datatable");

        $(".dataTables_filter").on("click", ".refresh", function() {
            $("#basic_datatable")
                .DataTable()
                .ajax.reload();
            $("#sip_datatable")
                .DataTable()
                .ajax.reload();
            $("#cpcp_datatable")
                .DataTable()
                .ajax.reload();
            $("#adsb_datatable")
                .DataTable()
                .ajax.reload();
            $("#cmrawl_datatable")
                .DataTable()
                .ajax.reload();
            $("#si_datatable")
                .DataTable()
                .ajax.reload();
        });

        $("#basic_datatable").on("click", ".select-basic", function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard",
                data: {
                    _token: $("input[name=_token]").val(),
                    taskcard: $(this).data("uuid")
                },
                success: function(data) {
                    if (data.title == "Danger") {
                        toastr.error("Task card alrady exists!", "Error", {
                            timeOut: 5000
                        });
                    } else {
                        $("#modal_basic").modal("hide");

                        toastr.success("Task Card has been added.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".basic_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $("#sip_datatable").on("click", ".select-sip", function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard",
                data: {
                    _token: $("input[name=_token]").val(),
                    taskcard: $(this).data("uuid")
                },
                success: function(data) {
                    if (data.title == "Danger") {
                        toastr.error("Task card alrady exists!", "Error", {
                            timeOut: 5000
                        });
                    } else {
                        $("#modal_sip").modal("hide");

                        toastr.success("Task Card has been added.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".sip_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $("#cpcp_datatable").on("click", ".select-cpcp", function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard",
                data: {
                    _token: $("input[name=_token]").val(),
                    taskcard: $(this).data("uuid")
                },
                success: function(data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        $("#modal_cpcp").modal("hide");

                        toastr.success("Task Card has been added.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".cpcp_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $("#si_datatable").on("click", ".select-si", function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard",
                data: {
                    _token: $("input[name=_token]").val(),
                    taskcard: $(this).data("uuid")
                },
                success: function(data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        $("#modal_si").modal("hide");

                        toastr.success("Task Card has been added.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".si_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $("#preliminary_datatable").on("click", ".select-preliminary", function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard",
                data: {
                    _token: $("input[name=_token]").val(),
                    taskcard: $(this).data("uuid")
                },
                success: function(data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        $("#modal_preliminary").modal("hide");

                        toastr.success("Task Card has been added.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".preliminary_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function() {
    Datatables.init();
});
