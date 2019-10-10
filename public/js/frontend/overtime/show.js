// $(document).ready(() => {
//     $('#modal_transaction_overview').on('load', () => {
//         console.log("HAHAHA");
//     })
// });

function getData()
{
    let triggerid = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/overtime/' + triggerid,
        type: "GET",
        dataType: "json",
        success:(data) => {
            // setValue(quantity, amount);
            console.log(data);
        },
        error: (jqXhr, json, errorThrown) =>{
            let errorsHtml = '';
            let errors = jqXhr.responseJSON;
            console.log(errors);
            // $.each(errors.errors, function (index, value) {
            //     $('#kategori-error').html(value);
            // });
        }
    });
};

let show = {
    init: () => {
        console.log("WOI");
    }
};

jQuery("#modal_transaction_overview").load(function () {
    show.init();
});