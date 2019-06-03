
$("div.repeaterAttention").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterAttention").on("click", ".AddRow", function (event) {
    let newRow = $(".Copy").clone();
    $(this).closest(".repeaterRow").after(newRow);
    $('.select2multiple').select2();
    newRow.slideDown("slow", function () { newRow.removeClass("Copy hidden"); });
});

