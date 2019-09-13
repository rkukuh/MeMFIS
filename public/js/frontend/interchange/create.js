let intechange = {
    init: function () {
        $('.footer').on('click', '.add-interchange', function () {
            let uuid_from = $('input[name=uuid_from]').val();
            let uuid_to = $('input[name=uuid_to]').val();
            if (document.getElementById("2way").checked) {
                way = 1;
            } else {
                way = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/interchange',
                type: 'POST',
                data: {
                    item_id:uuid_from,
                    alternate_item_id:uuid_to,
                    way:way
                },
                success: function (response) {
                    if (response.errors) {
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Interchange has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/goods-received/'+response.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    intechange.init();
});
