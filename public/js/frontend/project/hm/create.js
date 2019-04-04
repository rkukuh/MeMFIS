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
                type: 'post',
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
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
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
