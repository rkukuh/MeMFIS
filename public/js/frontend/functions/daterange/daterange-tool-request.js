var ToolRequestDaterangepicker = {
    init: function () {
        ! function () {
            $("#daterange_tool_request").daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });
        }()
    }
};
jQuery(document).ready(function () {
    ToolRequestDaterangepicker.init()
});
