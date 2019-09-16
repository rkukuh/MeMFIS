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
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-basic" title="View" data-uuid="' +
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
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-sip" title="View" data-uuid="' +
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
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-cpcp" title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });
        $("#adsb_datatable").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
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
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-si" title="View" data-uuid="' +
                            t.uuid +
                            '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });

        $(
            '<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>'
        ).appendTo("div.dataTables_filter");
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

        let material_datatables_init = true;
        let tool_datatables_init = true;
        let predecessor_datatables_init = true;
        let successor_datatables_init = true;
        let instruction_datatables_init = true;
        let predecessor_instruction_datatable_init = true;
        let successor_instruction_datatable_init = true;

        $("#basic_datatable").on("click", ".select-basic", function() {
            let taskcard_uuid = $(this).data("uuid");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url:
                    "/project-hm/" +
                    project_uuid +
                    "/workpackage/" +
                    workPackage_uuid +
                    "/taskcard/" +
                    taskcard_uuid,
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error("Task card alrady exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $("#modal_basic").modal("hide");

                            toastr.success(
                                "Task Card has been added.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".basic_datatable").mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $("#sip_datatable").on("click", ".select-sip", function() {
            let taskcard_uuid = $(this).data("uuid");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url:
                    "/project-hm/" +
                    project_uuid +
                    "/workpackage/" +
                    workPackage_uuid +
                    "/taskcard/" +
                    taskcard_uuid,
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
                        if (data.title == "Danger") {
                            toastr.error("Task card alrady exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $("#modal_sip").modal("hide");

                            toastr.success(
                                "Task Card has been added.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".sip_datatable").mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $("#cpcp_datatable").on("click", ".select-cpcp", function() {
            let taskcard_uuid = $(this).data("uuid");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url:
                    "/project-hm/" +
                    project_uuid +
                    "/workpackage/" +
                    workPackage_uuid +
                    "/taskcard/" +
                    taskcard_uuid,
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
                        if (data.title == "Danger") {
                            toastr.error("Task card alrady exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $("#modal_cpcp").modal("hide");

                            toastr.success(
                                "Task Card has been added.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".cpcp_datatable").mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $("#adsb_datatable").on("click", ".instructions", function() {
            console.log(instruction_datatables_init);
            if (instruction_datatables_init == true) {
                instruction_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $("#cmrawl_datatable").on("click", ".instructions", function() {
            console.log(instruction_datatables_init);
            if (instruction_datatables_init == true) {
                instruction_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });


        $("#si_datatable").on("click", ".select-si", function() {
            let taskcard_uuid = $(this).data("uuid");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url:
                    "/project-hm/" +
                    project_uuid +
                    "/workpackage/" +
                    workPackage_uuid +
                    "/taskcard/" +
                    taskcard_uuid,
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
                        if (data.title == "Danger") {
                            toastr.error("Task card alrady exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $("#modal_si").modal("hide");

                            toastr.success(
                                "Task Card has been added.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".si_datatable").mDatatable();
                            anyChanges = true;
                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $(".b-t-n").on("click", ".btn-add", function() {
            if ($("#predecessorBtn").length == 0) {
            } else {
                $(".add-predecessor-modal").remove();
            }
            if ($("#successorBtn").length == 0) {
            } else {
                $(".add-successor-modal").remove();
            }
        });

        //Basic taskcard Datatable
        $(".basic_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $(
                    "#m_datatable_material_taskcard_wp"
                ).DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".basic_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                   .ajax.reload();
            }
        });
        $(".basic_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".modal-footer").on("click", ".sequence", function() {
            triggeruuid = $("input[name=uuid]").val();
            sequence = $("input[name=sequence]").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/sequence/",
                data: {
                    _token: $("input[name=_token]").val(),
                    sequence: sequence
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Sequence has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );
                        $("#taskcard_sequence").modal("hide");

                        let table = $(".basic_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".sip_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".cpcp_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".si_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
        $(".modal-footer").on("click", ".sequence-intruction", function() {
            triggeruuid = $("input[name=uuid-instruction]").val();
            sequence = $("input[name=sequence-instruction]").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/sequence/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    sequence: sequence
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Sequence has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );
                        $("#instruction_sequence").modal("hide");

                        let table = $(".ea_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".eo_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".ad-sb_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".cmr-awl_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $(".si_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".basic_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });
        $(".basic_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".basic_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
        $(".basic_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".basic_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".basic_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        //SIP taskcard Datatable
        $(".sip_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $(
                    "#m_datatable_material_taskcard_wp"
                ).DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".sip_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".sip_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".sip_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".sip_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });
        $(".sip_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".sip_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".sip_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".sip_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        //CPCP taskcard Datatable
        $(".cpcp_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $(
                    "#m_datatable_material_taskcard_wp"
                ).DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cpcp_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".cpcp_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cpcp_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cpcp_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });
        $(".cpcp_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".cpcp_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".cpcp_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".cpcp_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        function instruction(triggeruuid) {
            $("#instruction_datatable").DataTable({
                dom: '<"top"f>rt<"bottom">pl',
                responsive: !0,
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 5,
                ajax: "/datatables/workpackage/" + triggeruuid + "/instruction",
                columns: [
                    {
                        data: "number"
                    },
                    {
                        data: "description"
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
                                '<a class="btn btn-primary btn-sm m-btn--hover-brand select-instruction" title="View" data-uuid="' +
                                t.uuid +
                                '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                            );
                        }
                    }
                ]
            });

            $(".paging_simple_numbers").addClass("pull-left");
            $(".dataTables_length").addClass("pull-right");
            $(".dataTables_info").addClass("pull-left");
            $(".dataTables_info").addClass("margin-info");
            $(".paging_simple_numbers").addClass("padding-datatable");

            $(".item-body").on("click", ".item_modal", function() {
                $("#add_modal_material").modal("show");
            });
        }

        $("#instruction_datatable").on(
            "click",
            ".select-instruction",
            function() {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "post",
                    url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/instruction/'+$(this).data("uuid"),
                    // url:
                    //     "/workpackage/" +
                    //     workPackage_uuid +
                    //     "/taskcard/instruction",
                    data: {
                        _token: $("input[name=_token]").val(),
                        // taskcard: $(this).data("uuid")
                    },
                    success: function(data) {
                        if (data.errors) {
                            // if (data.errors.name) {
                            //     $('#name-error').html(data.errors.name[0]);
                            //     document.getElementById('name').value = name;
                            // }
                        } else {
                            if (data.title == "Danger") {
                                toastr.error(
                                    "Instruction alrady exists!",
                                    "Error",
                                    {
                                        timeOut: 5000
                                    }
                                );
                            } else {
                                $("#modal_instruction").modal("hide");

                                toastr.success(
                                    "Instruction has been added.",
                                    "Success",
                                    {
                                        timeOut: 5000
                                    }
                                );

                                let table = $(
                                    ".cmr-awl_datatable"
                                ).mDatatable();

                                table.originalDataSet = [];
                                table.reload();

                                table = $(".ad-sb_datatable").mDatatable();

                                table.originalDataSet = [];
                                table.reload();

                                table = $(".ad-sb_datatable").mDatatable();

                                table.originalDataSet = [];
                                table.reload();

                                table = $(".eo_datatable").mDatatable();

                                table.originalDataSet = [];
                                table.reload();

                                table = $(".ea_datatable").mDatatable();

                                table.originalDataSet = [];
                                table.reload();
                            }
                        }
                    }
                });
            }
        );

        //ADSB
        $(".ad-sb_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".ad-sb_datatable").on("click", ".successor-instruction", function() {
            if (successor_instruction_datatable_init == true) {
                successor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".ad-sb_datatable").on("click", ".sequence-instruction", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });
        $(".ad-sb_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".ad-sb_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });


        $(".ad-sb_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".ad-sb_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".ad-sb_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".ad-sb_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });


        //CMR-AWL

        $(".cmr-awl_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".cmr-awl_datatable").on("click", ".successor-instruction", function() {
            if (successor_instruction_datatable_init == true) {
                successor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cmr-awl_datatable").on(
            "click",
            ".sequence-instruction",
            function() {
                triggeruuid = $(this).data("uuid");
                sequence = $(this).data("sequence");

                document.getElementById("uuid-instruction").value = triggeruuid;
                document.getElementById(
                    "sequence-instruction"
                ).value = sequence;
            }
        );
        $(".cmr-awl_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".cmr-awl_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".cmr-awl_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".cmr-awl_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".cmr-awl_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".cmr-awl_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".ea_datatable").on("click", ".sequence-instruction", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });
        $(".ea_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".ea_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".ea_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".ea_datatable").on("click", ".successor-instruction", function() {
            if (successor_instruction_datatable_init == true) {
                successor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $("#ea_datatable").on("click", ".instructions", function() {
            console.log(instruction_datatables_init);
            if (instruction_datatables_init == true) {
                instruction_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".ea_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".ea_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
        $(".ea_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".ea_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".eo_datatable").on("click", ".sequence-instruction", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });

        $(".eo_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".eo_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".eo_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".eo_datatable").on("click", ".successor-instruction", function() {
            if (successor_instruction_datatable_init == true) {
                successor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $("#eo_datatable").on("click", ".instructions", function() {
            console.log(instruction_datatables_init);
            if (instruction_datatables_init == true) {
                instruction_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                instruction(triggeruuid);
                $("#instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".eo_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".eo_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
        $(".eo_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_eo(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".eo_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_eo(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        //SI taskcard Datatable
        $(".si_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".si_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-successor").value = triggeruuid;
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        $(".si_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_si(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $(
                    "#m_datatable_material_taskcard_wp"
                ).DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_si(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".si_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_si(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_si(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".si_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });
        $(".si_datatable").on("click", ".mandatory", function() {
            triggeruuid = $(this).data("uuid");
            mandatory = $(this).data("mandatory");
            if (mandatory == 0) {
                is_mandatory = 1;
            } else if (mandatory == 1) {
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/mandatory/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".si_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".si_datatable").on("click", ".rii", function() {
            triggeruuid = $(this).data("uuid");
            rii = $(this).data("rii");
            if (rii == 0) {
                is_rii = 1;
            } else if (rii == 1) {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/project-hm/" + triggeruuid + "/rii/",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_rii: is_rii
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        toastr.success("Rii has been updated.", "Success", {
                            timeOut: 5000
                        });

                        let table = $(".si_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        //taskcared delete
        $(".m-datatable").on("click", ".delete", function() {
            let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            let datatableClassName = parent_id.className.split(" ");
            triggeruuid = $(this).data("uuid");
            swal({
                title: "Sure want to remove?",
                type: "question",
                confirmButtonText: "Yes, REMOVE",
                confirmButtonColor: "#d33",
                cancelButtonText: "Cancel",
                showCancelButton: true
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url: "/project-hm/" + triggeruuid + "/destroy",
                        success: function(data) {
                            toastr.success(
                                "Taskcard has been deleted.",
                                "Deleted",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(
                                "." + datatableClassName
                            ).mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function(jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function(index, value) {
                                $("#delete-error").html(value);
                            });
                        }
                    });
                }
            });
        });

        //instruction delete
        $(".m-datatable").on("click", ".delete-instruction", function() {
            let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            let datatableClassName = parent_id.className.split(" ");
            triggeruuid = $(this).data("uuid");
            swal({
                title: "Sure want to remove?",
                type: "question",
                confirmButtonText: "Yes, REMOVE",
                confirmButtonColor: "#d33",
                cancelButtonText: "Cancel",
                showCancelButton: true
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url: "/project-hm/" + triggeruuid + "/destroy/instruction",
                        success: function(data) {
                            toastr.success(
                                "Taskcard has been deleted.",
                                "Deleted",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(
                                "." + datatableClassName
                            ).mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function(jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function(index, value) {
                                $("#delete-error").html(value);
                            });
                        }
                    });
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    Datatables.init();
});
