let JobRequest = {
    init: function() {
        $('.action-buttons').on('click', '.add-job-request', function() {

            let total_mhrs  = $('#total_mhrs').html();
            let description = $('#description').val();
            let rate = $('#rate').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/quotation/{project}/workpackage',
                data: {
                    _token: $('input[name=_token]').val(),
                    total_mhrs: total_mhrs,
                    description: description,
                    rate:rate,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.aircraft_id) {
                        //     $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        // }
                        // if (data.errors.title) {
                        //     $('#title-error').html(data.errors.title[0]);
                        // }

                        // document.getElementById('applicability-airplane').value = applicability-airplane;
                        // document.getElementById('title').value = title;

                    } else {
                        // $('#modal_customer').modal('hide');

                        toastr.success('Job Request has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/workpackage/'+data.uuid+'/edit';
                        // let table = $('.m_datatable').mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });

        });
    }
};

jQuery(document).ready(function() {
    JobRequest.init();
});
