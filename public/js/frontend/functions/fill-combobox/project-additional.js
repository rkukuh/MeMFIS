$(document).ready(function () {
    projects = function () {
        $.ajax({
            url: '/get-project-additionals',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="project-additional"]').empty();

                // $('select[name="project-additional"]').append(
                //     '<option value=""> Select a Project</option>'
                // );

                $.each(data, function (key, value) {
                    $('select[name="project-additional"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    projects();
});
