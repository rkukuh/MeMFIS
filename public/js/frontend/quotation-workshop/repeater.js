$("div.repeaterOtherCost").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyOtherCost").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyOtherCost hidden"); });
});

$("div.repeaterOtherCost").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterOtherCost > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});