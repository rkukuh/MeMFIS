let goods_received_note = {
    init: function () {

        $('.footer').on('click', '.add-goods-received', function () {
            let received_at = $('input[name=date]').val();
            let received_by = $('#employee').val();
            let ref_po = $('input[name=ref-po]').val();
            let do_no = $('input[name=deliv-number]').val();
            let do_date = $('input[name=do-date]').val();
            let warehouse = $('input[name=warehouse]').val();
            let description = $('#description').val();
            let vehicle_no = $('input[name=vehicle-no]').val();
            let container_no = $('input[name=container-no]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/receiving-inspection-report',
                type: 'POST',
                data: {
                    received_at:received_at,
                    received_by:received_by,
                    vehicle_no:vehicle_no,
                    container_no:container_no,
                    purchase_order_id:ref_po,
                    do_no:do_no,
                    do_date:do_date,
                    storage_id:warehouse,
                    description:description,
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


                        toastr.success('GRN has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/goods-received/'+response.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    goods_received_note.init();
});
