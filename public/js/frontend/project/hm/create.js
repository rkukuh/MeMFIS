let Project = {
    init: function () {
        $('.add-project').on('click', function () {
            console.log( $('#project_title').val());
            console.log( $('#customer').val());
            console.log( $('#applicability_airplane').val());
            let data = new FormData();
            data.append("title", $('#project_title').val());
            data.append("customer_id", $('#customer').val());
            data.append("no_wo", $('input[name=work-order]').val());
            data.append("aircraft_id", $('#applicability_airplane').val());
            data.append("aircraft_register", $('input[name=reg]').val());
            data.append("aircraft_sn", $('input[name=serial-number]').val());
            data.append("code", 'Dummy COde');
            data.append("fileInput", document.getElementById('work-order-attachment').files[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/project-hm',
                processData: false,
                contentType: false,
                cache: false,
                data:data,
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
                        // window.location.href = '/project-hm/'+data.uuid+'/edit';

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
