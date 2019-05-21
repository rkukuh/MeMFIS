

let Quotation = {
    init: function() {
            let exchange_rate_value = $('input[name=exchange]').val();

            $('select[name="currency"]').on('change', function() {
                let exchange_id = this.options[this.selectedIndex].innerHTML;
                let exchange_rate = $('input[name=exchange]');
                if(exchange_id === "Rupiah (Rp)"){
                    exchange_rate.val(1);
                    exchange_rate.attr("readonly",true);
                }else{
                    exchange_rate.val('');
                    exchange_rate.attr("readonly",false);
                }
            });

            let edit = $(".m_datatable").on("click", ".edit", function() {
            $("#button").show();
            $("#simpan").text("Perbarui");

            let triggerid = $(this).data("id");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/category/" + triggerid + "/edit",
                success: function(data) {
                    document.getElementById("id").value = data.id;
                    document.getElementById("name").value = data.name;

                    $(".btn-success").addClass("update");
                    $(".btn-success").removeClass("add");
                },
                error: function(jqXhr, json, errorThrown) {
                    let errorsHtml = "";
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function(index, value) {
                        $("#kategori-error").html(value);
                    });
                }
            });
        });

        let workpackage_datatables_init = true;
        $( document ).ready(function() {
            $.ajax({
                url: '/project/'+project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
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

        $('.nav-tabs').on('click', '.workpackage', function () {
            let workpackage = $('.workpackage_datatable').mDatatable();

            workpackage.originalDataSet = [];
            workpackage.reload();
        });

        $('.nav-tabs').on('click', '.summary', function () {

            let summary = $('.summary_datatable').mDatatable({
                // datasource definition
                data: {
                  type: 'remote',
                  source: {
                    read: {
                      method: 'GET',
                      url: '/datatables/quotation/' + quotation + '/job-request',
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
                  serverPaging: !1,
                  serverSorting: !1
          
                  //   saveState: false,
                  //   serverPaging: true,
                  //   serverFiltering: true,
                  //   serverSorting: true,
                },
                responsive: true,
                // column sorting
                sortable: true,
          
                pagination: true,
          
                toolbar: {
                  // toolbar items
                  items: {
                    // pagination
                    pagination: {
                      // page size select
                      pageSizeSelect: [10, 20, 30, 50, 100],
                    },
                  },
                },
          
                search: {
                  input: $('#generalSearch'),
                },
          
                rows: {
                  // auto hide columns, if rows overflow
                  //   autoHide: true,
                },
          
                // columns definition
                columns: [
                  {
                    field: 'code',
                    title: 'No',
                    width: '100px',
                  }, {
                    field: 'pivot.description',
                    title: 'Job Request Description',
                    width: '700px',
          
                    template: function (t) {
                      return (t.pivot.description + '<br>' +
                        '- Manhours Price : ' + t.pivot.manhour_total + ' x ' + t.pivot.manhour_rate + '<br>' +
                        '- Material Price'
                      );
                    }
                  }, {
                    field: 'ShipCity',
                    title: 'Cost',
                    template: function (a) {
                      total = total + a.pivot.manhour_total * a.pivot.manhour_rate + 138;
                      document.getElementById("sub_total").innerHTML = formatter.format(total);
                      return ('Cost<br>' +
                        formatter.format(a.pivot.manhour_total * a.pivot.manhour_rate) + '<br>' +
                        ' 138'
                      );
                    }
                  },
                  {
                    field: 'Currency',
                    title: 'Disc %',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                      return (
                        '<button data-toggle="modal" data-target="#discount" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                      );
                    }
                  },
                ],
              });

            summary.originalDataSet = [];
            summary.reload();

        });

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

        $('.footer').on('click', '.update-quotation', function() {
            let data = new FormData();
            data.append("project_id", $('#work-order').val());
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_of_payment", $('#term_of_payment').val());
            data.append("term_of_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
            data.append("scheduled_payment_amount", $('#scheduled_payment').val());
            data.append("total",0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation/'+quotation_uuid,
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

                        // window.location.href = '/quotation/' + response.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    Quotation.init();
});
