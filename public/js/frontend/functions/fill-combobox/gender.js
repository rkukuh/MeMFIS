$(document).ready(function () {
    let getAll = true;
    if(typeof needAll !== 'undefined'){
        getAll = needAll;
    }
    
    Gender = function () {
        $.ajax({
            url: '/get-genders',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="gender"]').empty();

                $('select[name="gender"]').append(
                    '<option value=""> Select a Gender</option>'
                );

                $.each(data, function (key, value) {
                    if(getAll){
                        $('select[name="gender"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    }else{
                        if(value !== 'All'){
                            $('select[name="gender"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }
                    }
                    
                });
            }
        });
    };
    Gender();
});
