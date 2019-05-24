let Setting = {
  init: function () {
      $('.setting_datatable').mDatatable({
          data: {
              type: 'remote',
              source: {
                  read: {
                      method: 'GET',
                      url: '/datatables/unit',
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
                  field: 'name',
                  title: 'Name',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'symbol',
                  title: 'Symbol',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'type.name',
                  title: 'Type',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'Actions',
                  sortable: !1,
                  overflow: 'visible',
                  template: function (t, e, i) {
                      return (
                          '<button data-toggle="modal" data-target="#modal_unit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-unit" title="Edit" data-uuid=' +
                          t.uuid +
                          '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                          '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                          t.uuid +
                          ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                      );
                  }
              }
          ]
      });

      let unit_reset = function () {
          document.getElementById('name').value = '';
          document.getElementById('symbol').value = '';
          $('#type_id').select2('val', 'All');

          $('#symbol-error').html('');
          $('#name-error').html('');
          $('#type-error').html('');
      }

      $(document).ready(function () {
          $('.btn-success').removeClass('add');
      });

      let simpan = $('.modal-footer').on('click', '.add-unit', function () {
          let name = $('input[name=name]').val();
          let symbol = $('input[name=symbol]').val();
          let type_id =$('#type_id').val();

          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: '/unit',
              data: {
                  _token: $('input[name=_token]').val(),
                  name: name,
                  symbol: symbol,
                  type_id: type_id,
              },
              success: function (data) {
                  if (data.errors) {
                      if (data.errors.name) {
                          $('#name-error').html(data.errors.name[0]);

                      }
                      if (data.errors.symbol) {
                          $('#symbol-error').html(data.errors.symbol[0]);

                      }
                      if (data.errors.type) {
                          $('#type-error').html(data.errors.type[0]);

                      }

                  } else {
                      $('#modal_unit').modal('hide');

                      toastr.success('Unit has been created.', 'Success', {
                          timeOut: 5000
                      });

                      let table = $('.setting_datatable').mDatatable();

                      table.originalDataSet = [];
                      table.reload();
                  }
              }
          });
      });

      let edit = $('.setting_datatable').on('click', '.edit-unit', function edit () {
          save_changes_button();

          let triggerid = $(this).data('uuid');
          // alert(triggerid);
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: '/unit/' + triggerid + '/edit',
              success: function (data) {
                  document.getElementById('uuid').value = data.uuid;
                  document.getElementById('name').value = data.name;
                  document.getElementById('symbol').value = data.symbol;
                  $.ajax({
                      url: '/get-unit-types/',
                      type: 'GET',
                      dataType: 'json',
                      success: function (unit) {
                          $('select[name="type_id"]').empty();

                          $.each(unit, function (key, value) {
                              if(key == data.type_id){
                                  $('select[name="type_id"]').append(
                                      '<option value="' + key + '" selected>' + value + '</option>'
                                  );
                              }
                              else{
                                  $('select[name="type_id"]').append(
                                      '<option value="' + key + '">' + value + '</option>'
                                  );
                              }
                          });
                      }
                  });

                  $('.btn-success').addClass('update');
                  $('.btn-success').removeClass('add');
              },
              error: function (jqXhr, json, errorThrown) {
                  // this are default for ajax errors
                  let errorsHtml = '';
                  let errors = jqXhr.responseJSON;

                  $.each(errors.errors, function (index, value) {
                      $('#kategori-error').html(value);
                  });
              }
          });
      });

      let update = $('.modal-footer').on('click', '.update', function () {
          let name = $('input[name=name]').val();
          let symbol = $('input[name=symbol]').val();
          let type_id =$('#type_id').val();
          let triggerid = $('input[name=uuid]').val();

          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'put',
              url: '/unit/' + triggerid,
              data: {
                  _token: $('input[name=_token]').val(),
                  name: name,
                  symbol: symbol,
                  type_id: type_id
              },
              success: function (data) {
                  if (data.errors) {
                      if (data.errors.name) {
                          $('#name-error').html(data.errors.name[0]);

                      }
                      if (data.errors.symbol) {
                          $('#symbol-error').html(data.errors.symbol[0]);

                      }
                      if (data.errors.type) {
                          $('#type-error').html(data.errors.type[0]);

                      }

                  } else {
                      save_changes_button();
                      unit_reset();
                      $('#modal_unit').modal('hide');

                      toastr.success('Unit has been updated.', 'Success', {
                          timeOut: 5000
                      });

                      let table = $('.setting_datatable').mDatatable();

                      table.originalDataSet = [];
                      table.reload();
                  }
              }
          });
      });

      let close = $('.modal-footer').on('click', '.clse', function () {
          save_button();
          unit_reset();
      });

      $('.setting_datatable').on('click', '.delete', function () {
          let unit_uuid = $(this).data('uuid');

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
                      url: '/unit/' + unit_uuid + '',
                      success: function (data) {
                          toastr.success('Unit has been deleted.', 'Deleted', {
                                  timeOut: 5000
                              }
                          );

                          let table = $('.setting_datatable').mDatatable();

                          table.originalDataSet = [];
                          table.reload();
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
  Setting.init();
});
