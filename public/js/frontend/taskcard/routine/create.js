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

        $('.footer').on('click', '.add-taskcard', function () {
            routine_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let taskcard_routine_type = $('#taskcard_routine_type').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let task_type_id = $('#task_type_id').val();
            let otr_certification = $('#otr_certification').val();
            let manhour = $('input[name=manhour]').val();
            let performa = $('input[name=performa]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let work_area = $('#work_area').val();
            let access = $('#access').val();
            let zone = $('#zone').val();
            let source = $('input[name=source]').val();
            let relationship = $('#relationship').val();
            let version = $('#version').val();
            let effectivity = $('input[name=effectivity]').val();
            let description = $('#description').val();


            if ($('#applicability_airplane :selected').length > 0) {
                let applicability_airplanes = [];

                $('#applicability_airplane :selected').each(function (i, selected) {
                    applicability_airplanes[i] = $(selected).val();
                });
            }


            if ($('#access :selected').length > 0) {
                let accesses = [];

                $('#access :selected').each(function (i, selected) {
                    accesses[i] = $(selected).val();
                });
            }


            if ($('#zone :selected').length > 0) {
                let zones = [];

                $('#zone :selected').each(function (i, selected) {
                    zones[i] = $(selected).val();
                });
            }


            if ($('#relationship :selected').length > 0) {
                let relationships = [];

                $('#relationship :selected').each(function (i, selected) {
                    relationships[i] = $(selected).val();
                });
            }


            if ($('#version :selected').length > 0) {
                let versions = [];

                $('#version :selected').each(function (i, selected) {
                    versions[i] = $(selected).val();
                });
            }


            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine',
                data: {
                    _token: $('input[name=_token]').val(),
                    number: number,
                    title: title,
                    type_id: taskcard_routine_type,
                    task_type_id: task_type_id,
                    work_area: work_area,
                    helper_quantity: helper_quantity,
                    is_rii: is_rii,
                    performance_factor: performa,
                    manhour: manhour,
                    description: description,
                    // version: version,
                    effectivity: effectivity,
                    source: source,

                    // applicability_airplane: applicability_airplane,
                    // otr_certification: otr_certification,
                    // access: access,
                    // zone: zone,
                    // relationship: relationship,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.taskcard_routine_type) {
                            $('#taskcard_routine_type-error').html(data.errors.taskcard_routine_type[0]);
                        }

                        if (data.errors.otr_certification) {
                            $('#otr-certification-error').html(data.errors.otr_certification[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.task_type_id) {
                            $('#task_type_id-error').html(data.errors.task_type_id[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.performa) {
                            $('#performa-error').html(data.errors.performa[0]);
                        }


                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('taskcard_routine_type').value = taskcard_routine_type;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('task_type_id').value = task_type_id;
                        document.getElementById('otr_certification').value = otr_certification;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('performa').value = performa;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('work_area').value = work_area;
                        document.getElementById('access').value = access;
                        document.getElementById('zone').value = zone;
                        document.getElementById('source').value = source;
                        document.getElementById('relationship').value = relationship;
                        document.getElementById('version').value = version;
                        document.getElementById('effectifity').value = effectifity;
                        document.getElementById('description').value = description;

                    } else {
                        routine_reset();


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
