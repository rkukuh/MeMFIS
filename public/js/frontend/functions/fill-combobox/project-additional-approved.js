$(document).ready(function () {
    projects = function () {
        $.ajax({
            url: '/get-project-additionals-approved',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="project-additional-approved"]').empty();

                $('select[name="project-additional-approved"]').append(
                    '<option value=""> Select a Project</option>'
                );

                $.each(data, function (key, value) {
                    $('select[name="project-additional-approved"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    projects();
});
