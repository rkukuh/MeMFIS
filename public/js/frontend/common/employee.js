// let Employee = {
//     init: function () {
//         $("#m_datatable_journal").DataTable({
//             "dom": '<"top"f>rt<"bottom">pl',
//             responsive: !0,
//             searchDelay: 500,
//             processing: !0,
//             serverSide: !0,
//             lengthMenu: [5, 10, 25, 50 ],
//             pageLength:5,
//             ajax: "/get-account-codes/",
//             columns: [
//                 {
//                     data: "code"
//                 },
//                 {
//                     data: "name"
//                 },
//                 {
//                     data: "Actions"
//                 }
//             ],
//             columnDefs: [
//                 {
//                     targets: -1,
//                     orderable: !1,
//                     render: function (a, e, t, n) {
//                         return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-account_code" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
//                     }
//                 },

//             ]
//         })

//         $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
//         $('.paging_simple_numbers').addClass('pull-left');
//         $('.dataTables_length').addClass('pull-right');
//         $('.dataTables_info').addClass('pull-left');
//         $('.dataTables_info').addClass('margin-info');
//         $('.paging_simple_numbers').addClass('padding-datatable');

//         $('.dataTables_filter').on('click', '.refresh', function () {
//             $('#m_datatable_journal').DataTable().ajax.reload();
//         });

//         $('.dataTable').on('click', '.select-account_code', function () {
//             let uuid = $(this).data('uuid');
//             let code = $(this).data('code');
//             let name = $(this).data('name');

//             document.getElementById('account_code').value = uuid;

//             $('.search-journal').html(code + " - " + name);
//             $('#modal_account_code').modal('hide');
//         });
//     }
// };

// jQuery(document).ready(function () {
//     Employee.init();
// });


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
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-account_code" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-first_name="' + t.first_name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
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

        $('.dataTable').on('click', '.select-account_code', function () {
            let uuid = $(this).data('uuid');
            let code = $(this).data('code');
            let name = $(this).data("first_name");

            // document.getElementById('account_code').value = uuid;
            document.getElementById('search-journal-val').value = uuid;

            $('.search-journal').html(code + " - " + name);
            $('#modal_employee').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
