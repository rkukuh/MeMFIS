$(document).ready(function () {
    ApplicabilityEngine = function () {
        $.ajax({
            url: '/get-applicability-engines/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="applicability_engine"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="applicability_engine"]').append(
                            '<option> Select a Applicabiliy Engine</option>'
                        );

                        index = 0;
                    }

                    $('select[name="applicability_engine"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    ApplicabilityEngine();
});
