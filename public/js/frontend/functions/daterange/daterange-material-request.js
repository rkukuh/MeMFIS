var MaterialRequestDaterangepicker = {
    init: function () {
        ! function () {
            $("#daterange_material_request").daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });
        }()
    }
};
jQuery(document).ready(function () {
    MaterialRequestDaterangepicker.init()
});
