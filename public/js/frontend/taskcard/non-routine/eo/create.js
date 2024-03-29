let TaskCard = {
    init: function () {
        $(document).ready(function () {

            $('#prior_to_date').on('click', function () {
                $('#date').removeAttr("disabled");
                $('#hour').prop("disabled", true);
                document.getElementById('hour').value = '';
                $('#cycle').prop("disabled", true);
                document.getElementById('cycle').value = '';
            });
            $('#prior_to_hours').on('click', function () {
                $('#hour').removeAttr("disabled");
                $('#date').prop("disabled", true);
                document.getElementById('date').value = '';
                $('#cycle').prop("disabled", true);
                document.getElementById('cycle').value = '';
            });
            $('#prior_to_cycle').on('click', function () {
                $('#cycle').removeAttr("disabled");
                $('#date').prop("disabled", true);
                document.getElementById('date').value = '';
                $('#hour').prop("disabled", true);
                document.getElementById('hour').value = '';
            });

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
            let applicability_airplane = [];
            let i = 0;
            $("#applicability_airplane").val().forEach(function(entry) {
                applicability_airplane[i] = entry;
                i++;
            });

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
            let internal_number = { internal_number: $('input[name=company_number]').val() };
            let internal_numberJSON = JSON.stringify(internal_number);

            let data = new FormData();
            data.append( "title", $('input[name=title]').val());
            data.append( "number", $('input[name=number]').val());
            data.append( "type_id", $('#taskcard_non_routine_type').val());
            data.append( "applicability_airplane", JSON.stringify($('#applicability_airplane').val()));
            data.append( "revision", $('input[name=revision]').val());
            data.append( "threshold_amount", JSON.stringify(threshold_amount));
            data.append( "reference", $('input[name=reference]').val());
            data.append( "description", $('#description').val());
            data.append( "scheduled_priority_id", $('#scheduled_priority_id').val());
            data.append( "scheduled_priority_type", $('input[name=prior_to]:checked').val());
            data.append( "document_library", JSON.stringify($('#document-library').val()));
            if($('input[name=prior_to]:checked').val() == 'date'){
                data.append( "scheduled_priority_text", $('#date').val());
            }
            else if ($('input[name=prior_to]:checked').val() == 'hour'){
                data.append( "scheduled_priority_text", $('#hour').val());
            }
            else if($('input[name=prior_to]:checked').val() == 'cycle'){
                data.append( "scheduled_priority_text", $('#cycle').val());
            }else{
                data.append("scheduled_priority_text", null);
            }
            data.append( "additionals",  internal_numberJSON);
            data.append( "recurrence_id", $('#recurrence_id').val());
            data.append( "recurrence_amount", $('input[name=recurrence]').val());
            data.append( "recurrence_type", $('#recurrence-select').val());
            data.append( "manual_affected_id", $('#manual_affected_id').val());
            data.append( "manual_affected_text", $('#note').val());
            data.append( "threshold_type", JSON.stringify(threshold_type));
            data.append( "repeat_type", JSON.stringify(repeat_type));
            data.append( "threshold_amount", JSON.stringify(threshold_amount));
            data.append( "repeat_amount", JSON.stringify(repeat_amount));
            data.append( "category_id", $('#category').val());
            data.append( "fileInput", document.getElementById('taskcard').files[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                url: '/taskcard-eo',
                success: function (response) {
                    if (response.errors) {
                        if (response.errors.title) {
                            $('#title-error').html(response.errors.title[0]);
                        }

                        if (response.errors.number) {
                            $('#number-error').html(response.errors.number[0]);
                        }

                        if (response.errors.taskcard) {
                            $('#taskcard-error').html(response.errors.taskcard[0]);
                        }

                        if (response.errors.otr_certification) {
                            $('#otr-certification-error').html(response.errors.otr_certification[0]);
                        }

                        if (response.errors.threshold_type) {
                            $('#threshold-type-error').html(response.errors.threshold_type[0]);
                        }

                        if (response.errors.threshold_amount) {
                            $('#threshold-amount-error').html(response.errors.threshold_amount[0]);
                        }

                        if (response.errors.repeat_type) {
                            $('#repeat-type-error').html(response.errors.repeat_type[0]);
                        }

                        if (response.errors.repeat_amount) {
                            $('#repeat-amount-error').html(response.errors.repeat_amount[0]);
                        }

                        if (response.errors.zone) {
                            $('#zone-error').html(response.errors.zone[0]);
                        }

                        if (response.errors.access) {
                            $('#access-error').html(response.errors.access[0]);
                        }

                        if (response.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(response.errors.applicability_airplane[0]);
                        }

                        if (response.errors.applicability_engine) {
                            $('#applicability-engine-error').html(response.errors.applicability_engine[0]);
                        }

                        if (response.errors.work_area) {
                            $('#work-area-error').html(response.errors.work_area[0]);
                        }

                        if (response.errors.revision) {
                            $('#revision-error').html(response.errors.revision[0]);
                        }

                        if (response.errors.taskcard_non_routine_type) {
                            $('#taskcard_non_routine_type-error').html(response.errors.taskcard_non_routine_type[0]);
                        }

                        if (response.errors.category) {
                            $('#category-error').html(response.errors.category[0]);
                        }

                        if (response.errors.scheduled_priority_id) {
                            $('#scheduled_priority_id-error').html(response.errors.scheduled_priority_id[0]);
                        }

                        if (response.errors.recurrence_id) {
                            $('#recurrence_id-error').html(response.errors.recurrence_id[0]);
                        }

                        if (response.errors.manual_affected_id) {
                            $('#manual_affected_id-error').html(response.errors.manual_affected_id[0]);
                        }

                        document.getElementById('title').value = data.getAll('title');
                        document.getElementById('number').value = data.getAll('number');
                        document.getElementById('threshold_amount').value = threshold_amount;
                        document.getElementById('repeat_amount').value = repeat_amount;
                        document.getElementById('source').value = source;
                        document.getElementById('effectifity').value = effectifity;
                        document.getElementById('zone').value = zone;
                        document.getElementById('access').value = access;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('revision').value = data.getAll('revision');
                        document.getElementById('taskcard_non_routine_type').value = taskcard_non_routine_type;
                        document.getElementById('category').value = category;
                        document.getElementById('scheduled_priority_id').value = scheduled_priority_id;
                        document.getElementById('recurrence_id').value = recurrence_id;
                        document.getElementById('manual_affected_id').value = manual_affected_id;
                        document.getElementById('description').value = data.getAll('description');
                        // file upload
                        document.getElementById('taskcard').value = taskcard;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/taskcard-eo/'+response.uuid+'/edit';
                    }
                },
                error: function (jqXhr, json, errorThrown) {
                    let errors = jqXhr.responseJSON;
                    $.each(errors.error, function (index, value) {
                            toastr.error(value.message, value.title, {
                                timeOut: 5000
                            }
                        );
                    });
                }
            });
        });

        // Category

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
