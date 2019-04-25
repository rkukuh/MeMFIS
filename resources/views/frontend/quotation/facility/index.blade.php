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
                type: 'local',
                source: dataJSONArray,
                pageSize: 10
            },

            // layout definition
            layout: {
                theme: 'default', // datatable theme
                class: '', // custom wrapper class
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: false // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#generalSearch')
            },

            // inline and bactch editing(cooming soon)
            // editable: false,

            // columns definition
            columns: [{
                field: "facilityName",
                title: "Facility Name"
            }, {
                field: "price",
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

                    return '\
                        <div class="dropdown ' + dropup + '">\
                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
                              <div class="dropdown-menu dropdown-menu-right">\
                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
                              </div>\
                        </div>\
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                            <i class="la la-edit"></i>\
                        </a>\
                    ';
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