let Quotation = {
    init: function() {

        $(document).ready(function () {
            
        });
        
        let workpackage_datatables_init = true;

        $('select[name="work-order"]').on('change', function() {
            let project_id = this.options[this.selectedIndex].value;
            $.ajax({
                url: '/project/'+project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#project_number').html(data.title);
                    $('#name').html(data.customer.name);
                    $('#customer_id').val(data.customer.uuid);
                    
                    if(workpackage_datatables_init == true){
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else{
                        let table = $('.workpackage_datatable').mDatatable();
                        table.destroy();
                        workpackage(data.uuid);
                        table = $('.workpackage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

            let customer_uuid = $('#customer_id')[0].value;
            let phone = $('#phone');
            let fax = $('#fax');
            let addresses = $('#address');
            let emails = $('#email');
            // emptying options
            phone.empty();
            fax.empty();
            addresses.empty();
            emails.empty();
            let phoneNumber = "";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: "json",
                url: '/label/get-customer/'+customer_uuid,
                success: function (data) {
                    // adding customer phones  option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.phones)){
                        console.log('empty phones');
                    }else{
                        console.log('get the phones data');
                        $.each( data.phones, function( key, value ) {
                            if(value.ext === null){
                                phoneNumber = value.number;
                            }else{
                                phoneNumber = value.number+' Ext. '+value.ext;
                            }
                            let phoneNumberOption = new Option(phoneNumber,value.uuid);
                            phone.append(phoneNumberOption);
                        });
                    }
        
                    // adding customer faxes  option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.faxes)){
                        console.log('empty faxes');
                    }else{
                        console.log('get the faxes data');
                        $.each( data.faxes, function( key, value ) {
                            let faxNumberOption = new Option( value.number,value.uuid);
                            fax.append(faxNumberOption);
                        });
                    }
        
                    // Adding customer addresses option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.addresses)){
                        console.log('empty addresses');
                    }else{
                        console.log('get the addresses data');
                        $.each( data.addresses, function( key, value ) {
                            let addressesOption = new Option( value.address,value.uuid);
                            addresses.append(addressesOption);
                        });
                    }
        
                    // Adding customer emails option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.emails)){
                        console.log('empty emails');
                    }else{
                        console.log('get the emails data');
                        $.each( data.emails, function( key, value ) {
                            let emailsOption = new Option( value.address,value.uuid);
                            emails.append(emailsOption);
                        });
                    }
                }
            });
        });

        $('.action-buttons').on('click', '.add-quotation', function() {
            let data = new FormData();
            data.append("project_id", $('#work-order').val());
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_and_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
            data.append("scheduled_payment_amount", $('#scheduled_payment').val());
            data.append("total",0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());


            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation',
                processData: false,
                contentType: false,
                data:data,
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.currency_id) {
                            $("#currency-error").html(data.errors.currency_id[0]);
                        }
                        if (data.errors.customer_id) {
                            $("#customer_id-error").html(data.errors.customer_id[0]);
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                        }
                        if (data.errors.exchange_rate) {
                            $("#exchange-error").html(data.errors.exchange_rate[0]);
                        }
                        if (data.errors.project_id) {
                            $("#work-order-error").html(data.errors.project_id[0]);
                        }
                        if (data.errors.requested_at) {
                            $("#requested_at-error").html(data.errors.requested_at[0]);
                        }
                        if (data.errors.scheduled_payment_amount) {
                            $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
                        }
                        if (data.errors.scheduled_payment_type) {
                            $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
                        }
                        if (data.errors.valid_until) {
                            $("#valid_until-error").html(data.errors.valid_until[0]);
                        }

                        document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/quotation/' + response.uuid + '/edit';


                    }
                }
            });
        });

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
    }
};

jQuery(document).ready(function() {
    Quotation.init();
});
