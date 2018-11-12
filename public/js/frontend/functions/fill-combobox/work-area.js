$(document).ready(function () {
    WorkArea = function () {
        $.ajax({
            url: '/get-work-areas/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="work_area"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="work_area"]').append(
                            '<option> Select a Work Area</option>'
                        );

                        index = 0;
                    }

                    $('select[name="work_area"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    WorkArea();
});
