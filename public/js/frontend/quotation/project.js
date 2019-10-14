let QuotationProjectWorkpacage = {
    init: function() {

        let material_datatables_init = true;
        let tool_datatables_init = true;
        let predecessor_datatables_init = true;
        let successor_datatables_init = true;
        let predecessor_instruction_datatable_init = true;
        let successor_instruction_datatable_init = true;


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
                
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
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
                
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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

        //ADSB
        $(".ad-sb_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
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

        $(".cmr-awl_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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

        $(".ea_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
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


        $(".eo_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
                successor_instruction_tc(triggeruuid);
                $("#successor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
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
                
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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


         //Preliminary taskcard Datatable
        $(".preliminary_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                
                predecessor_tc(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                
                successor_tc(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                
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
                let table = $(
                    "#m_datatable_material_taskcard_wp"
                ).DataTable();
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

    }
};

jQuery(document).ready(function() {
    QuotationProjectWorkpacage.init();
});
