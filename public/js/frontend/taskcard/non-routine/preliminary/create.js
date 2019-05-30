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

            var data = new FormData();
            data.append( "title", $('input[name=title]').val());
            data.append( "number", $('input[name=number]').val());
            data.append( "applicability_airplane", JSON.stringify($('#applicability_airplane').val()));
            data.append( "estimation_manhour", $('input[name=manhour]').val());
            data.append( "engineer_quantity", $('input[name=engineer_quantity]').val());
            data.append( "helper_quantity", $('input[name=helper_quantity]').val());
            data.append( "description", $('#instruction').val());

            $.ajax({
                url: '/get-takcard-preliminary-types',
                type: 'GET',
                dataType: 'json',
                success: function (type) {

                    $.each(type, function (key, value) {
                        if(value.trim() == 'Preliminary'.trim()){
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
                        url: '/preliminary',
                        data: data,
                        success: function (response) {
                            if (response.errors) {
                                if (response.errors.title) {
                                    $('#title-error').html(response.errors.title[0]);
                                }

                                if (response.errors.number) {
                                    $('#number-error').html(response.errors.number[0]);
                                }

                                if (response.errors.applicability_airplane) {
                                    $('#applicability-airplane-error').html(response.errors.applicability_airplane[0]);
                                }

                                if (response.errors.manhour) {
                                    $('#manhour-error').html(response.errors.manhour[0]);
                                }

                                if (response.errors.description) {
                                    $('#instruction-error').html(response.errors.description[0]);
                                }


                                document.getElementById('title').value = data.getAll('title');
                                document.getElementById('number').value = data.getAll('number');
                                document.getElementById('applicability_airplane').value = applicability_airplane;
                                $('#applicability_airplane').select2('val', 'All');
                                document.getElementById('work_area').value = work_area;
                                document.getElementById('manhour').value = data.getAll('manhour');
                                document.getElementById('helper_quantity').value = data.getAll('helper_quantity');
                                document.getElementById('engineer_quantity').value = data.getAll('engineer_quantity');
                                document.getElementById('instruction').value = data.getAll('instruction');

                            } else {
                                toastr.success('Taskcard has been created.', 'Success', {
                                    timeOut: 5000
                                });

                                window.location.href = '/preliminary/'+response.uuid+'/edit';
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
