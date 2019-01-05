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
                $('#recurrence').removeAttr("disabled");
                $('#recurrence-select').removeAttr("disabled");
                } else {
                    $('#recurrence').prop("disabled", true);
                    $('#recurrence-select').prop("disabled", true);
                }
            });
        });
        $(document).ready(function () {
            $('select[name="scheduled_priority_id"]').on('change', function () {
                let recurrence = $(this).val();
                if (recurrence == 71) {
                $('#prior_to_date').removeAttr("disabled");
                $('#prior_to_hours').removeAttr("disabled");
                $('#prior_to_cycle').removeAttr("disabled");
                } else {
                    $('#prior_to_date').prop("disabled", true);
                    $('#prior_to_hours').prop("disabled", true);
                    $('#prior_to_cycle').prop("disabled", true);
                }
            });
        });
        $(document).ready(function () {
            $('select[name="manual_affected_id"]').on('change', function () {
                let manual_affected = $(this).val();
                if (manual_affected == 64) {
                $('#note').removeAttr("disabled");
                } else {
                    $('#note').prop("disabled", true);
                }
            });
        });

        $(document).ready(function () {

            $('.btn-success').removeClass('add');

            document.getElementById('all').onchange = function () {
                document.getElementById('ac-type').disabled = !this.unchecked;

                if (document.getElementById("all").checked) {
                } else {
                    $('#ac-type').removeAttr("disabled");
                }
            };
        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });

        $('.footer').on('click', '.add-taskcard', function () {
            taskcard_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let description = $('#description').val();
            let threshold_amount = $('input[name=threshold_amount]').val();
            let repeat_amount = $('input[name=repeat_amount]').val();
            let source = $('input[name=source]').val();
            let effectifity = $('input[name=effectifity]').val();
            let otr_certification = $('#otr_certification').val();
            let threshold_type = $('#threshold_type').val();
            let repeat_type = $('#repeat_type').val();
            let taskcard = $('#taskcard').val();
            let zone = $('input[name=zone]').val();
            let access = $('input[name=access]').val();
            let applicability_airplane = $('input[name=applicability_airplane]').val();
            let applicability_engine = $('#applicability_engine').val();
            let work_area = $('#work_area').val();
            let relationship = $('#relationship').val();

            if ($('#aircraft_taskcard :selected').length > 0) {
                var aircraft_taskcards = [];

                $('#aircraft_taskcard :selected').each(function (i, selected) {
                    aircraft_taskcards[i] = $(selected).val();
                });
            }


            if (document.getElementById("is_applicability_engine_all").checked) {
                is_applicability_engine_all = 1;
            } else {
                is_applicability_engine_all = 0;
            }

            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     type: 'post',
            //     url: '/taskcard',
            //     data: {
            //         _token: $('input[name=_token]').val(),
            //         code: code,
            //         name: name,
            //         description: description,
            //         unit_id: unit,
            //         category: category,
            //         is_stock: is_stock,
            //         is_ppn: is_ppn,
            //         ppn_amount: ppn_amount,
            //         account_code: account_code,
            //     },
            //     success: function (data) {
            //         if (data.errors) {
            //             if (data.errors.title) {
            //                 $('#title-error').html(data.errors.title[0]);
            //             }

            //             if (data.errors.number) {
            //                 $('#number-error').html(data.errors.number[0]);
            //             }

            //             if (data.errors.taskcard) {
            //                 $('#taskcard-error').html(data.errors.taskcard[0]);
            //             }

            //             if (data.errors.otr_certification) {
            //                 $('#otr-certification-error').html(data.errors.otr_certification[0]);
            //             }

            //             if (data.errors.threshold_type) {
            //                 $('#threshold-type-error').html(data.errors.threshold_type[0]);
            //             }

            //             if (data.errors.threshold_amount) {
            //                 $('#threshold-amount-error').html(data.errors.threshold_amount[0]);
            //             }

            //             if (data.errors.repeat_type) {
            //                 $('#repeat-type-error').html(data.errors.repeat_type[0]);
            //             }

            //             if (data.errors.repeat_amount) {
            //                 $('#repeat-amount-error').html(data.errors.repeat_amount[0]);
            //             }

            //             if (data.errors.zone) {
            //                 $('#zone-error').html(data.errors.zone[0]);
            //             }

            //             if (data.errors.access) {
            //                 $('#access-error').html(data.errors.access[0]);
            //             }

            //             if (data.errors.applicability_airplane) {
            //                 $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
            //             }

            //             if (data.errors.applicability_engine) {
            //                 $('#applicability-engine-error').html(data.errors.applicability_engine[0]);
            //             }

            //             if (data.errors.work_area) {
            //                 $('#work-area-error').html(data.errors.work_area[0]);
            //             }


                        // document.getElementById('title').value = title;
                        // document.getElementById('number').value = number;
                        // document.getElementById('threshold_amount').value = threshold_amount;
                        // document.getElementById('repeat_amount').value = repeat_amount;
                        // document.getElementById('source').value = source;
                        // document.getElementById('effectifity').value = effectifity;
                        // document.getElementById('zone').value = zone;
                        // document.getElementById('access').value = access;
                        // document.getElementById('applicability_airplane').value = applicability_airplane;
                        // document.getElementById('description').value = description;

            //         } else {
                           taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/taskcard/1/edit';
            //         }
            //     }
            // });
        });

        // Category

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
