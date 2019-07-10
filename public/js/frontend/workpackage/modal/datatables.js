function material_tc(triggeruuid) {
    $("#m_datatable_material_taskcard_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-routine/"+triggeruuid+"/materials",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};

function tool_tc(triggeruuid) {
    $("#m_datatable_tool_taskcard_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-routine/"+triggeruuid+"/tools",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};

function material_tc_si(triggeruuid) {
    $("#m_datatable_material_taskcard_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-si/"+triggeruuid+"/materials",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};

function tool_tc_si(triggeruuid) {
    $("#m_datatable_tool_taskcard_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-si/"+triggeruuid+"/tools",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};

function material_tc_eo(triggeruuid) {
    $("#m_datatable_material_eo_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-eo/"+triggeruuid+"/materials",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};

function tool_tc_eo(triggeruuid) {
    $("#m_datatable_tool_eo_wp").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/taskcard-eo/"+triggeruuid+"/tools",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "unit.name"
            }
        ]
    })

    // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.item-body').on('click', '.item_modal', function () {
        $('#add_modal_material').modal('show');
    });

};
