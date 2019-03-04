let Eo_tool = {
  init: function () {
      $("#m_datatable_journalll").DataTable({
          "dom": '<"top"f>rt<"bottom">pl',
          responsive: !0,
          searchDelay: 500,
          processing: !0,
          serverSide: !0,
          lengthMenu: [5, 10, 25, 50 ],
          pageLength:5,
          ajax: "/get-account-codes/",
          columns: [
              {
                  data: "code"
              },
              {
                  data: "name"
              },
              {
                  data: "Actions"
              },
              {
                  data: "name"
              }
          ],
          columnDefs: [
              {
                  targets: -1,
                  orderable: !1,
                  render: function (a, e, t, n) {
                    return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                  }
              },

          ]
      })

      $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span> </button>').appendTo('div.dataTables_filter');
      $('.paging_simple_numbers').addClass('pull-left');
      $('.dataTables_length').addClass('pull-right');
      $('.dataTables_info').addClass('pull-left');
      $('.dataTables_info').addClass('margin-info');
      $('.paging_simple_numbers').addClass('padding-datatable');

      // $('.dataTables_filter').on('click', '.refresh', function () {
      //     $('#m_datatable_journalll').DataTable().ajax.reload();
      // });

      $('.dataTable').on('click', '.select-account_code', function () {
          let uuid = $(this).data('uuid');
          let code = $(this).data('code');
          let name = $(this).data('name');

          document.getElementById('account_code').value = uuid;

          $('.search-journal').html(code + " - " + name);
          $('#modal_account_code').modal('hide');
      });
  }
};

jQuery(document).ready(function () {
  Eo_tool.init();
});
