let Workpackage = {
    init: function() {
        function remove_element() {
            if ($(".add-predecessor-modal")[0]){
                // Do something if class exists
                $('.add-predecessor-modal').remove();
            }
            if ($(".add-successor-modal")[0]){
                // Do something if class exists
                $('.add-successor-modal').remove();
            }
        };

        $(".b-t-n").on("click", ".btn-add", function() {
            remove_element();
        });

        $(".nav-tabs").on("click", ".routine", function() {
            let basic = $(".basic_datatable").mDatatable();

            basic.originalDataSet = [];
            basic.reload();

            let sip = $(".sip_datatable").mDatatable();

            sip.originalDataSet = [];
            sip.reload();

            let cpcp = $(".cpcp_datatable").mDatatable();

            cpcp.originalDataSet = [];
            cpcp.reload();
        });

        $(".nav-tabs").on("click", ".non-routine", function() {
            let Preliminary = $(".preliminary_datatable").mDatatable();

            Preliminary.originalDataSet = [];
            Preliminary.reload();

            let AdSb = $(".ad-sb_datatable").mDatatable();

            AdSb.originalDataSet = [];
            AdSb.reload();

            let CmrAwl = $(".cmr-awl_datatable").mDatatable();

            CmrAwl.originalDataSet = [];
            CmrAwl.reload();

            let SI = $(".si_datatable").mDatatable();

            SI.originalDataSet = [];
            SI.reload();

            let EA = $(".ea_datatable").mDatatable();

            EA.originalDataSet = [];
            EA.reload();

            let EO = $(".eo_datatable").mDatatable();

            EO.originalDataSet = [];
            EO.reload();
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

        let triggeruuid = "";
        let material_datatables_init = true;
        let tool_datatables_init = true;
        let predecessor_datatables_init = true;
        let successor_datatables_init = true;
        let predecessor_instruction_datatable_init = true;
        let successor_instruction_datatable_init = true;
        let instruction_datatables_init = true;

        //Basic taskcard Datatable
        $(".basic_datatable").on("click", ".material", function() {
            remove_element()
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
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
            mApp.block(".sequence");

            triggeruuid = $("input[name=uuid]").val();
            sequence = $("input[name=sequence]").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/sequence/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    sequence: sequence
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".sequence");

                        toastr.success(
                            "Sequence has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );
                        $("#taskcard_sequence").modal("hide");

                        table = $(".basic_datatable").mDatatable();
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

                        table = $(".preliminary_datatable").mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $(".modal-footer").on("click", ".sequence-intruction", function() {
            mApp.block(".sequence-intruction");

            triggeruuid = $("input[name=uuid-instruction]").val();
            sequence = $("input[name=sequence-instruction]").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/sequence/" +
                    triggeruuid+
                    "/instruction/",
                data: {
                    _token: $("input[name=_token]").val(),
                    sequence: sequence
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".sequence-intruction");

                        toastr.success(
                            "Instruction sequence has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );
                        $("#instruction_sequence").modal("hide");

                        table = $(".ad-sb_datatable").mDatatable();
                        table.originalDataSet = [];
                        table.reload();

                        table = $(".cmr-awl_datatable").mDatatable();
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
            });
        });

        $(".basic_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });

        $(".basic_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        $(".basic_datatable").on("click", ".tool", function() {
            remove_element()
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
            remove_element()
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
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

        $(".sip_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });

        $(".sip_datatable").on("click", ".tool", function() {
            remove_element()
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

        $(".sip_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        //CPCP taskcard Datatable
        $(".cpcp_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
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

        $(".cpcp_datatable").on("click", ".material", function() {
            remove_element()
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cpcp_datatable").on("click", ".tool", function() {
            remove_element()
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

        $(".cpcp_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        //ad-sb_datatable taskcard Datatable
        $(".ad-sb_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });

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

        $(".ad-sb_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid+
                    "/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        $("#adsb_datatable").on("click", ".instructions", function() {
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

        $(".ad-sb_datatable").on("click", ".material", function() {
            remove_element()
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
            remove_element()
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

        //cmr-awl_datatable taskcard Datatable
        $(".cmr-awl_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });

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

        $(".cmr-awl_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid+
                    "/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        $("#cmrawl_datatable").on("click", ".instructions", function() {
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

        $(".cmr-awl_datatable").on("click", ".material", function() {
            remove_element()
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
            remove_element()
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

        $(".eo_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid+
                    "/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        $(".eo_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
        });
        
        $(".eo_datatable").on("click", ".material", function() {
            remove_element()
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
            remove_element()
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

        $(".ea_datatable").on("click", ".material", function() {
            remove_element()
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
            remove_element()
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

        $("#ea_datatable").on("click", ".instructions", function() {
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

        $(".ea_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid+
                    "/instruction",
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        $(".ea_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid-instruction").value = triggeruuid;
            document.getElementById("sequence-instruction").value = sequence;
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

        $("#instruction_datatable").on("click", ".select-instruction", function() {
            mApp.block(".select-instruction");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/workpackage/" + workPackage_uuid + "/taskcard/instruction",
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
                            toastr.error("Instruction already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            mApp.unblock(".select-instruction");

                            $("#modal_instruction").modal("hide");

                            toastr.success("Instruction has been added.", "Success", {
                                timeOut: 5000
                            });

                            let table = $(".cmr-awl_datatable").mDatatable();

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
        });

        //SI taskcard Datatable
        $(".si_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });

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
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
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

        $(".si_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

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

        //Preliminary taskcard Datatable
        $(".preliminary_datatable").on("click", ".sequence", function() {
            triggeruuid = $(this).data("uuid");
            sequence = $(this).data("sequence");

            document.getElementById("uuid").value = triggeruuid;
            document.getElementById("sequence").value = sequence;
        });

        $(".preliminary_datatable").on("click", ".predecessor", function() {
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
        
        $(".preliminary_datatable").on("click", ".successor", function() {
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

        $(".preliminary_datatable").on("click", ".material", function() {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                material_tc_preliminary(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_material_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                material_tc_preliminary(triggeruuid);
                $("#m_datatable_material_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".preliminary_datatable").on("click", ".tool", function() {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid = $(this).data("uuid");
                tool_tc_preliminary(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#m_datatable_tool_taskcard_wp").DataTable();
                table.destroy();
                triggeruuid = $(this).data("uuid");
                tool_tc_preliminary(triggeruuid);
                $("#m_datatable_tool_taskcard_wp")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".preliminary_datatable").on("click", ".mandatory", function() {
            mApp.block(".mandatory");

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
                url:
                    "/workpackage/" +
                    workPackage_uuid +
                    "/mandatory/" +
                    triggeruuid,
                data: {
                    _token: $("input[name=_token]").val(),
                    is_mandatory: is_mandatory
                },
                success: function(data) {
                    if (data.errors) {
                    } else {
                        mApp.unblock(".mandatory");

                        toastr.success(
                            "Mandatory has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".preliminary_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        //taskcard delete
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
                    mApp.block(".delete");

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url:
                            "/workpackage/" +
                            workPackage_uuid +
                            "/taskcard/" +
                            triggeruuid,
                        success: function(data) {
                            mApp.unblock(".delete");

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

        //taskcard instruction delete
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
                    mApp.block(".delete-instruction");

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url:
                            "/workpackage/" +
                            workPackage_uuid +
                            "/taskcard/" +
                            triggeruuid+
                            "/instruction",
                        success: function(data) {
                            mApp.unblock(".delete-instruction");

                            toastr.success(
                                "Instruction has been deleted.",
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

        let simpan = $(".action-buttons").on("click", ".add-workpackage.update", function() {
                mApp.block(".delete-instruction");

                let title = $("input[name=title]").val();
                let applicability_airplane = $("#applicability_airplane").val();
                let description = $("#description").val();

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "put",
                    url: "/workpackage/" + workPackage_uuid,
                    data: {
                        _token: $("input[name=_token]").val(),
                        title: title,
                        aircraft_id: applicability_airplane,
                        description: description,
                        is_template: "1"
                    },
                    success: function(data) {
                        if (data.errors) {
                            if (data.errors.aircraft_id) {
                                $("#applicability-airplane-error").html(
                                    data.errors.aircraft_id[0]
                                );
                            }
                            if (data.errors.title) {
                                $("#title-error").html(data.errors.title[0]);
                            }

                            // document.getElementById('applicability-airplane').value = applicability-airplane;
                            // document.getElementById('title').value = title;
                        } else {
                            mApp.unblock(".delete-instruction");

                            // $('#modal_customer').modal('hide');

                            toastr.success(
                                "Work Package has been created.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            // let table = $('.m_datatable').mDatatable();

                            // table.originalDataSet = [];
                            // table.reload();
                        }
                    }
                });
            }
        );
    }
};

jQuery(document).ready(function() {
    Workpackage.init();
});
