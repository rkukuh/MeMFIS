$("div.repeaterAttention").on("click", ".AddRow", function (event) {
    let newRow = $(".CopyAttention").clone();
    $(this).closest(".repeaterRow").after(newRow);
    newRow.slideDown("slow", function () { newRow.removeClass("CopyAttention hidden"); });
    newRow.find("select[name=attn-email]").select2({
        placeholder: 'Email Adresses',
        tags: true
    });
    newRow.find("select[name=attn-phone]").select2({
        placeholder: 'Phone Numbers',
        tags: true
    });
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
    let counter = 1;
    $("div.repeaterPhone > div.repeaterRow").each(function() {
        $(this).find("input[type=radio][id=type_phone]").each(function() {
            $(this).attr('name','type_phone_'+counter);
        });
        counter++;
    });
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
    let counter = 1;
    $("div.repeaterFax > div.repeaterRow").each(function() {
        $(this).find("input[type=radio][id=type_fax]").each(function() {
            $(this).attr('name','type_fax'+counter);
        });
        counter++;
    });
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
        newRow.removeClass("CopyWebsite hidden"); 
    });
    newRow.find("select[name=type_website]").addClass("type_website");
    newRow.find("select[name=type_website]").select2();
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
    let counter = 1;
    $("div.repeaterEmail > div.repeaterRow").each(function() {
        $(this).find("input[type=radio][id=type_email]").each(function() {
            $(this).attr('name','type_email'+counter);
        });
        counter++;
    });
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
         newRow.removeClass("CopyDocument hidden"); 
         });
    newRow.find("select[name=type_document]").addClass("type_document");
    newRow.find("select[name=type_document]").select2();
});

$("div.repeaterDocument").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterDocument > div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

