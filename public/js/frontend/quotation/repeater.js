$("div.repeaterScheduledPayment").on("click", ".AddRow", function (event) {
    let newRow = $(".Copy").clone();
    $(this).closest(".repeaterRow").after(newRow);
    $('.select2multiple').select2();
    newRow.slideDown("swing", function () { newRow.removeClass("Copy hidden"); });
    let type = $('#scheduled_payment_type').children("option:selected").html();
    if (type === "By Date") {
        $.each($('#scheduled_payment '), function () {
            $(this).addClass("scheduledPayment");
            $(this).datetimepicker({
                format: "yyyy-mm-dd",
                todayHighlight: !0,
                autoclose: !0,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: "bottom-left"
            });
        });
    } else {
        $.each($('#scheduled_payment '), function () {
            $(this).removeClass("scheduledPayment");
            $(this).datetimepicker("remove");
        });
    }
});

$("div.repeaterScheduledPayment").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterScheduledPayment > div.repeaterRow").length;
    if (counter > 2) {
        $(this).closest(".repeaterRow").slideUp("swing", function () { $(this).remove(); });
    }
});

$("div.repeaterChargeTypes").on("click", ".AddRow", function (event) {
    let newRow = $(".copyChargeTypes").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () {
         newRow.removeClass("copyChargeTypes hidden"); 
         });
    newRow.find("select[name=charge_type]").addClass("charge_type");
    newRow.find("select[name=charge_type]").each(function() {
        $(this).select2({
            placeholder: 'Select Extra Charge Type',
        });
    });
});

$("div.repeaterChargeTypes").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterChargeTypes > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});
