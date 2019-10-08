function predecessor_tc(triggeruuid) {
        $("#predecessor_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/predecessor",
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
                    data: "estimation_manhour"
                },
                {
                    data: "order"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-predecessor" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                    }
                },

            ]
        })
        $('<button type="button" data-toggle="modal" data-target="#add_modal_predecessor" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm add-predecessor-modal" id="predecessorBtn" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.modal-body .dataTables_filter');

        $('.dataTable').on('click', '.delete-predecessor', function () {
            let triggeruuid = $(this).data('uuid');
            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/workpackage/'+triggeruuid+'/predecessor ',
                        success: function (data) {
                            toastr.success('Predecessor has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );

                        $('#predecessor_datatable').DataTable().ajax.reload();

                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });
};

function predecessor_tc_show(triggeruuid) {
    $("#predecessor_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/predecessor",
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
                data: "estimation_manhour"
            },
            {
                data: "order"
            }
        ]
    })
};

$('.modal-footer').on('click', '.add-predecessor', function () {
    let tcuuid =$('#uuid-predecessor').val();
    let taskcard_predecessor =$('#taskcard_predecessor').val();
    let order_predecessor = $('input[name=order_predecessor]').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/workpackage/'+workPackage_uuid+'/taskcard/'+tcuuid+'/predecessor ',
        data: {
            _token: $('input[name=_token]').val(),
            previous: taskcard_predecessor,
            order: order_predecessor,
        },
        success: function (data) {
            if (data.errors) {
                // if (data.errors.name) {
                //     $('#name-error').html(data.errors.name[0]);

                // }
                // if (data.errors.symbol) {
                //     $('#symbol-error').html(data.errors.symbol[0]);

                // }

            } else {
                $('#add_modal_predecessor').modal('hide');

                toastr.success('Predecessor has been created.', 'Success', {
                    timeOut: 5000
                });

                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        }
    });
});

function predecessor_instruction_tc(triggeruuid) {
    $("#predecessor_instruction_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/instruction/"+triggeruuid+"/predecessor",
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
                data: "estimation_manhour"
            },
            {
                data: "order"
            },
            {
                data: "Actions"
            }
        ],
        columnDefs: [{
                targets: -1,
                orderable: !1,
                render: function (a, e, t, n) {
                    return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-predecessor-instruction" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                }
            },

        ]
    })
    $('<button type="button" data-toggle="modal" data-target="#add_modal_predecessor_instruction" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm add-predecessor-instruction-modal" id="predecessorBtn" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.modal-body .dataTables_filter');

    $('.dataTable').on('click', '.delete-predecessor-instruction', function () {
        let triggeruuid = $(this).data('uuid');
        swal({
            title: 'Sure want to remove?',
            type: 'question',
            confirmButtonText: 'Yes, REMOVE',
            confirmButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            showCancelButton: true,
        })
        .then(result => {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content'
                        )
                    },
                    type: 'DELETE',
                    url: '/workpackage/'+triggeruuid+'/predecessor/instruction',
                    success: function (data) {
                        toastr.success('Predecessor has been deleted.', 'Deleted', {
                            timeOut: 5000
                        }
                    );

                    $('#predecessor_instruction_datatable').DataTable().ajax.reload();

                    },
                    error: function (jqXhr, json, errorThrown) {
                        let errorsHtml = '';
                        let errors = jqXhr.responseJSON;

                        $.each(errors.errors, function (index, value) {
                            $('#delete-error').html(value);
                        });
                    }
                });
            }
        });
    });
};

function predecessor_instruction_tc_show(triggeruuid) {
    $("#predecessor_instruction_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/instruction/"+triggeruuid+"/predecessor",
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
                data: "estimation_manhour"
            },
            {
                data: "order"
            }
        ]
      
    })
};

$('.modal-footer').on('click', '.add-predecessor-instruction', function () {
let tcuuid =$('#uuid-predecessor').val();
let instruction_predecessor =$('#instruction_predecessor').val();
let order_predecessor = $('input[name=order_predecessor_instruction]').val();

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'post',
    url: '/workpackage/'+workPackage_uuid+'/instruction/'+tcuuid+'/predecessor ',
    data: {
        _token: $('input[name=_token]').val(),
        previous: instruction_predecessor,
        order: order_predecessor,
    },
    success: function (data) {
        if (data.errors) {
            // if (data.errors.name) {
            //     $('#name-error').html(data.errors.name[0]);

            // }
            // if (data.errors.symbol) {
            //     $('#symbol-error').html(data.errors.symbol[0]);

            // }

        } else {
            $('#add_modal_predecessor_instruction').modal('hide');

            toastr.success('Predecessor has been created.', 'Success', {
                timeOut: 5000
            });

            $('#predecessor_instruction_datatable').DataTable().ajax.reload();
        }
    }
});
});

