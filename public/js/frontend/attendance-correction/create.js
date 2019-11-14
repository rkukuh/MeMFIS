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
    let uuid = $("#uuid_employee").val();
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