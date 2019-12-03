let Item = {
    init: function () {


        $('#item_datatable').DataTable({
            "dom": '<"top"f>rt<"bottom">pil',
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: '/datatables/item',
            columnDefs: [
                         {
                             targets: [ 0, 1, 2 ],
                             className: 'mdl-data-table__cell--non-numeric'
                         }
                     ],
            columns: [
                {data: 'code', name: 'code',sWidth:'15%',render:function(data, type, row){
                    return "<a href='/item/"+ row.uuid +"'>" + row.code + "</a>"
                }},
                {data: 'name', name: 'name',sWidth:'15%'},
                {data: 'caterory', name: 'caterory',sWidth:'15%','searchable': false ,render:function(data, type, row){
                    // return row.categories[0].name //model
                    return row.category_name //query builder
                }},
                {data: 'unit.name', name: 'unit.name',sWidth:'10%','searchable': false ,render:function(data, type, row){
                    if (row.is_ppn === 1) {
                        return '<span class="m-badge m-badge--brand m-badge--wide">PPN: ' + row.ppn_amount + '%</span>'
                    }
                    else {
                        return '<span class="m-badge m-badge--warning m-badge--wide">No</span>'
                    }
                }},
                {data: 'unit.name', name: 'unit.name',sWidth:'10%','searchable': false ,render:function(data, type, row){
                    if (row.is_stock) {
                        var e = {
                            1: {
                                title: "Yes",
                                class: "m-badge--brand"
                            },
                            0: {
                                title: "No",
                                class: " m-badge--warning"
                            }
                        };

                        return '<span class="m-badge ' + e[row.is_stock].class + ' m-badge--wide">' + e[row.is_stock].title + "</span>"
                        }
                    return ''
                }},
                {data: 'name', name: 'name',sWidth:'15%','searchable': false },
                {data: '', name: '',sWidth:'10%','searchable': false ,render:function(data, type, row){
                    return (
                            '<a href="/item/' + row.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + row.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + row.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                }},
            ]
        });
        // $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');

        $('.dataTables_length select').addClass('form-control m-input');
        $('.dataTables_filter').addClass('pull-left');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-right');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('#item_datatable_filter input').unbind();
        $('#item_datatable_filter input').bind('keyup', function(e) {
            if (e.keyCode === 13) {
                let table = $('.item_datatable').DataTable();
                table.search(this.value).draw();

            }
        });

        $('.item_datatable').on('click', '.delete', function () {
            let item_uuid = $(this).data('id');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/item/' + item_uuid + '',
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_datatable').DataTable();

                            table.originalDataSet = [];
                            table.ajax.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
