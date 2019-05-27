let Customer = {
    init: function () {
        let simpan = $('.footer').on('click', '.add-customer', function () {

            let name = $('input[name=name]').val();
            let payment_term =  $('input[name=term_of_payment]').val();
            let account_code = $('#account_code').val();
            let level = $('#customer-level').val();

            let phone_array = [];
            $('#phone').each(function (i) {
                phone_array[i] = document.getElementsByName('group-phone[' + i + '][phone]')[0].value;
            });


            let ext_phone_array = [];
            $('#ext ').each(function (i) {
                ext_phone_array[i] = document.getElementsByName('group-phone[' + i + '][ext]')[0].value;
            });

            let type_phone_array = [];
            $('#phone ').each(function (i) {
                type_phone_array[i] = $('input[name="group-phone[' + i + '][type_phone]"]:checked').val();
            });


            let fax_array = [];
            $('#fax ').each(function (i) {
                fax_array[i] = document.getElementsByName('group-fax[' + i + '][fax]')[0].value;
            });

            let type_fax_array = [];
            $('#fax ').each(function (i) {
                type_fax_array[i] = $('input[name="group-fax[' + i + '][type_fax]"]:checked').val();
            });

            let website_array = [];
            $('#website ').each(function (i) {
                website_array[i] = document.getElementsByName('group-website[' + i + '][website]')[0].value;
            });

            let email_array = [];
            $('#email ').each(function (i) {
                email_array[i] = document.getElementsByName('group-email[' + i + '][email]')[0].value;
            });

            let type_email_array = [];
            $('#email ').each(function (i) {
                type_email_array[i] = $('input[name="group-email[' + i + '][type_email]"]:checked').val();
            });

            attentions = [];

            let attn_phone_array = [];
            $('#attn-phone ').each(function (i) {
                attn_phone_array[i] = document.getElementsByName('group-attn[' + i + '][attn-phone]')[0].value;
                console.log(attn_phone_array[i]);
            });

            let attn_position_array = [];
            $('#attn-position ').each(function (i) {
                attn_position_array[i] = document.getElementsByName('group-attn[' + i + '][attn-position]')[0].value;
            });

            let attn_name_array = [];
            $('#attn-name ').each(function (i) {
                attn_name_array[i] = document.getElementsByName('group-attn[' + i + '][attn-name]')[0].value;
            });

            let attn_ext_array = [];
            $('#attn-ext ').each(function (i) {
                attn_ext_array[i] = document.getElementsByName('group-attn[' + i + '][attn-ext]')[0].value;
            });

            let attn_fax_array = [];
            $('#attn-fax ').each(function (i) {
                attn_fax_array[i] = document.getElementsByName('group-attn[' + i + '][attn-fax]')[0].value;
            });

            let attn_email_array = [];
            $('#attn-email ').each(function (i) {
                attn_email_array[i] = document.getElementsByName('group-attn[' + i + '][attn-email]')[0].value;
            });

            // for (let index = 0; index < attn_name_array.length; index++) {
            //     let contact = [];

            //     contact["name"] = attn_name_array[index];
            //     contact["position"] = attn_position_array[index];
            //     contact["phone"] = attn_phone_array[index];
            //     contact["ext"] = attn_ext_array[index];
            //     contact["fax"] = attn_fax_array[index];
            //     contact["email"] = attn_email_array[index];
                
            //     attentions.push(contact);
            // }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/customer',
                // cache: false,
                // processData: false,
                // contentType: false,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    payment_term: payment_term,
                    account_code: account_code,
                    phone_array: phone_array,
                    ext_phone_array: ext_phone_array,
                    type_phone_array: type_phone_array,
                    fax_array: fax_array,
                    type_fax_array: type_fax_array,
                    website_array: website_array,
                    email_array: email_array,
                    type_email_array: type_email_array,
                    attn_phone_array:attn_phone_array,
                    attn_name_array:attn_name_array,
                    attn_position_array:attn_position_array,
                    attn_ext_array:attn_ext_array,
                    attn_fax_array:attn_fax_array,
                    attn_email_array:attn_email_array,
                    level:level,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.payment_term) {
                            $('#payment_term-error').html(data.errors.payment_term[0]);
                        }
                        document.getElementById('name').value = name;
                        document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        // window.location.href = '/customer/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Customer.init();
});
