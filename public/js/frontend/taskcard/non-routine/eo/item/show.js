// let  = {
    function EO_item(triggeruuid) {
        $("#m_datatable_item").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50 ],
            pageLength:5,
            ajax: "/datatables/taskcard-eo/"+triggeruuid+"/materials",
            columns: [
                {
                  data: "code"
                },
                {
                    data: "name"
                },
                {
                    data: "pivot.quantity"
                },
                {
                    data: "pivot.unit"
                },
                {
                    data: "pivot.note"
                }
            ]
        })
  
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');
  
  
        $('.item-body').on('click', '.item_modal', function () {
            $('#add_modal_material').modal('show');
        });
  
    };
  // };
  
  // jQuery(document).ready(function () {
  //   EO_item.init();
  // });
  