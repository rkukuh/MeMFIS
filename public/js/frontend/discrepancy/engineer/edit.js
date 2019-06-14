
let Discrepancy = {
    init: function () {
        $(document).ready(function () {
            document.getElementById('other').onchange = function () {
                if (document.getElementById("other").checked) {
                    $('#other_text').prop("disabled", false);
                } else {
                    $('#other_text').prop("disabled", true);
                }
            };
        });
        let simpan = $('.footer').on('click', '.edit-discrepancy', function () {
            let uuid = $('input[name=uuid]').val();
            let engineer_qty = $('input[name=engineer_qty]').val();
            let helper_quantity =  $('input[name=helper_quantity]').val();
            let jobcard_id =  $('input[name=jobcard_id]').val();
            let manhours =  $('input[name=manhours]').val();
            let description = $('#description').val();
            let complaint = $('#complaint').val();
            let other = $('#other_text').val();

            let is_rii;
            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }
            let propose = [];
            $.each($("input[name='propose[]']:checked"), function() {
                propose.push($(this).val());
              });
            // console.log(propose);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/discrepancy-engineer/'+uuid+'/',
                data: {
                    _token: $('input[name=_token]').val(),
                    jobcard_id: jobcard_id,
                    engineer_quantity: engineer_qty,
                    helper_quantity: helper_quantity,
                    estimation_manhour: manhours,
                    description: description,
                    complaint: complaint,
                    propose: propose,
                    propose_correction_text: other,
                    is_rii:is_rii,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        // }
                        // if (data.errors.payment_term) {
                        //     $('#payment_term-error').html(data.errors.payment_term[0]);
                        // }
                        // document.getElementById('name').value = name;
                        // document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Discrepancy has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy-engineer/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};
let Item = {
    init: function() {
        let uuid = $('input[name=uuid]').val();

        $(".tools_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/tools',


                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: "code",
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                }
            ]
        });

        $('.add-tool').on('click', function () {
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();
            let quantity = $('input[name=quantity]').val();
            let ipc = $('input[name=ipc]').val();
            let sn_on = $('input[name=sn_on]').val();
            let sn_off = $('input[name=sn_off]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/discrepancy/'+uuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: tool,
                    quantity: quantity,
                    unit_id: unit_tool,
                    ipc_ref: ipc,
                    sn_on: sn_on,
                    sn_off: sn_off,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#tool-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity-error').html(data.errors.quantity[0]);
                        // }
                        // document.getElementById('tool').value = tool;
                        // document.getElementById('quantity').value = quantity;
                    } else {

                        toastr.success('Tool has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.tools_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#modal_tool').modal('hide');

                    }
                }
            });
        });


        $('.tool_datatable').on('click', '.tool-delete', function () {
            let item_uuid = $(this).data('item_uuid');
            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + item_uuid+'/item/',
                        success: function (data) {
                            toastr.success('Takscard Tool has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.tool_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
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


        $(".materials_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/materials',

                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: "code",
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                }
            ]
        });

        $('.add-item').on('click', function () {
            let quantity = $('input[name=quantity_item]').val();
            let material = $('#material').val();
            let unit_material = $('#unit_material').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/'+taskcard_uuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: material,
                    quantity: quantity,
                    unit_id: unit_material,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.item_id) {
                            $('#material-error').html(data.errors.item_id[0]);
                        }

                        if (data.errors.quantity) {
                            $('#quantity_item-error').html(data.errors.quantity[0]);
                        }
                        document.getElementById('material').value = material;
                        document.getElementById('quantity').value = quantity;

                    } else {

                        toastr.success('Material has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.item_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_item').modal('hide');

                    }
                }
            });
        });

        $('.item_datatable').on('click', '.material-delete', function () {
            let item_uuid = $(this).data('item_uuid');
            // let taskcard_uuid = $(this).data('taskcard_uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + item_uuid+'/item/',
                        success: function (data) {
                            toastr.success('Takscard Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
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
    }
};

jQuery(document).ready(function() {
    Item.init();
    Discrepancy.init();
});
