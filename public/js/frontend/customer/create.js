let Customer = {
    init: function () {
        let simpan = $('.footer').on('click', '.add-customer', function () {

            let name = $('input[name=name]').val();
            let payment_term =  $('input[name=term_of_payment]').val();
            let account_code = $('#account_code').val();
            let level = $('select[name="customer-level"]').val();
            let ai = 0;

            let phone_array = [];
            $('input[name^=phone_array]').each(function (i) {
                phone_array[i] = $(this).val();
            });
            phone_array.pop();

            let ext_phone_array = [];
            $('#ext ').each(function (i) {
                ext_phone_array[i] = $(this).val();
            });
            ext_phone_array.pop();

            let type_phone_array = [];
            $('#type_phone ').each(function (i) {
                if($(this).is(':checked')){
                    type_phone_array[i] = $(this).val();
                }
            });

            type_phone_array = type_phone_array.filter(function (el) {

                return el != null && el != "";
        
            });

            let fax_array = [];
            $('#fax ').each(function (i) {
                fax_array[i] = $(this).val();
            });
            fax_array.pop();

            let type_fax_array = [];

            $('#type_fax ').each(function (i) {
                if($(this).is(':checked')){
                    type_fax_array[i] = $(this).val();
                }
            });

            type_fax_array = type_fax_array.filter(function (el) {

                return el != null && el != "";
        
            });

            let website_array = [];
            $('#website ').each(function (i) {
                website_array[i] = $(this).val();
            });
            website_array.pop();

            let type_website_array = [];
            $('select[name^=type_website]').each(function (i) {
                type_website_array[i] = $(this).val();
            });
            type_website_array.pop();

            let email_array = [];
            $('input[name^=email_array]').each(function (i) {
                email_array[i] = $(this).val();
            });
            email_array.pop();

            let type_email_array = [];
            $('#type_email ').each(function (i) {
                if($(this).is(':checked')){
                    type_email_array[i] = $(this).val();
                }
            });
            
            type_email_array = type_email_array.filter(function (el) {

                return el != null && el != "";
            
            });

            let document_array = [];
            $('#email ').each(function (i) {
                document_array[i] = $(this).val();
            });
            document_array.pop();

            let type_document_array = [];
            $('input[name^=type_document]').each(function (i) {
                type_document_array[i] = $(this).val();
            });
            type_document_array.pop();

            let attn_phone_array = [];
            $('select[name^=attn-phone]').each(function () {
                let attn_phone_array_row = [];
                ai = 0;
                $(this).val().forEach(function(entry) {
                    attn_phone_array_row[ai] = entry;
                    ai++;
                });
                attn_phone_array.push(attn_phone_array_row);
            });
            attn_phone_array.pop();

            let attn_position_array = [];
            $('#attn-position ').each(function (i) {
                attn_position_array[i] = $(this).val();
            });
            attn_position_array.pop();

            let attn_name_array = [];
            $('#attn-name ').each(function (i) {
                attn_name_array[i] = $(this).val();
            });
            attn_name_array.pop();

            let attn_fax_array = [];
            $('#attn-fax ').each(function (i) {
                attn_fax_array[i] = $(this).val();
            });
            attn_fax_array.pop();

            let attn_email_array = [];
            $('select[name^=attn-email]').each(function (i) {
                let attn_email_array_row = [];
                ai = 0;
                $(this).val().forEach(function(entry) {
                    attn_email_array_row[ai] = entry;
                   ai++;
               });
               attn_email_array.push(attn_email_array_row);
            });
            attn_email_array.pop();
            
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
                    type_website_array: type_website_array,
                    email_array: email_array,
                    type_email_array: type_email_array,
                    document_array: document_array,
                    type_document_array: type_document_array,
                    attn_phone_array:attn_phone_array,
                    attn_name_array:attn_name_array,
                    attn_position_array:attn_position_array,
                    attn_fax_array:attn_fax_array,
                    attn_email_array:attn_email_array,
                    level:level,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#level-error').html(data.errors.level[0]);

                        }

                        $.each(data.errors, function (key, value) {
                            var name = $("input[name='"+key+"']");
                            if(key.indexOf(".") != -1){
                              var arr = key.split(".");
                              name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                            }
                            name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                          });

                        document.getElementById('name').value = name;
                        document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Customer has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/customer/' + data.uuid + '/edit';
                        // window.location.href = '/customer';
          

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Customer.init();
});
