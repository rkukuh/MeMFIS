let PurchaseOrder = {
    init: function () {

        $('select[name="currency"]').on('change', function () {
            let exchange_id = this.options[this.selectedIndex].innerHTML;
            let exchange_rate = $('input[name=exchange]');
            if (exchange_id.includes("Rp")) {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", true);
            } else {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", false);
            }
        });
        $('.footer').on('click', '.add-po', function () {
            let number = $('input[name=number]').val();
            let currency = $('#currency').val();
            // let project_id = $('input[name=project]').val();
            let date = $('input[name=date]').val();
            let valid_until = $('input[name=valid_until]').val();
            let exchange = $('input[name=exchange]').val();
            let pr_uuid = $('input[name=ref-pr]').val();
            let date_shipping = $('input[name=date_shipping]').val();
            let vendor = $('#vendor').val();
            let shipping_address = $('#shipping_address').val();
            // let top = $('#shipping_address').val();
            let description = $('#description').val();
            let top = '';
            let top_day_amount = $('#top_day_amount').val();
            let top_start_at = $('#top_start_at').val();

            if($('#cash').is(":checked")){
                top = 'cash';
            }
            else if($('#by-date').is(":checked")){
                top = 'by-date';
            }


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-order',
                type: 'POST',
                data: {
                    number:number,
                    currency_id:currency,
                    ordered_at:date,
                    valid_until:valid_until,
                    exchange_rate:exchange,
                    purchase_request_id:pr_uuid,
                    ship_at:date_shipping,
                    vendor_id:vendor,
                    top_type:top,
                    shipping_address:shipping_address,
                    top_day_amount:top_day_amount,
                    top_start_at:top_start_at,
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


                        toastr.success('Purchase Order has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-order/'+response.uuid+'/edit';
                    }
                }
            });
        });


    }
};

jQuery(document).ready(function () {
    PurchaseOrder.init();
});
