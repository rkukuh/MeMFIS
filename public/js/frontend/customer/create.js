let Customer = {
    init: function () {
        let simpan = $('.footer').on('click', '.add-customer', function () {

            let name = $('input[name=name]').val();
            let payment_term =  $('input[name=term_of_payment]').val();
            let account_code = $('#account_code').val();

            let phone_array = [];
            $('#phone ').each(function (i) {
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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/customer',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    payment_term: payment_term,
                    account_code: account_code,
                    // phone_array: phone_array,
                    // ext_phone_array: ext_phone_array,
                    // type_phone_array: type_phone_array,
                    // fax_array: fax_array,
                    // type_fax_array: type_fax_array,
                    // website_array: website_array,
                    // email_array: email_array,
                    // type_email_array: type_email_array

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

                        window.location.href = '/customer/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Customer.init();
});
