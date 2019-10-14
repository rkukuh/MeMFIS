var MaterialTransferDaterangepicker = {
    init: function () {
        ! function () {
            $("#daterange_material_transfer").daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });
        }()
    }
};
jQuery(document).ready(function () {
    MaterialTransferDaterangepicker.init()
});
