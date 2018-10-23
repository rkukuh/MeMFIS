// $('input.number').keyup(function(event) {

//     // skip for arrow keys
//     if(event.which >= 37 && event.which <= 40) return;

//     // format number
//         $(this).val(function(index, value) {
//         // var n = value;
//         return value.toLocaleString(en);
//         // var parts = value.toString().split(".");
//         // parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//         // return parts.join(".");        // return value
//         // .replace(/\D/g, "")
//         // .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
//         // ;
//         });
// });

$("input.number").on('keyup', function(evt){
    if (evt.which != 110 ){//not a fullstop
        var n = parseFloat($(this).val().replace(/\,/g,''),10);
        $(this).val(n.toLocaleString());
    }
});