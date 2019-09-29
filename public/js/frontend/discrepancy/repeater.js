$("div.repeaterHelper").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyHelper").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyHelper hidden"); });
    let counter = 1;
    newRow.find("select[name=helper]").addClass("helper");
    $(".helper").each(function() {
        $(this).select2();
        console.log($(this));
    });
});

$("div.repeaterHelper").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterHelper > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});