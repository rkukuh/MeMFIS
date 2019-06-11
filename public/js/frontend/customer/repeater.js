$("div.repeaterAttention").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyAttention").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyAttention hidden"); });
});

$("div.repeaterAttention").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterAttention > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterPhone").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyPhone").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyPhone hidden"); });
});

$("div.repeaterPhone").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterPhone > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterFax").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyFax").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyFax hidden"); });
});

$("div.repeaterFax").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterFax > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterWebsite").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyWebsite").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { 
        $('.select').select2();
        newRow.removeClass("CopyWebsite hidden"); 
        });
});

$("div.repeaterWebsite").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterWebsite > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});


$("div.repeaterEmail").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyEmail").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyEmail hidden"); });
});

$("div.repeaterEmail").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterEmail > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterDocument").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyDocument").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () {
         $('.select').select2();
         newRow.removeClass("CopyDocument hidden"); 
         });
});

$("div.repeaterDocument").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterDocument > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});


