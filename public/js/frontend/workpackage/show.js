

let Workpackage = {
    init: function () {
        $('.taskcard_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer',
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
                serverSorting: !0
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
                    field: 'title',
                    title: 'Tittle',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'work_area',
                    title: 'Area',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'zone',
                    title: 'Zone',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'rii',
                    title: 'Rii',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },              
            ]
        });

        let material_datatables_init = true;
        let tool_datatables_init = true;
        let predecessor_datatables_init = true;
        let successor_datatables_init = true;
        let predecessor_instruction_datatable_init = true;
        let successor_instruction_datatable_init = true;

        function remove_element() {
            $('.add-predecessor-modal').remove();
            $('.add-successor-modal').remove();
        };

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

        $(".basic_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".basic_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

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
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
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

        $(".cpcp_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".cpcp_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
                $("#successor_datatable")
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

        $(".ad-sb_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
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

        $(".cmr-awl_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
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

        $(".eo_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
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

        $(".ea_datatable").on("click", ".predecessor-instruction", function() {
            if (predecessor_instruction_datatable_init == true) {
                predecessor_instruction_datatable_init = false;
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_instruction_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                // document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_instruction_tc(triggeruuid);
                $("#predecessor_instruction_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $(".preliminary_datatable").on("click", ".predecessor", function() {
            if (predecessor_datatables_init == true) {
                predecessor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#predecessor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                document.getElementById("uuid-predecessor").value = triggeruuid;
                predecessor_tc_show(triggeruuid);
                $("#predecessor_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });
        
        $(".preliminary_datatable").on("click", ".successor", function() {
            if (successor_datatables_init == true) {
                successor_datatables_init = false;
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
                $("#successor_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#successor_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).data("tc_uuid");
                successor_tc_show(triggeruuid);
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

        let show = $('.m_datatable').on('click', '.show', function () {

            $('#button').hide();
            $('#simpan').text('Perbarui');

            let triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/category/' + triggerid,
                success: function (data) {
                    document.getElementById('TitleModalCustomer').innerHTML = 'Detail Customer #ID-' + triggerid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('name').readOnly = true;
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Workpackage.init();
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
