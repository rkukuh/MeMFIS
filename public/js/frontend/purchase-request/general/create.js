let PurchaseRequestGeneral = {
    init: function () {

        $('.footer').on('click', '.add-pr', function () {
            let date = $('input[name=date]').val();
            let date_required = $('input[name=date-required]').val();
            let description = $('#description').val();
            let type_id = $('#purchase-request-type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-request-general',
                type: 'POST',
                data: {
                    requested_at:date,
                    required_at:date_required,
                    description:description,
                    type_id:type_id,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-request-general/'+response.uuid+'/edit';
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    PurchaseRequestGeneral.init();
});
