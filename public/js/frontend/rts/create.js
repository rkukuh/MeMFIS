
let ReleaseToService = {
    init: function () {
        $('#project').on('change', function(){
            let project_id = this.options[this.selectedIndex].value;
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: "json",
                url: '/label/get-project/'+project_id,
                success: function (response) {
                    if (response) {
                        // Note: change select2 selected option by jquery
                        $('#applicability_airplane  option[value='+response.aircraft_id+']').attr('selected','selected');
                        $('#applicability_airplane').select2().trigger('change');
                        $('#aircraft_register').empty();
                        $('#aircraft_register').val(response.aircraft_register);
                        $("#date").datetimepicker().datetimepicker("setDate", new Date());
                        if(response.quotations[0]){
                            $('#work_performed').empty();
                            $('#work_performed').val(response.quotations[0].title);
                        }
                    } else {
                        console.log("empty");
                    }

                }
            });
        });

        let simpan = $('.footer').on('click', '.add-rts', function () {

            let project_id = $('#project').val();
            let date = $('#date').val();
            let total_time = $('#total_time').val();
            let work_performed = $('#work_performed').val();
            let work_performed_addtional = $('#work_performed_addtional').val();
            // let work_performed = [];
            // $.each($("input[name='work_performed']"), function () {
            //     work_performed.push($(this).val());
            // });
            let work_data = $('#work_data').val();
            let exceptions = $('#exceptions').val();

            let approval = [];
            $.each($("input[name='approval[]']:checked"), function () {
                approval.push($(this).val());
            });
            // let approval;
            // if (document.getElementById("is_rii").checked) {
            //     approval = 1;
            // } else {
            //     approval = 0;
            // }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/rts/'+project_uuid+'/project',
                data: {
                    _token: $('input[name=_token]').val(),
                    project_id: project_id,
                    // date: date,
                    aircraft_total_time:total_time,
                    work_performed:work_performed,
                    work_performed_addtional:work_performed_addtional,
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

                        window.location.href = '/rts/' + data.uuid + '/print';

                    }
                }
            });
        });
    }
};


jQuery(document).ready(function () {
    ReleaseToService.init();
});
