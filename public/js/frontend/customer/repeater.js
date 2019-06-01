
$("div.repeaterDewe").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterDewe").on("click", ".AddRow", function (event) {
    let newRow = $(".Copy").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("Copy hidden"); });
});

