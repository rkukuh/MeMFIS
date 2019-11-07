let MaterialTransferCreate = {
    init: function () {

        $('.footer').on('click', '.add-mutation', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/material-transfer',
                type: 'POST',
                data: {
                    ref_no: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section: section_code,
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
