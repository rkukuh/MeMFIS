$("div.repeaterFacility").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyFacility").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyFacility hidden"); });
    let counter = 1;
    newRow.find("select[name=facility]").addClass("facility");
    newRow.find("select[name=facility]").select2();
});

$("div.repeaterFacility").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterFacility > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});