let Project = {
    init: function () {
        $('.add-project').on('click', function () {
            let data = new FormData();
            data.append("title", $('#project_title').val());
            data.append("customer_id", $('#customer').val());
            data.append("no_wo", $('input[name=work-order]').val());
            data.append("aircraft_id", $('#applicability_airplane').val());
            data.append("aircraft_register", $('input[name=reg]').val());
            data.append("aircraft_sn", $('input[name=serial-number]').val());
            data.append("code", 'Dummy COde');
            data.append("fileInput", document.getElementById('work-order-attachment').files[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/project-hm',
                processData: false,
                contentType: false,
                cache: false,
                data:data,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.customer_id) {
                            $('#customer-error').html(data.errors.customer_id[0]);
                        }
                        if (data.errors.aircraft_register) {
                            $('#reg-error').html(data.errors.aircraft_register[0]);
                        }
                        if (data.errors.aircraft_sn) {
                            $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                        }
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.no_wo) {
                            $('#work-order-error').html(data.errors.no_wo[0]);
                        }

                        document.getElementById('customer').value = data.getAll('customer_id');
                        document.getElementById('work-order').value = data.getAll('no_wo');
                        document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                        document.getElementById('reg').value = data.getAll('aircraft_register');
                        document.getElementById('serial-number').value = data.getAll('aircraft_sn');

                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });
                        window.location.href = '/project-hm/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};
$('select[name="customer"]').on('change', function () {
    let customer_uuid = this.options[this.selectedIndex];
    let phone = $('#phone');
    let fax = $('#fax');
    let addresses = $('#address');
    let emails = $('#email');
    phone.empty();
    fax.empty();
    addresses.empty();
    emails.empty();
    let phoneNumber = "";
    console.log(phone);
    $("#name").html(customer_uuid.text);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: "json",
        url: '/label/get-customer/'+customer_uuid.value,
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
jQuery(document).ready(function () {
    Project.init();
});
