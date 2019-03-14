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
                if (this.options[this.selectedIndex].text == "Repetitive") {
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
                if (this.options[this.selectedIndex].text == "Prior to") {
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
                if (this.options[this.selectedIndex].text == "Other") {
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
            // taskcard_reset();
        });

        $('.footer').on('click', '.add-taskcard', function () {
            // taskcard_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let taskcard_non_routine_type = $('#taskcard_non_routine_type').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let revision = $('input[name=revision]').val();
            let relationship = $('#relationship').val();
            let description = $('#description').val();
            let scheduled_priority_id = $('#scheduled_priority_id').val();
            let recurrence_id = $('#recurrence_id').val();
            let category = $('#category').val();
            let manual_affected_id = $('#manual_affected_id').val();

            var prior_to = $('input[name="prior_to"]:checked').val();
            let scheduled_priority_amount = '';
            if(prior_to == 'date'){
                scheduled_priority_amount = $('#date').val();
            }
            else if (prior_to == 'hour'){
                scheduled_priority_amount = $('#hour').val();
            }
            else if(prior_to == 'cycle'){
                scheduled_priority_amount = $('#cycle').val();

            }

            let recurrence = $('input[name=recurrence]').val();
            let recurrence_select = $('#recurrence-select').val();
            let note = $('#note').val();

            let threshold_type = [];
            $('select[name^="threshold_type"]').each(function(i) {
                threshold_type[i] = $(this).val();
            });

            let repeat_type = [];
            $('select[name^="repeat_type"]').each(function(i) {
                repeat_type[i] = $(this).val();
            });

            let threshold_amount = [];
            $('input[name^="threshold_amount"]').each(function(i) {
                threshold_amount[i] = $(this).val();
            });

            let repeat_amount = [];
            $('input[name^="repeat_amount"]').each(function(i) {
                repeat_amount[i] = $(this).val();
            });
            
            // let task_type_id = $('#task_type_id').val();
            // let otr_certification = $('#otr_certification').val();
            // let manhour = $('input[name=manhour]').val();
            // let performa = $('input[name=performa]').val();
            // let helper_quantity = $('input[name=helper_quantity]').val();
            // let work_area = $('#work_area').val();
            // let access = $('#access').val();
            // let zone = $('#zone').val();
            // let source = $('input[name=source]').val();
            // let version = $('#version').val();
            // let effectivity = $('input[name=effectivity]').val();

            // if ($('#applicability_airplane :selected').length > 0) {
            //     var applicability_airplanes = [];

            //     $('#applicability_airplane :selected').each(function (i, selected) {
            //         applicability_airplanes[i] = $(selected).val();
            //     });
            // }




            // if (document.getElementById("is_applicability_engine_all").checked) {
            //     is_applicability_engine_all = 1;
            // } else {
            //     is_applicability_engine_all = 0;
            // }

            // if (document.getElementById("is_rii").checked) {
            //     is_rii = 1;
            // } else {
            //     is_rii = 0;
            // }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: title,
                    number: number,
                    type_id: taskcard_non_routine_type,
                    applicability_airplane: applicability_airplane,
                    category_id: category,
                    revision: revision,
                    relationship: relationship,
                    description: description,
                    scheduled_priority_id: scheduled_priority_id,
                    scheduled_priority_type: prior_to,
                    scheduled_priority_amount: scheduled_priority_amount,
                    recurrence_id: recurrence_id,
                    recurrence_amount:recurrence,
                    recurrence_type:recurrence_select,
                    manual_affected_id: manual_affected_id,
                    manual_affected: note,

                    threshold_amount: threshold_amount,
                    threshold_type: threshold_type,
                    repeat_amount: repeat_amount,
                    repeat_type: repeat_type,

                    // scheduled_priority_amount: prior_to_hour,
                    // scheduled_priority_amount: prior_to_cycle,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.taskcard) {
                            $('#taskcard-error').html(data.errors.taskcard[0]);
                        }

                        if (data.errors.otr_certification) {
                            $('#otr-certification-error').html(data.errors.otr_certification[0]);
                        }

                        if (data.errors.threshold_type) {
                            $('#threshold-type-error').html(data.errors.threshold_type[0]);
                        }

                        if (data.errors.threshold_amount) {
                            $('#threshold-amount-error').html(data.errors.threshold_amount[0]);
                        }

                        if (data.errors.repeat_type) {
                            $('#repeat-type-error').html(data.errors.repeat_type[0]);
                        }

                        if (data.errors.repeat_amount) {
                            $('#repeat-amount-error').html(data.errors.repeat_amount[0]);
                        }

                        if (data.errors.zone) {
                            $('#zone-error').html(data.errors.zone[0]);
                        }

                        if (data.errors.access) {
                            $('#access-error').html(data.errors.access[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.applicability_engine) {
                            $('#applicability-engine-error').html(data.errors.applicability_engine[0]);
                        }

                        if (data.errors.work_area) {
                            $('#work-area-error').html(data.errors.work_area[0]);
                        }

                        if (data.errors.revision) {
                            $('#revision-error').html(data.errors.revision[0]);
                        }

                        if (data.errors.taskcard_non_routine_type) {
                            $('#taskcard_non_routine_type-error').html(data.errors.taskcard_non_routine_type[0]);
                        }
                        
                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        if (data.errors.scheduled_priority_id) {
                            $('#scheduled_priority_id-error').html(data.errors.scheduled_priority_id[0]);
                        }

                        if (data.errors.recurrence_id) {
                            $('#recurrence_id-error').html(data.errors.recurrence_id[0]);
                        }

                        if (data.errors.manual_affected_id) {
                            $('#manual_affected_id-error').html(data.errors.manual_affected_id[0]);
                        }

                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('threshold_amount').value = threshold_amount;
                        document.getElementById('repeat_amount').value = repeat_amount;
                        document.getElementById('source').value = source;
                        document.getElementById('effectifity').value = effectifity;
                        document.getElementById('zone').value = zone;
                        document.getElementById('access').value = access;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('revision').value = revision;
                        document.getElementById('taskcard_non_routine_type').value = taskcard_non_routine_type;
                        document.getElementById('category').value = category;
                        document.getElementById('scheduled_priority_id').value = scheduled_priority_id;
                        document.getElementById('recurrence_id').value = recurrence_id;
                        document.getElementById('manual_affected_id').value = manual_affected_id;

                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/taskcard-eo/'+data.uuid+'/edit';
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
