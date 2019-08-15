// let  = {
  function Tool_Rouine(triggeruuid) {
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
                  data: "name"
              },
              {
                  data: "pivot.quantity"
              },
              {
                  data: "unit.name"
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
                        return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-item" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                  }
              },

          ]
      })

    //   $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

      $('.paging_simple_numbers').addClass('pull-left');
      $('.dataTables_length').addClass('pull-right');
      $('.dataTables_info').addClass('pull-left');
      $('.dataTables_info').addClass('margin-info');
      $('.paging_simple_numbers').addClass('padding-datatable');

      $('.dataTable').on('click', '.delete-item', function () {
        let triggeruuiditem = $(this).data('uuid');
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
                    url: '/taskcard-eo/eo-instruction/'+triggeruuid+'/'+triggeruuiditem + '/item',
                    success: function (data) {
                        toastr.success('Item has been deleted.', 'Deleted', {
                            timeOut: 5000
                        }
                    );

                    $('#m_datatable_item').DataTable().ajax.reload();

                    },
                    error: function (jqXhr, json, errorThrown) {
                        let errorsHtml = '';
                        let errors = jqXhr.responseJSON;

                        $.each(errors.errors, function (index, value) {
                            $('#delete-error').html(value);
                        });
                    }
                });
            }
        });
      });

      $('.item-body').on('click', '.item_modal', function () {
          $('#add_modal_material').modal('show');
      });

  };
// };

// jQuery(document).ready(function () {
//   EO_item.init();
// });
