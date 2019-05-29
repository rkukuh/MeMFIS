
$("div.repeaterDewe").on("click", ".DeleteRow", function (event) {
    let counter = $("div.repeaterRow").length;
    if(counter > 2){
        $(this).closest(".repeaterRow").slideUp("slow", function () { $(this).remove(); });
    }
});

$("div.repeaterDewe").on("click", ".AddRow", function (event) {
    let newRow = $(".Copy").clone();
    let row = $(this).closest(".repeaterRow");
    newRow.removeClass("Copy hidden");
    $(this).closest(".repeaterRow").slideDown("slow", function () { $(this).after(newRow); });
    
    let attn_ext_array = [];
    $('input[name="attn-name"]').each(function (i) {
        attn_ext_array[i] = $('input[name="attn-name"]')[i].value;
    });

    console.log(attn_ext_array);

});

