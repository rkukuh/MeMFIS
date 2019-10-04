var InventoryInDaterangepicker = {
    init: function () {
        ! function () {
            $("#daterange_inventory_in").daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });
        }()
    }
};
jQuery(document).ready(function () {
    InventoryInDaterangepicker.init()
});
