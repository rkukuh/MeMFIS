// let TagSelect2 = {
//     init: function () {
//         $('#tag, #tag_validate').select2({
//             tags: true
//         // tags: ["value1", "value2", "value3", "value4", "value5"]
//         });
//         // $("#tag").select2({
//         //     tags: true
//         //   });
//     }
// };

jQuery(document).ready(function () {
    // TagSelect2.init();
    $('#tag, #tag_validate').select2({
        // tags: true
    tags: ["value1", "value2", "value3", "value4", "value5"]
    });

});
