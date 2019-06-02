let Project = {
    init: function () {
        $('.add-project').on('click', function () {
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
                        window.location.href = '/project-hm/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};
$('select[name="customer"]').on('change', function () {
    let customer_uuid = this.options[this.selectedIndex].value;
    console.log(customer_uuid);
    $("#name").html(customer_uuid.text);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: "json",
        url: '/label/get-customer/'+customer_uuid,
        success: function (respone) {
            if (respone) {
                let res = JSON.parse(respone);
                    $('select[name="attention"]').empty();
                    $('select[name="phone"]').empty();
                    $('select[name="email"]').empty();
                    $('select[name="fax"]').empty();
                    $('select[name="address"]').empty();
                    for (var i = 0; i < res.length; i++) {
                        if(res[i].name){
                            $('select[name="attention"]').append(
                                '<option value="' + res[i].name + '">' + res[i].name + '</option>'
                            );
                        }
                        if(res[i].address){
                            $('select[name="attention"]').append(
                                '<option value="' + res[i].address + '">' + res[i].address + '</option>'
                            );
                        }
                        if(res[i].fax){
                            $('select[name="attention"]').append(
                                '<option value="' + res[i].fax + '">' + res[i].fax + '</option>'
                            );
                        }
                        if(res[i].phones){
                            $.each(res[i].phones, function (value) {
                                $('select[name="phone"]').append(
                                    '<option value="' + res[i].phones[value] + '">' + res[i].phones[value] + '</option>'
                                );
                            });
                        }
                        if(res[i].emails){
                            $.each(res[i].emails, function (value) {
                                $('select[name="email"]').append(
                                    '<option value="' + res[i].emails[value] + '">' + res[i].emails[value] + '</option>'
                                );
                            });
                        }
                }
            } else {
                console.log("empty");

            }

        }
    });
});
jQuery(document).ready(function () {
    Project.init();
});
