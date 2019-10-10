
var BootstrapTimepicker = {
    init: function() {
      $(".m_timepicker_1, .m_timepicker_1_modal").timepicker({
        minuteStep: 1,
        defaultTime: "",
        showSeconds: !0,
        showMeridian: !1,
        snapToStep: !0
      })
    }
};

jQuery(document).ready(function() {
    BootstrapTimepicker.init();
});