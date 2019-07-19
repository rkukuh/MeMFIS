// let EO_tool = {
  function jobcard_tool(triggeruuid2) {
      $("#m_datatable_tool").DataTable({
          "dom": '<"top"f>rt<"bottom">pl',
          responsive: !0,
          searchDelay: 500,
          processing: !0,
          serverSide: !0,
          lengthMenu: [5, 10, 25, 50 ],
          pageLength:5,
          ajax: "/datatables/jobcard/"+triggeruuid2+"/tools",
          columns: [
              {
                  data: "name"
              },
              {
                  data: "pivot.quantity"
              },
              {
                  data: "unit_name"
              },
          ],

      })

      $('.paging_simple_numbers').addClass('pull-left');
      $('.dataTables_length').addClass('pull-right');
      $('.dataTables_info').addClass('pull-left');
      $('.dataTables_info').addClass('margin-info');
      $('.paging_simple_numbers').addClass('padding-datatable');

      // $('.dataTables_filter').on('click', '.refresh', function () {
      //     $('#m_datatable_journalll').DataTable().ajax.reload();
      // });




    $('.tool-body').on('click', '.item_modal', function () {
        $('#add_modal_tool').modal('show');
    });


  };
// };

// jQuery(document).ready(function () {
//   Eo_tool.init();
// });
