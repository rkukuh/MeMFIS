let Project = {
    init: function () {
        $('.add-project').on('click', function () {
            // $('#name-error').html('');
            // $('#simpan').text('Simpan');
            let registerForm = $('#CustomerForm');
            let customer =$('#customer').val();
            let project_title =$('#project_title').val();
            let work_order = $('input[name=work-order]').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let reg = $('input[name=reg]').val();
            let serial_number = $('input[name=serial-number]').val();
            let formData = registerForm.serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/project-hm',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: '1122',
                    customer_id: customer,
                    title: project_title,
                    no_wo: work_order,
                    aircraft_id: applicability_airplane,
                    aircraft_register: reg,
                    aircraft_sn: serial_number,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.customer_id) {
                            $('#customer-error').html(data.errors.customer_id[0]);
                        }
                        if (data.errors.aircraft_register) {
                            $('#reg-error').html(data.errors.aircraft_register[0]);
                        }
                        if (data.errors.aircraft_sn) {
                            $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                        }
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.no_wo) {
                            $('#work-order-error').html(data.errors.no_wo[0]);
                        }

                        document.getElementById('customer').value = data.getAll('customer_id');
                        document.getElementById('work-order').value = data.getAll('no_wo');
                        document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                        document.getElementById('reg').value = data.getAll('aircraft_register');
                        document.getElementById('serial-number').value = data.getAll('aircraft_sn');

                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });
                        window.location.href = '/project-hm/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};
$('select[name="customer"]').on('change', function () {
    let customer_uuid = this.options[this.selectedIndex];
    txt_name = $("#name");
    console.log(customer_uuid.value);
    txt_name.html(customer_uuid.text);

});
jQuery(document).ready(function () {
    Project.init();
});
