var LeaveEntitlementDaterangepicker = {
    init: function () {
        ! function () {
            $("#daterange_leave_entitlement").daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });
        }()
    }
};
jQuery(document).ready(function () {
    LeaveEntitlementDaterangepicker.init()
});
