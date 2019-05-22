let DefectCard = {
  init: function () {
      $('.defectcard_datatable').mDatatable({
          data: {
              type: 'remote',
              source: {
                  read: {
                      method: 'GET',
                      url: '',
                      map: function (raw) {
                          let dataSet = raw;

                          if (typeof raw.data !== 'undefined') {
                              dataSet = raw.data;
                          }

                          return dataSet;
                      }
                  }
              },
              pageSize: 10,
              serverPaging: !0,
              serverFiltering: !0,
              serverSorting: !0
          },
          layout: {
              theme: 'default',
              class: '',
              scroll: false,
              footer: !1
          },
          sortable: !0,
          filterable: !1,
          pagination: !0,
          search: {
              input: $('#generalSearch')
          },
          toolbar: {
              items: {
                  pagination: {
                      pageSizeSelect: [5, 10, 20, 30, 50, 100]
                  }
              }
          },
          columns: [{
                  field: 'code',
                  title: 'No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                  }
              },
              {
                  field: 'name',
                  title: 'Date',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'Defect No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Discrepancy No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'JC No. Refrence',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Task Card No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Customer',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'A/C Type',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'A/C Reg',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'A/C Serial No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Skill',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Mhrs',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Status',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Create By',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'Actions',
                  sortable: !1,
                  overflow: 'visible',
                  template: function (t, e, i) {
                      return (
                          '<a href="/customer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                              '<i class="la la-pencil"></i>' +
                          '</a>' +
                          '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                          t.uuid +
                          ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                      );
                  }
              }
          ]
      });

      

      let remove = $('.defectcard_datatable').on('click', '.delete', function () {
          let triggerid = $(this).data('id');

          swal({
              title: 'Are you sure?',
              type: 'question',
              confirmButtonText: 'Yes, REMOVE',
              confirmButtonColor: '#d33',
              cancelButtonText: 'Cancel',
              showCancelButton: true,
          }).then(result => {
              if (result.value) {
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                              'content'
                          )
                      },
                      type: 'DELETE',
                      url: '/customer/' + triggerid + '',
                      success: function (data) {
                          toastr.success('Material has been deleted.', 'Deleted', {
                              timeOut: 5000
                          }
                      );
                      let table = $('.defectcard_datatable').mDatatable();

                          table.originalDataSet = [];
                          table.reload();
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

  }
};

jQuery(document).ready(function () {
  DefectCard.init();
});
