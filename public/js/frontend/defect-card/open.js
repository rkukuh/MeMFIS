let DefectCard = {
  init: function () {
      $('.defectcard_material_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: '/datatables/customer',
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
            serverFiltering: !1,
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
        columns: [
            {
                field: 'number',
                title: 'No',
                sortable: 'asc',
                filterable: !1,
                width: 150
            },
            {
                field: 'part_number',
                title: 'Part Number',
                sortable: 'asc',
                filterable: !1,
                width: 150,
            },
            {
                field: 'item_description',
                title: 'Item Description',
                sortable: 'asc',
                filterable: !1,
                width: 150,
            },
            {
                field: 'serial',
                title: 'Off',
                sortable: 'asc',
                filterable: !1,
                width: 80,
            },
            {
                field: 'serial',
                title: 'On',
                sortable: 'asc',
                filterable: !1,
                width: 80,
            },            
            {
              field: 'quantity',
              title: 'Qty',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },           
            {
              field: 'unit',
              title: 'Unit',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },         
            {
              field: 'ipc_ref',
              title: 'IPC Ref',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },
            {
              field: 'remark',
              title: 'Remark',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },                           
        ]
      });
      
      $('.defectcard_tool_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: '/datatables/customer',
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
            serverFiltering: !1,
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
        columns: [
            {
                field: 'number',
                title: 'No',
                sortable: 'asc',
                filterable: !1,
                width: 150
            },
            {
                field: 'part_number',
                title: 'Part Number',
                sortable: 'asc',
                filterable: !1,
                width: 150,
            },
            {
                field: 'item_description',
                title: 'Item Description',
                sortable: 'asc',
                filterable: !1,
                width: 150,
            },
            {
                field: 'serial',
                title: 'Off',
                sortable: 'asc',
                filterable: !1,
                width: 80,
            },
            {
                field: 'serial',
                title: 'On',
                sortable: 'asc',
                filterable: !1,
                width: 80,
            },            
            {
              field: 'quantity',
              title: 'Qty',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },           
            {
              field: 'unit',
              title: 'Unit',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },         
            {
              field: 'ipc_ref',
              title: 'IPC Ref',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },
            {
              field: 'remark',
              title: 'Remark',
              sortable: 'asc',
              filterable: !1,
              width: 150,
            },                           
        ]
      });

      let show = $('.m_datatable').on('click', '.show', function () {
          $('#button').hide();
          $('#simpan').text('Perbarui');

          let triggerid = $(this).data('id');

          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: '/category/' + triggerid,
              success: function (data) {
                  document.getElementById('TitleModalCustomer').innerHTML = 'Detail Customer #ID-' + triggerid;
                  document.getElementById('name').value = data.name;
                  document.getElementById('name').readOnly = true;
              },
              error: function (jqXhr, json, errorThrown) {
                  let errorsHtml = '';
                  let errors = jqXhr.responseJSON;

                  $.each(errors.errors, function (index, value) {
                      $('#kategori-error').html(value);
                  });
              }
          });
      });
  }
};

jQuery(document).ready(function () {
  DefectCard.init();
});
