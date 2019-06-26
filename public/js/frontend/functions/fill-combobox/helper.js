$(document).ready(function () {
    helper = function () {
        $.ajax({
            url: '/get-employees/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('select[name^="helper"]').empty();

                $('select[name^="helper"]').each(function(){
                        $(this).append('<option value=""> Select a Customer </option>');
                        $.each(data, function (key, value) {
                            $('select[name="helper"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        });
                    }
                );

                
            }
        });
    };

    helper();
});
