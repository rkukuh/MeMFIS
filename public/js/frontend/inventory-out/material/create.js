let InventoryOutCreate = {
    init: function () {

        $('.footer').on('click', '.add-inventory-out', function () {
            let ref_no = $('input[name=ref_no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();
            let received_by = $('#received-by').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory-out/material',
                type: 'POST',
                data: {
                    ref_no: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section: section_code,
                    received_by: received_by
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('InventoryOut has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/inventory-out/material/' + response.uuid + '/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    InventoryOutCreate.init();
});
