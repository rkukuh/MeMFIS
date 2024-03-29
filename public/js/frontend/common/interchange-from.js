let InterchangeFrom = {
    init: function() {
        $("#interchange_datatable_from").DataTable({
            dom: '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/item/modal",
            columns: [
                {
                    data: "code"
                },
                {
                    data: "name"
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
                            '<a class="btn btn-primary btn-sm m-btn--hover-brand select-interchange-from" title="View" data-uuid="' +
                            t.uuid +
                            '" data-code="' +
                            t.code +
                            '" data-desc_from="' +
                            t.description +
                            '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                        );
                    }
                }
            ]
        });

        // $(
        //     '<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>'
        // ).appendTo("div.dataTables_filter");
        $(".paging_simple_numbers").addClass("pull-left");
        $(".dataTables_length").addClass("pull-right");
        $(".dataTables_info").addClass("pull-left");
        $(".dataTables_info").addClass("margin-info");
        $(".paging_simple_numbers").addClass("padding-datatable");

        // $(".dataTables_filter").on("click", ".refresh", function() {
        //     $("#m_datatable_journal")
        //         .DataTable()
        //         .ajax.reload();
        // });

        // let item_datatables_init = true;

        $(".dataTable").on("click", ".select-interchange-from", function() {
            let uuid = $(this).data("uuid");

            let code = $(this).data("code");

            let desc_from = $(this).data("desc_from");

            document.getElementById("uuid_from").value = uuid;
            $("#search-interchange-from").html(code);
            $("#description-from").val(desc_from);
            $("#modal_interchange_from").modal("hide");

            // if (item_datatables_init == true) {
            //     item_datatables_init = false;
            //     item(uuid);
            // } else {
            //     let table = $(".item_datatable").mDatatable();
            //     table.destroy();
            //     item(uuid);
            //     table = $(".item_datatable").mDatatable();
            //     table.originalDataSet = [];
            //     table.reload();
            // }
        });
    }
};

jQuery(document).ready(function() {
    InterchangeFrom.init();
});
