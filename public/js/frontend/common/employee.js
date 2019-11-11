let Employee = {
    init: function () {
        $("#m_datatable_journal").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/datatables/employee/modal",
            columns: [
                {
                    data: "code"
                },
                {
                    data: "first_name"
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
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-employee" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-first_name="' + t.first_name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#m_datatable_journal').DataTable().ajax.reload();
        });

        $('.dataTable').on('click', '.select-employee', function () {
            let uuid = $(this).data('uuid');
            let code = $(this).data('code');
            let name = $(this).data("first_name");

            document.getElementById('search-employee-val').value = uuid;

            $('.search-journal').html(code + " - " + name);
            $('#uuid_employee').val(code);
            $('#modal_employee').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
