let TaskCard = {
    init: function () {

        $(document).ready(function () {

            $('.btn-success').removeClass('add');

        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });

        $('.footer').on('click', '.add-taskcard', function () {
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let otr_certification = $('#otr_certification').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let work_area = $('#work_area').val();
            let manhour = $('input[name=manhour]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let engineer_quantity = $('input[name=engineer_quantity]').val();
            let performa = $('input[name=performa]').val();

            let instruction = $('#instruction').val();

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
                    type_id: '89', //ganti dengan input hidden didalam form
                    number: number,
                    work_area: work_area,
                    estimation_manhour: manhour,
                    performance_factor: performa,
                    helper_quantity: helper_quantity,
                    engineer_quantity: engineer_quantity,
                    description: instruction,

                    skill_id: otr_certification,
                    applicability_airplane: applicability_airplane,

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.skill_id) {
                            $('#otr-certification-skill_id').html(data.errors.skill_id[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability_airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.description) {
                            $('#instruction-error').html(data.errors.description[0]);
                        }


                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('skill_id').value = skill_id;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('work_area').value = work_area;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('instruction').value = instruction;

                    } else {
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
