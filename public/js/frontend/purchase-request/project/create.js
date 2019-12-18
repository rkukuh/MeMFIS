let PurchaseRequestProject = {
    init: function () {
        $('.footer').on('click', '.add-pr', function () {
            let number = $('input[name=number]').val();
            let project_id = $('#project').val();
            let date = $('input[name=date]').val();
            let date_required = $('input[name=date-required]').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-request-project',
                type: 'POST',
                data: {
                    number:number,
                    project_id: project_id,
                    requested_at:date,
                    required_at:date_required,
                    description:description,
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


                        toastr.success('Purchase Request has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-request-project/'+response.uuid+'/edit';
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    PurchaseRequestProject.init();
});
