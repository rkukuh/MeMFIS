<div class="m-portlet m-portlet--mobile">
  <div class="m-portlet__body">
      <h1>Facility List</h1>
      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
          <div class="row align-items-center">
              <div class="col-xl-6 order-2 order-xl-1">
                  <div class="form-group m-form__group row align-items-center">
                      <div class="col-md-6">
                          <div class="m-input-icon m-input-icon--left">
                              <input type="text" class="form-control m-input" placeholder="Search..."
                                  id="generalSearch">
                              <span class="m-input-icon__icon m-input-icon__icon--left">
                                  <span><i class="la la-search"></i></span>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 order-1 order-xl-2 m--align-right">
                <div class="m-separator m-separator--dashed d-xl-none"></div>
              </div>
          </div>
      </div>

      <div class="facility_datatable" id="scrolling_both"></div>
  </div>
</div>
@include('frontend.quotation.facility.modal')

@push('footer-scripts')
<script>
    var DatatableDataLocalDemo = function () {
    //== Private functions

    // demo initializer
    var demo = function () {
        var dataJSONArray = JSON.parse('[{"facilityName":"Hangar Space","price":"US$ 1,000.00","note":"Eiusmod nisi enim esse elit deserunt sint ex ut est cillum in."},{"facilityName":"Office Space","price":"US$ 1,000.00","note":"Eiusmod nisi enim esse elit deserunt sint ex ut est cillum in."},{"facilityName":"Workshop A","price":"US$ 1,000.00","note":"Eiusmod nisi enim esse elit deserunt sint ex ut est cillum in."},{"facilityName":"Hangar Space 2","price":"US$ 1,000.00","note":"Eiusmod nisi enim esse elit deserunt sint ex ut est cillum in."},{"facilityName":"Hangar Office room","price":"US$ 1,000.00","note":"Eiusmod nisi enim esse elit deserunt sint ex ut est cillum in."}]');

        var datatable = $('.facility_datatable').mDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                read: {
                    method: 'GET',
                    url: '/datatables/quotation/' + quotation_uuid + '/workpackage/'+ workPackage_uuid +'/facilities',
                    map: function (raw) {
                    let dataSet = raw;
                    let total = subtotal = 0;
                    
                    if (typeof raw.data !== 'undefined') {
                        dataSet = raw.data;
                    }
                    console.log(dataSet);
                    return dataSet;
                    }
                }
                },
                pageSize: 10,
                serverPaging: !1,
                serverSorting: !1

            },

            // layout definition
            layout: {
                theme: 'default', // datatable theme
                class: '', // custom wrapper class
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: false // display/hide footer
            },

            responsive: true,

            // column sorting
            sortable: true,

            pagination: true,

            toolbar: {

            items: {

                    pagination: {

                    pageSizeSelect: [10, 20, 30, 50, 100],
                    },
                },
            },

            search: {
                input: $('#generalSearch')
            },

            rows: {


            },

            // inline and bactch editing(cooming soon)
            // editable: false,

            // columns definition
            columns: [{
                field: "facility.name",
                title: "Facility Name"
            }, {
                field: "price_amount",
                title: "Price",
            }, {
                field: "note",
                title: "Marketing Note",
            },{
                field: "Actions",
                width: 110,
                title: "Actions",
                sortable: false,
                overflow: 'visible',
                template: function (row, index, datatable) {
                    var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                    return (
                    '<button data-toggle="modal" data-target="#facility_price" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill facility_price" title="Tool" data-uuid=' +
                    row.uuid +
                    '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                  );
                }
            }]
        });

        $('#m_form_status').on('change', function () {
            datatable.search($(this).val(), 'Status');
        });

        $('#m_form_type').on('change', function () {
            datatable.search($(this).val(), 'Type');
        });

        $('#m_form_status, #m_form_type').selectpicker();

        let edit = $('.facility_datatable').on('click', '.facility_price', function edit () {
            save_changes_button();

            let triggerid = $(this).data('uuid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/aircraft/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('code').value = data.code;
                    $.ajax({
                        url: '/get-manufacturers/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (manufacturer) {
                            $('select[name="manufacturer_id"]').empty();

                            $.each(manufacturer, function (key, value) {
                                if(key == data.manufacturer_id){
                                    $('select[name="manufacturer_id"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="manufacturer_id"]').append(
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
                        $('#aircraft-error').html(value);
                    });
                }
            });
        });

    };

    return {
        //== Public functions
        init: function () {
            // init dmeo
            demo();
        }
    };
}();

jQuery(document).ready(function () {
    DatatableDataLocalDemo.init();
});
</script>]
@endpush