$(document).ready(function() {

    $('#edit-propose-leave').on('click', function() {
        mApp.block(".action-buttons");

        let employee_uuid = $('#search-employee-val').val();
        let leave_type = $('#leave_type').val();
        let start_date = $('#start_date').val();
        let exp_date = $('#exp_date').val();
        let description = $('#description').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
                leave_type: leave_type,
                start_date: start_date,
                employee_uuid: employee_uuid,
                exp_date: exp_date,
                description: description,

            },
            success: function (data) {
                if (data.errors) {
                    // if (data.errors.item_id) {
                    //     $('#material-error').html(data.errors.item_id[0]);
                    // }

                    // if (data.errors.quantity) {
                    //     $('#quantity_item-error').html(data.errors.quantity[0]);
                    // }

                    // if (data.errors.unit_id) {
                    //     $('#unit_material-error').html(data.errors.unit_id[0]);
                    // }

                    // document.getElementById('quantity').value = quantity;

                } else {

                    toastr.success('Leave proposal has been updated.', 'Success', {
                        timeOut: 5000
                    });
                }
            }
        });
        mApp.unblock(".action-buttons");
    });

});
