let ItemDatatables = {
    init: function (urlDefectCard) {
        $('#defectcard_datatable').DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            processing: true,
            responsive: true,
            serverSide: true,
            deferLoading: 0,
            ajax: urlDefectCard,
            columnDefs: [
                         {
                             targets: [ 0, 1, 2 ],
                             className: 'mdl-data-table__cell--non-numeric'
                         }
                     ],
            columns: [
                {data: 'number', name: 'number',sWidth:'45%'},
                {data: 'quotation_number', quotation_number: 'name',sWidth:'45%'},
                {data: '', name: '',sWidth:'10%','searchable': false ,render:function(data, type, t){
                    return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-defectcard" title="View" data-uuid="' + t.uuid + '" data-number="' + t.number + '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                }},
            ]
        });

        // $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.defectcard_datatable_filter').addClass('pull-left');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#defectcard_datatable').DataTable().ajax.reload();
        });

        $('#defectcard_datatable_filter input').unbind();
        $('#defectcard_datatable_filter input').bind('keyup', function(e) {
            if (e.keyCode === 13) {
                let table = $('#defectcard_datatable').DataTable();
                table.search(this.value).draw();
            }
        });
        $('.dataTable').on('click', '.select-defectcard', function () {
            let uuid = $(this).data('uuid');
            let number = $(this).data('number');

            $('.input-defectcard-uuid').val(uuid);
            // document.getElementById('account_code').value = uuid;

            $('.search-defectcard').html(number);
            $('#modal_defectcard_search').modal('hide');
        });
    }
};

jQuery(document).ready(function () {
    if(typeof urlDefectCard === 'undefined'){
        urlDefectCard = "/datatables/defectcard/all";
        ItemDatatables.init(urlDefectCard);
    }else{
        ItemDatatables.init(urlDefectCard);
    }

});
