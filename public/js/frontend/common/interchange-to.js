let IntrechangeTo = {
  init: function () {
      $("#interchange_datatable").DataTable({
          "dom": '<"top"f>rt<"bottom">pl',
          responsive: !0,
          searchDelay: 500,
          processing: !0,
          serverSide: !0,
          lengthMenu: [5, 10, 25, 50 ],
          pageLength:5,
          ajax: "/datatables/purchase-request/modal",
          columns: [
              {
                  data: "number"
              },
              {
                  data: "type.name"
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
                      return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-purchase-request" title="View" data-uuid="' + t.uuid + '" data-number="' + t.number + '" >\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
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

      let item_datatables_init = true;

      $('.dataTable').on('click', '.select-purchase-request', function () {
          let uuid = $(this).data('uuid');

          let number = $(this).data('number');

          document.getElementById('ref-pr').value = uuid;
          $('.search-interchange').html(number);
          $('#modal_interchange').modal('hide');


          if(item_datatables_init == true){
              item_datatables_init = false;
              item(uuid);
          }
          else{
              let table = $('.item_datatable').mDatatable();
              table.destroy();
              item(uuid);
              table = $('.item_datatable').mDatatable();
              table.originalDataSet = [];
              table.reload();
          }
      });
  }
};

jQuery(document).ready(function () {
  IntrechangeTo.init();
});
