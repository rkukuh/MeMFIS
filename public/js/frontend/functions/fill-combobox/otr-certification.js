$(document).ready(function () {
    OtrCertification = function () {
        $.ajax({
            url: '/get-otr-certifications/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let index = 1;

                $('select[name="otr_certification"]').empty();

                $.each(data, function (key, value) {
                    if (index == 1) {
                        $('select[name="otr_certification"]').append(
                            '<option> Select a OTR Certification</option>'
                        );

                        index = 0;
                    }

                    $('select[name="otr_certification"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    OtrCertification();
});
