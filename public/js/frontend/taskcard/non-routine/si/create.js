let TaskCard = {
    init: function () {

        $(document).ready(function () {

            $('.btn-success').removeClass('add');

        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });

        $('.footer').on('click', '.add-taskcard', function () {
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

            let applicability_airplane = [];
            let i = 0;
            $("#applicability_airplane").val().forEach(function(entry) {
                applicability_airplane[i] = entry;
                i++;
            });
            console.log(JSON.stringify(applicability_airplane));
            let internal_number = { internal_number: $('input[name=company_number]').val() };
            let internal_numberJSON = JSON.stringify(internal_number);

            var data = new FormData();
            data.append( "title", $('input[name=title]').val());
            data.append( "number", $('input[name=number]').val());
            data.append( "estimation_manhour", $('input[name=manhour]').val());
            data.append( "performance_factor", $('input[name=performa]').val());
            data.append( "helper_quantity", $('input[name=helper_quantity]').val());
            data.append( "engineer_quantity", $('input[name=engineer_quantity]').val());
            data.append( "description", $('#instruction').val());
            data.append( "work_area", $('#work_area').val());
            data.append( "applicability_airplane", JSON.stringify($('#applicability_airplane').val()));
            data.append( "skill_id", $('#otr_certification').val());
            data.append( "threshold_type", JSON.stringify(threshold_type));
            data.append( "repeat_type", JSON.stringify(repeat_type));
            data.append( "threshold_amount", JSON.stringify(threshold_amount));
            data.append( "repeat_amount", JSON.stringify(repeat_amount));
            data.append( "additionals",  internal_numberJSON);
            data.append( "fileInput", document.getElementById('taskcard').files[0]);

            $.ajax({
                url: '/get-takcard-si-types',
                type: 'GET',
                dataType: 'json',
                success: function (type) {

                    $.each(type, function (key, value) {
                        if(value.trim() == 'Special Instruction'.trim()){
                            data.append( "type_id", key);
                            // type_id = key;
                        }
                    });
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        processData: false,
                        contentType: false,
                        cache: false,
                        url: '/taskcard-si',
                        data: data,
                        success: function (response) {
                            if (response.errors) {
                                if (response.errors.title) {
                                    $('#title-error').html(response.errors.title[0]);
                                }

                                if (response.errors.number) {
                                    $('#number-error').html(response.errors.number[0]);
                                }

                                if (response.errors.skill_id) {
                                    $('#otr-certification-error').html(response.errors.skill_id[0]);
                                }

                                if (response.errors.applicability_airplane) {
                                    $('#applicability-airplane-error').html(response.errors.applicability_airplane[0]);
                                }

                                if (response.errors.estimation_manhour) {
                                    $('#manhour-error').html(response.errors.estimation_manhour[0]);
                                }

                                if (response.errors.performance_factor) {
                                    $('#performa-error').html(response.errors.performance_factor[0]);
                                }

                                if (response.errors.description) {
                                    $('#instruction-error').html(response.errors.description[0]);
                                }


                                document.getElementById('title').value = data.getAll('title');
                                document.getElementById('number').value = data.getAll('number');
                                document.getElementById('otr_certification').value = otr_certification;
                                document.getElementById('applicability_airplane').value = applicability_airplane;
                                $('#applicability_airplane').select2('val', 'All');
                                document.getElementById('work_area').value = work_area;
                                $('#work_area').select2('val', 'All');
                                document.getElementById('manhour').value = data.getAll('estimation_manhour');
                                document.getElementById('performa').value = data.getAll('performace_factor');
                                document.getElementById('helper_quantity').value = data.getAll('helper_quantity');
                                document.getElementById('engineer_quantity').value = data.getAll('engineer_quantity');
                                document.getElementById('instruction').value = data.getAll('instruction');

                            } else {
                                toastr.success('Taskcard has been created.', 'Success', {
                                    timeOut: 5000
                                });

                                window.location.href = '/taskcard-si/'+response.uuid+'/edit';
                            }
                        }
                    });


                }
            });




        });

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
