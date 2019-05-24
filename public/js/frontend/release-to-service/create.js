
let ReleaseToService = {
    init: function () {
        let simpan = $('.footer').on('click', '.add-release-to-service', function () {

            let project_no = $('#project_no').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let date = $('#date').val();
            let aircraft_register = $('#aircraft_register').val();
            let work_performed = [];
            $.each($("input[name='work_performed[]']:checked"), function () {
                work_performed.push($(this).val());
            });
            let work_data = $('#work_data').val();
            let exceptions = $('#exceptions').val();


            let approval = [];
            $.each($("input[name='approval[]']:checked"), function () {
                approval.push($(this).val());
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/release-to-service',
                data: {
                    _token: $('input[name=_token]').val(),
                    project_no: project_no,
                    applicability_airplane: applicability_airplane,
                    date: date,
                    aircraft_register: aircraft_register,
                    work_performed:work_performed,
                    work_data: work_data,
                    exceptions:exceptions,
                    approval:approval,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        // }
                        // if (data.errors.payment_term) {
                        //     $('#payment_term-error').html(data.errors.payment_term[0]);
                        // }
                        // document.getElementById('name').value = name;
                        // document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};


jQuery(document).ready(function () {
    console.log('ready');
    ReleaseToService.init();
});
