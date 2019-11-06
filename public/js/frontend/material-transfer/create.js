let MaterialTransferCreate = {
    init: function () {

        $('.footer').on('click', '.add-mutation', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let storage_out = $('#warehouse_out').val();
            let storage_in = $('#warehouse_in').val();
            let shipping_by = $('#shipping_by').val();
            let received_by = $('#received-by').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/material-transfer',
                type: 'POST',
                data: {
                    ref_no: ref_no,
                    storage_out : storage_out,
                    storage_in : storage_in,
                    shipping_by : shipping_by,
                    received_by : received_by,
                    mutated_at : date,
                    note : description
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('Mutation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/material-transfer/' + response.uuid + '/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    MaterialTransferCreate.init();
});
