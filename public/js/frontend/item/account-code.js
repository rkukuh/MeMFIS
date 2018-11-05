let AccountCode = {
    init: function () {
        $("#m_datatable_journal").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/get-account-codes/",
            columns: [{
                data: "code"
            }, {
                data: "name"
            }, {
                data: "Actions"
            }],
            columnDefs: [{
                    targets: -1,
                    title: "Actions",
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '\n<a  class="m-portlet__nav-link btn m-btn m-btn--hover-brand select-accourcode" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<i class="la la-edit">Use</i></a>'
                    }
                },

            ]
        })

        $('<a class="btn m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air btn-promary btn-md refresh" style="margin-left:53%"><span><i class="la la-refresh">Reload</i></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');

        $('.paging_simple_numbers').addClass('padding-datatable');

        let refresh = $('.dataTables_filter').on('click', '.refresh', function () {
            $('#m_datatable_journal').DataTable().ajax.reload();
        });

        let select = $('.dataTable').on('click', '.select-accourcode', function () {
            let triggeruuid = $(this).data('uuid');
            let triggercode = $(this).data('code');
            let triggername = $(this).data('name');

            $('.search-journal').html(triggercode + " - " + triggername);
            document.getElementById('account_code').value = triggeruuid;
            $('#modal_account_code').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    AccountCode.init();
});
