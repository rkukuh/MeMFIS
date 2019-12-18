$(document).ready(function() {

    $('#add-propose-leave').on('click', function() {
        mApp.block(".action-buttons");

        let employee_uuid   = $('#search-employee-val').val();
        let leave_type      = $('#leave_type').val();
        let start_date      = $('#date').val();
        let exp_date        = $('#exp_date').val();
        let days            = $('#days').val();
        let description     = $('#description').val();
        
        let date1 = new Date(start_date); 
        let date2 = new Date(exp_date); 
          
        // To calculate the time difference of two dates 
        let Difference_In_Time = date2.getTime() - date1.getTime(); 
          
        // To calculate the no. of days between two dates 
        let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
 
        if(Difference_In_Days > days){
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Leave cannot exceed remaining days!!!',
              })
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
                leave_type: leave_type,
                start_date: start_date,
                employee_uuid: employee_uuid,
                end_date: exp_date,
                description: description,
                days: days,
                diff: Difference_In_Days,
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

                    window.location.href = data.redirect;

                }
            }
        });
        mApp.unblock(".action-buttons");
    });

    $('#leave_type').on('change', function() {
        let employee_uuid = $('#search-employee-val').val();
        let leave_type = $('#leave_type').val();
        
        if(employee_uuid){
            let url = '/leave/' + employee_uuid + '/remaining/' + leave_type + '/days';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: url,
                success: function (data) {
                    if (data.errors) {

    
                    } else {
    
                        $('#days_remaining').html(data+' day(s) remaining')
                        $('#days').val(data)
    
                    }
                }
            });
        }else{
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Select employee first!',
              })
        }
    });


});
