function successor_tc(triggeruuid) {
        $("#successor_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/successor",
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
                    data: "order"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-basic" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $('<button type="button" data-toggle="modal" data-target="#add_modal_successor" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm add-successor-modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.modal-body .dataTables_filter');
};
