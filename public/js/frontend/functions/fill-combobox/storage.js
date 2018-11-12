$(document).ready(function () {
    storage = function () {
        $.ajax({
            url: '/get-storages-combobox/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="item_storage_id"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="item_storage_id"]').append(
                            '<option> Select a Storage</option>'
                        );

                        index = 0;
                    }

                    $('select[name="item_storage_id"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    storage();
});
