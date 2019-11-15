let maxHours = minHours = 0;
let outSplitted = [];

$("#date").on("change", function(){
    let uuid = $("#uuid_employee").val();
    let date = $("#date").val();
    $.ajax({
        url: '/overtime/'+uuid+'/date/'+date,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if(data.out){
                outSplitted = data.out.split(":");
            }
            $("input[type=number][name=hours]").val(outSplitted[0]- 16);
            $("input[type=number][name=minutes]").val(outSplitted[1]- 30);
            $("input[type=number][name=second]").val(outSplitted[2]- 00);
            $('#end_time').timepicker({
                timeFormat: 'HH:mm:ss',
                minuteStep: 1,
                showSeconds: !1,
                showMeridian: !1,
                snapToStep: !0
            });
            $('#end_time').timepicker('setTime', data.out);
        }
    });

});

$(document).ready(function(){
    $('#start_time').timepicker({
        timeFormat: 'HH:mm:ss',
        defaultTime: "16:30:00",
        minuteStep: 1,
        showSeconds: !1,
        showMeridian: !1,
        snapToStep: !0,
        maxHours: 20,
    });
    $('#start_time').timepicker().on('hide.timepicker', function(e) {
        if(e.time.hours < 17){
            $('#start_time').timepicker('setTime', '16:30:00');
        }
      });
});
