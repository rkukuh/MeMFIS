$(document).ready(function(){
    let correctionType = "check-in";

    $('#time_correction').timepicker({
        timeFormat: 'HH:mm:ss',
        minuteStep: 1,
        showSeconds: !1,
        showMeridian: !1,
        snapToStep: !0
    });
    
    $("#date").on("change", function(){
        getAttendanceDate();
    });
    
    $("#attendance_correction_time_type").on("change", function(){
        getAttendanceDate();
    });
    
    $(".select-employee").on("click", function() {
        alert("selected");
    })
    
    function getAttendanceDate(){
        let uuid = $("#search-employee-val").val();
        let date = $("#date").val();
        $.ajax({
            url: '/overtime/'+uuid+'/date/'+date,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                correctionType = $("#attendance_correction_time_type").val();
                if ( correctionType == "check-in" ){
                    $('#time_correction').timepicker('setTime', data.in);
                }else{
                    $('#time_correction').timepicker('setTime', data.out);
                }
            }
        });
    };

    $('#edit-attendance-correction').on('click', function() {
        mApp.block(".action-buttons");

        let attendance_correction_time_type = $('#attendance_correction_time_type').val();
        let date = $('#date').val();
        let employee_uuid = $('#search-employee-val').val();
        let time = $('#time').val();
        let description = $('#description').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
                attendance_correction_time_type: attendance_correction_time_type,
                correction_date: date,
                employee_uuid: employee_uuid,
                correction_time: time,
                description: description,

            },
            success: function (data) {
                if (data.errors) {
                    // if (data.errors.item_id) {
                    //     $('#material-error').html(data.errors.item_id[0]);
                    // }

                    // if (data.errors.quantity) {
                    //     $('#quantity_item-error').html(data.errors.quantity[0]);
                    // }

                    // if (data.errors.unit_id) {
                    //     $('#unit_material-error').html(data.errors.unit_id[0]);
                    // }

                    // document.getElementById('quantity').value = quantity;

                } else {

                    toastr.success('Attendance correction has been updated.', 'Success', {
                        timeOut: 5000
                    });
                }
            }
        });
        mApp.unblock(".action-buttons");
    });
});
