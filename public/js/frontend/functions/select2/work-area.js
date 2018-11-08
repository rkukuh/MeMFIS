let WorkAreaSelect2 = {
    init: function () {
        $('#work_area, #work_area_validate').select2({
            placeholder: 'Select a Work Area'
        });
    }
};

jQuery(document).ready(function () {
    WorkAreaSelect2.init();
});

$(document).ready(function () {
    WorkArea = function () {
        $.ajax({
            url: '/get-categories-item/',
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
