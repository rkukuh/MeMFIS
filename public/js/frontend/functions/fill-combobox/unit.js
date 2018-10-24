// $(document).ready(function () {
//     unit = function () {
//         $.ajax({
//             url: '/get-units/',
//             type: 'GET',
//             dataType: 'json',
//             success: function (data) {
//                 let angka4 = 1;

//                 $('select[name="unit"]').empty();

//                 $.each(data, function (key, value) {
//                     if (angka4 == 1) {
//                         $('select[name="unit"]').append(
//                             '<option> Select a Unit</option>'
//                         );

//                         angka4 = 0;
//                     }

//                     $('select[name="unit"]').append(
//                         '<option value="' + key + '">' + value + '</option>'
//                     );
//                 });
//             }
//         });
//     };

//     unit();
// });

$(document).ready(function () {
    units2 = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka5 = 1;

                $('select[name="unit2"]').empty();

                $.each(data, function (key, value) {
                    if (angka5 == 1) {
                        $('select[name="unit2"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka5 = 0;
                    }

                    $('select[name="unit2"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units2();
});
