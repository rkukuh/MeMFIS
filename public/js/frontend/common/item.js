let ItemDatatables = {
    init: function (urlItem) {
        // $("#item_datatable").DataTable({
        //     "dom": '<"top"f>rt<"bottom">pl',
        //     responsive: !0,
        //     searchDelay: 500,
        //     processing: !0,
        //     serverSide: !0,
        //     lengthMenu: [5, 10, 25, 50 ],
        //     pageLength:5,
        //     ajax: url,
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
        //                 return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-item" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
        //             }
        //         },

        //     ]
        // })

        $('#item_datatable').DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            processing: true,
            responsive: true,
            serverSide: true,
            deferLoading: 0,
            ajax: urlItem,
            columnDefs: [
                         {
                             targets: [ 0, 1, 2 ],
                             className: 'mdl-data-table__cell--non-numeric'
                         }
                     ],
            columns: [
                {data: 'code', name: 'code',sWidth:'45%'},
                {data: 'name', name: 'name',sWidth:'45%'},
                {data: '', name: '',sWidth:'10%','searchable': false ,render:function(data, type, t){
                    return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-item" title="View" data-uuid="' + t.uuid + '" data-code="' + t.code + '" data-name="' + t.name + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                }},
            ]
        });

        // $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.item_datatable_filter').addClass('pull-left');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#item_datatable').DataTable().ajax.reload();
        });

        $('.dataTable').on('click', '.select-item', function () {
            $.ajax({
                url: '/get-units/'+$(this).data('uuid'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('select[name="unit_material"]').empty();

                    $('select[name="unit_material"]').append(
                        '<option value=""> Select a Unit</option>'
                    );

                    $.each(data, function (key, value) {
                        $('select[name="unit_material"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });

            let uuid = $(this).data('uuid');
            let code = $(this).data('code');
            let name = $(this).data('name');

            $('.input-item-uuid').val(uuid);
            // document.getElementById('account_code').value = uuid;

            $('.search-item').html(code + " - " + name);
            $('#modal_item_search').modal('hide');

            $('#item_datatable_filter input').unbind();
            $('#item_datatable_filter input').bind('keyup', function(e) {
                if (e.keyCode === 13) {
                    let table = $('#item_datatable').DataTable();
                    table.search(this.value).draw();
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    if(typeof urlItem === 'undefined'){
        urlItem = "/datatables/item/";
        ItemDatatables.init(urlItem);
    }else{
        ItemDatatables.init(urlItem);
    }

});
