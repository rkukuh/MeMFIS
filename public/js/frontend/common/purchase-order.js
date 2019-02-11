let Grn = {
    init: function () {
        $("#purhcase_order_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/datatables/purchase-order/modal",
            columns: [
                {
                    data: "ordered_at"
                },
                {
                    data: "number"
                },
                {
                    data: "purchase_request.number"
                },
                {
                    data: "vendor.code"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [
                {
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-purchase-order   " title="View" data-uuid="' + t.uuid + '" data-code="' + t.number + '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTable').on('click', '.select-purchase-order', function () {
            let uuid = $(this).data('uuid');
            let code = $(this).data('code');

            document.getElementById('ref-po').value = uuid;

            $('.search-purchase-order').html(code);
            $('#modal_purchase_order').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    Grn.init();
});
