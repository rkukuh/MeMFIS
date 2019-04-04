let Project = {
    init: function () {
        $("#modal_project").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-basic" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $('.add-project').on('click', function () {
            // $('#name-error').html('');
            // $('#simpan').text('Simpan');
            let registerForm = $('#CustomerForm');
            let customer =$('#customer').val();
            let project_title =$('#project_title').val();
            let work_order = $('input[name=work-order]').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let reg = $('input[name=reg]').val();
            let serial_number = $('input[name=serial-number]').val();
            let formData = registerForm.serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: '1122',
                    customer_id: customer,
                    title: project_title,
                    no_wo: work_order,
                    aircraft_id: applicability_airplane,
                    aircraft_register: reg,
                    aircraft_sn: serial_number,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });
                        window.location.href = '/project-hm/'+data.uuid+'/edit';

                    }
                }
            });
        });
    }
};
$('select[name="customer"]').on('change', function () {
    let customer_uuid = this.options[this.selectedIndex];
    txt_name = $("#name");
    console.log(customer_uuid.value);
    txt_name.html(customer_uuid.text);

});
jQuery(document).ready(function () {
    Project.init();
});
