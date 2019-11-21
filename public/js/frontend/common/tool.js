let ToolDatatables = {
    init: function () {
        // $("#tool_datatable").DataTable({
        //     "dom": '<"top"f>rt<"bottom">pl',
        //     responsive: !0,
        //     searchDelay: 500,
        //     processing: !0,
        //     serverSide: !0,
        //     lengthMenu: [5, 10, 25, 50 ],
        //     pageLength:5,
        //     ajax: "/datatables/tool/modal/",
        //     columns: [
        //         {
        //             data: "code"
        //         },
        //         {
        //             data: "name"
        //         },
        //         {
        //             data: "Actions"
        //         }
        //     ],
        //     columnDefs: [
        //         {
        //             targets: -1,
        //             orderable: !1,
        //             render: function (a, e, t, n) {
        //                 return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-tool" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
        //             }
        //         },

        //     ]
        // })

        $('#tool_datatable').DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: '/datatables/tool/modal',
            columnDefs: [
                         {
                             targets: [ 0, 1, 2 ],
                             className: 'mdl-data-table__cell--non-numeric'
                         }
                     ],
            columns: [
                {data: 'code', name: 'code',sWidth:'45%'},
                {data: 'name', name: 'name',sWidth:'45%'},
                {data: '', name: '',sWidth:'10%',render:function(data, type, t){
                    return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-tool" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                }},
            ]
        });

        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#tool_datatable').DataTable().ajax.reload();
        });

        $('.dataTable').on('click', '.select-tool', function () {
            $.ajax({
                url: '/get-units/'+$(this).data('uuid'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('select[name="unit_tool"]').empty();

                    $('select[name="unit_tool"]').append(
                        '<option value=""> Select a Unit</option>'
                    );

                    $.each(data, function (key, value) {
                        $('select[name="unit_tool"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });

            let uuid = $(this).data('uuid');
            let code = $(this).data('code');
            let name = $(this).data('name');

            $('.input-tool-uuid').val(uuid);
            // document.getElementById('account_code').value = uuid;

            $('.search-tool').html(code + " - " + name);
            $('#modal_tool_search').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    ToolDatatables.init();
});
