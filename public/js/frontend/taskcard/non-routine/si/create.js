let TaskCard = {
    init: function () {

        $('#prior_to_date').on('click', function () {
            $('#date').removeAttr("disabled");
            $('#hour').prop("disabled", true);
            $('#cycle').prop("disabled", true);
        });
        $('#prior_to_hours').on('click', function () {
            $('#hour').removeAttr("disabled");
            $('#date').prop("disabled", true);
            $('#cycle').prop("disabled", true);
        });
        $('#prior_to_cycle').on('click', function () {
            $('#cycle').removeAttr("disabled");
            $('#date').prop("disabled", true);
            $('#hour').prop("disabled", true);
        });


        $(document).ready(function () {
            $('select[name="recurrence_id"]').on('change', function () {
                let recurrence = $(this).val();
                if (recurrence == 67) {
                $("#recurrence_div").removeClass("hidden");
                $('#recurrence').removeAttr("disabled");
                $('#recurrence-select').removeAttr("disabled");
                } else {
                    $("#recurrence_div").addClass("hidden");
                    $('#recurrence').prop("disabled", true);
                    $('#recurrence-select').prop("disabled", true);
                }
            });
        });
        $(document).ready(function () {
            $('select[name="scheduled_priority_id"]').on('change', function () {
                let recurrence = $(this).val();
                if (recurrence == 71) {
                $("#prior_to").removeClass("hidden");
                $('#prior_to_date').removeAttr("disabled");
                $('#prior_to_hours').removeAttr("disabled");
                $('#prior_to_cycle').removeAttr("disabled");
                } else {
                    $("#prior_to").addClass("hidden");
                    $('#prior_to_date').prop('checked', false);
                    $('#prior_to_date').prop("disabled", true);
                    $('#prior_to_hours').prop('checked', false);
                    $('#prior_to_hours').prop("disabled", true);
                    $('#prior_to_cycle').prop('checked', false);
                    $('#prior_to_cycle').prop("disabled", true);
                    $('#date').prop("disabled", true);
                    $('#hour').prop("disabled", true);
                    $('#cycle').prop("disabled", true);

                }
            });
        });
        $(document).ready(function () {
            $('select[name="manual_affected_id"]').on('change', function () {
                let manual_affected = $(this).val();
                if (manual_affected == 64) {
                $("#note_div").removeClass("hidden");
                $('#note').removeAttr("disabled");
                } else {
                    $('#note').prop("disabled", true);
                    $("#note_div").addClass("hidden");
                }
            });
        });

        $(document).ready(function () {

            $('.btn-success').removeClass('add');

        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });

        $('.footer').on('click', '.add-taskcard', function () {
            // taskcard_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let otr_certification = $('#otr_certification').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let work_area = $('#work_area').val();
            let manhour = $('input[name=manhour]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let description = $('#description').val();

            if ($('#applicability_airplane :selected').length > 0) {
                var applicability_airplanes = [];

                $('#applicability_airplane :selected').each(function (i, selected) {
                    applicability_airplanes[i] = $(selected).val();
                });
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-si',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: title,
                    type_id: '89',
                    number: number,
                    work_area: work_area,
                    manhour: manhour,
                    helper_quantity: helper_quantity,
                    description: description,

                    // otr_certification: otr_certification,
                    // applicability_airplane: applicability_airplane,

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.otr_certification) {
                            $('#otr-certification-error').html(data.errors.otr_certification[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability_airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);
                        }


                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('otr_certification').value = otr_certification;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('work_area').value = work_area;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('description').value = description;

                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/taskcard-si/'+data.uuid+'/edit';
                    }
                }
            });
        });

        // Category

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
