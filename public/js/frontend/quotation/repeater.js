$("div.repeaterScheduledPayment").on("click", ".AddRow", function (event) {
    let newRow = $(".Copy").clone();
    $(this).closest(".repeaterRow").after(newRow);
    $('.select2multiple').select2();
    newRow.slideDown("swing", function () { newRow.removeClass("Copy hidden"); });
});

$("div.repeaterScheduledPayment").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("swing", function () { $(this).remove(); });
    }
});


