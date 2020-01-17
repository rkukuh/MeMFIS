function successor_tc(triggeruuid) {
        $("#successor_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/successor",
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
                        return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-successor" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                    }
                },

            ]
        })
        $('<button type="button" data-toggle="modal" data-target="#add_modal_successor" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm add-successor-modal" id="successorBtn" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.modal-body .dataTables_filter');

        $('.dataTable').on('click', '.delete-successor', function () {
            mApp.block(".delete-successor");

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
                        url: '/workpackage/'+triggeruuid+'/successor ',
                        success: function (data) {
                            mApp.unblock(".delete-successor");

                            toastr.success('Predecessor has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );

                        $('#successor_datatable').DataTable().ajax.reload();

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

function successor_tc_show(triggeruuid) {
    $("#successor_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/successor",
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

$('.modal-footer').on('click', '.add-successor', function () {
    mApp.block(".add-successor");

    let tcuuid =$('#uuid-successor').val();
    let taskcard_successor =$('#taskcard_successor').val();
    let order_successor = $('input[name=order_successor]').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/workpackage/'+workPackage_uuid+'/taskcard/'+tcuuid+'/successor ',
        data: {
            _token: $('input[name=_token]').val(),
            previous: taskcard_successor,
            order: order_successor,
        },
        success: function (data) {
            mApp.unblock(".add-successor");
            if (data.errors) {
                // if (data.errors.name) {
                //     $('#name-error').html(data.errors.name[0]);

                // }
                // if (data.errors.symbol) {
                //     $('#symbol-error').html(data.errors.symbol[0]);

                // }

            } else {

                $('#add_modal_successor').modal('hide');

                toastr.success('Predecessor has been created.', 'Success', {
                    timeOut: 5000
                });

                $('#successor_datatable').DataTable().ajax.reload();
            }
        }
    });
});

function successor_instruction_tc(triggeruuid) {
    $("#successor_instruction_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/instruction/"+triggeruuid+"/successor",
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
                    return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-successor-instruction" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                }
            },

        ]
    })
    $('<button type="button" data-toggle="modal" data-target="#add_modal_successor_instruction" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm add-successor-instruction-modal" id="successorBtn" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.modal-body .dataTables_filter');

    $('.dataTable').on('click', '.delete-successor-instruction', function () {
        mApp.block(".delete-successor-instruction");

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
                    url: '/workpackage/'+triggeruuid+'/successor/instruction',
                    success: function (data) {
                        mApp.unblock(".delete-successor-instruction");

                        toastr.success('Predecessor has been deleted.', 'Deleted', {
                            timeOut: 5000
                        }
                    );

                    $('#successor_instruction_datatable').DataTable().ajax.reload();

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

function successor_instruction_tc_show(triggeruuid) {
    $("#successor_instruction_datatable").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/workpackage/"+workPackage_uuid+"/instruction/"+triggeruuid+"/successor",
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
        ],
    })

};

$('.modal-footer').on('click', '.add-successor-instruction', function () {
    mApp.block(".add-successor-instruction");

    let tcuuid =$('#uuid-successor').val();
    let instruction_successor =$('#instruction_successor').val();
    let order_successor = $('input[name=order_successor_instruction]').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/workpackage/'+workPackage_uuid+'/instruction/'+tcuuid+'/successor ',
        data: {
            _token: $('input[name=_token]').val(),
            previous: instruction_successor,
            order: order_successor,
        },
        success: function (data) {
            mApp.unblock(".add-successor-instruction");
            if (data.errors) {
                // if (data.errors.name) {
                //     $('#name-error').html(data.errors.name[0]);

                // }
                // if (data.errors.symbol) {
                //     $('#symbol-error').html(data.errors.symbol[0]);

                // }

            } else {

                $('#add_modal_successor_instruction').modal('hide');

                toastr.success('Predecessor has been created.', 'Success', {
                    timeOut: 5000
                });

                $('#successor_instruction_datatable').DataTable().ajax.reload();
            }
        }
    });
});

