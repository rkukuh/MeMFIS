let ScheduledPaymentTypeSelect2 = {
    init: function () {
        $('#scheduled_payment_type, #scheduled_payment_type_validate').select2({
            placeholder: 'Select a Type'
        });
    }
};

jQuery(document).ready(function () {
    ScheduledPaymentTypeSelect2.init();
});

$(document).ready(function () {
    units = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="unit_id"]').empty();

                $('select[name="unit_id"]').append(
                    '<option> Select a Unit</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="unit_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units();
});
