let TaskCard = {
    init: function () {

        $(document).ready(function () {
            var autoExpand = function (field) {

                field.style.height = 'inherit';

                var computed = window.getComputedStyle(field);

                var height = parseInt(computed.getPropertyValue('border-top-width'), 10) +
                    parseInt(computed.getPropertyValue('padding-top'), 10) +
                    field.scrollHeight +
                    parseInt(computed.getPropertyValue('padding-bottom'), 10) +
                    parseInt(computed.getPropertyValue('border-bottom-width'), 10);

                field.style.height = height + 'px';

            };

            document.addEventListener('input', function (event) {
                if (event.target.tagName.toLowerCase() !== 'textarea') return;
                autoExpand(event.target);
            }, false);

            $('.btn-success').removeClass('add');
        });

        $('.footer').on('click', '.reset', function () {
            routine_reset();
        });

        $('#zone').on('select2:select', function (e) {
            var data = e.params.data;
        });

        $('.footer').on('click', '.add-taskcard', function () {

            let access = [];
            let i = 0;
            $("#access").val().forEach(function(entry) {
                access[i] = entry;
                i++;
            });

            let applicability_airplane = [];
            i = 0;
            $("#applicability_airplane").val().forEach(function(entry) {
                applicability_airplane[i] = entry;
                i++;
            });
            let zone = [];
            i = 0;
            $("#zone").val().forEach(function(entry) {
                zone[i] = entry;
                i++;
            });

            let relationship = [];
            i = 0;
            $("#relationship").val().forEach(function(entry) {
                relationship[i] = entry;
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

            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            let data = new FormData();
            data.append( "title", $('input[name=title]').val());
            data.append( "number", $('input[name=number]').val());
            data.append( "type_id", $('#taskcard_routine_type').val());
            data.append( "applicability_airplane", JSON.stringify(applicability_airplane));
            data.append( "task_id", $('#task_type_id').val());
            data.append( "skill_id", $('#otr_certification').val());
            data.append( "estimation_manhour", $('#manhour').val());
            data.append( "performance_factor", $('input[name=performa]').val());
            data.append( "helper_quantity", $('input[name=helper_quantity]').val());
            data.append( "engineer_quantity", $('input[name=engineer_quantity]').val());
            data.append( "work_area", $('#work_area').val());
            data.append( "access", JSON.stringify(access));
            data.append( "zone", JSON.stringify(zone));
            data.append( "source", $('input[name=source]').val());
            data.append( "relationship", JSON.stringify(relationship));
            data.append( "version", JSON.stringify($('#version').val()));
            data.append( "effectivity", $('input[name=effectivity]').val());
            data.append( "description", $('#description').val());
            data.append( "threshold_type", JSON.stringify(threshold_type));
            data.append( "repeat_type", JSON.stringify(repeat_type));
            data.append( "threshold_amount", JSON.stringify(threshold_amount));
            data.append( "repeat_amount", JSON.stringify(repeat_amount));
            data.append( "is_rii", is_rii);
            data.append( "fileInput", document.getElementById('taskcard').files[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.type_id) {
                            $('#taskcard_routine_type-error').html(data.errors.type_id[0]);
                        }

                        if (data.errors.skill_id) {
                            $('#otr-certification-error').html(data.errors.skill_id[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.task_id) {
                            $('#task_type_id-error').html(data.errors.task_id[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.performance_factor) {
                            $('#performa-error').html(data.errors.performance_factor[0]);
                        }
                       

                        document.getElementById('title').value = data.getAll('title');
                        document.getElementById('number').value = data.getAll('number');
                        document.getElementById('taskcard_routine_type').value = taskcard_routine_type;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        $('#applicability_airplane').select2('val', 'All');
                        document.getElementById('task_type_id').value = task_type_id;
                        document.getElementById('otr_certification').value = otr_certification;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('performa').value = performa;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('work_area').value = work_area;
                        $('#work_area').select2('val', 'All');
                        document.getElementById('access').value = access;
                        $('#access').select2('val', 'All');
                        document.getElementById('zone').value = zone;
                        $('#zone').select2('val', 'All');
                        document.getElementById('source').value = source;
                        document.getElementById('relationship').value = relationship;
                        $('#relationship').select2('val', 'All');
                        document.getElementById('version').value = version;
                        $('#version').select2('val', 'All');
                        document.getElementById('effectivity').value = effectivity;
                        document.getElementById('description').value = description;

                    } else {

                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/taskcard-routine/' + data.uuid + '/edit';
                    }
                }
            });
        });


    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
