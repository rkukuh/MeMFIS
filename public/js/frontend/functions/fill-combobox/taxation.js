$(document).ready(function () {
    taxation = function () {
        $.ajax({
            url: '/get-taxation-types/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="taxation"]').empty();

                $.each(data, function (key, value) {
                    if(value == "No Taxation"){
                        $('select[name="taxation"]').prepend(new Option(value, key, true));
                    }else{
                        $('select[name="taxation"]').append(new Option(value, key));
                    }
                });
            }
        });
    };

    taxation();
});
