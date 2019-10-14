let InventoryInCreate = {
    init: function () {

        $('.footer').on('click', '.add-inventory-in', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory-in',
                type: 'POST',
                data: {
                    number: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section_code: section_code,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('InventoryIn has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/inventory-in/' + response.uuid + '/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    InventoryInCreate.init();
});
