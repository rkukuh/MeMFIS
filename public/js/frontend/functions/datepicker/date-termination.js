let DateTermination = {
    init: function () {

        $("#date_termination").datetimepicker({
            format: "yyyy-mm-dd",
            todayHighlight: !0,
            autoclose: !0,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: "bottom-left"
        })
    }
};
jQuery(document).ready(function () {
    DateTermination.init();
});
