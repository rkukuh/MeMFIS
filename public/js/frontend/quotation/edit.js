

let Quotation = {
    init: function() {
            let exchange_rate_value = $('input[name=exchange]').val();

            $('select[name="currency"]').on('change', function() {
                let exchange_id = this.options[this.selectedIndex].innerHTML;
                let exchange_rate = $('input[name=exchange]');
                if(exchange_id === "Rupiah (Rp)"){
                    exchange_rate.val(1);
                    exchange_rate.attr("disabled",true);
                }else{
                    exchange_rate.attr("disabled",false);
                    if(exchange_rate_value){
                        exchange_rate.val(exchange_rate_value);
                    }
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

            let summary = $('.summary_datatable').mDatatable();

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
            data.append("term_and_condition", $('#term_and_condition').val());
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
