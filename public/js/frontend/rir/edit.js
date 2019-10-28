let receiving_inspection_report = {
    init: function() {

        $(".rir_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: "/datatables/purchase-order/item/" + uuid,
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
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !0
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
                    title: "P/N",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "name",
                    title: "Item Description",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "",
                    title: "Qty PR",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "pivot.quantity",
                    title: "Qty PO",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "",
                    title: "Qty",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "",
                    title: "Expired Date",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                }
            ]
        });
        $('.action-buttons').on('click', '.update-rir', function () {
            $('#name-error').html('');
            $('#simpan').text('Simpan');

            let general_document = [];
            $.each($("input[name='general_document[]']:checked"), function() {
                general_document.push($(this).val());
            });

            let technical_document = [];
            $.each($("input[name='technical_document[]']:checked"), function() {
                technical_document.push($(this).val());
            });

            let purchase_order = $('#purchase_order').val();
            let vendor = $('#vendor').val();
            let document = $('input[name=document]').val();
            let date = $('#date').val();
            let status = $('input[name="status"]:checked').val();
            let type = $('input[name="type"]:checked').val();
            let condition = $('input[name="condition"]:checked').val();
            let preservation_check = $('input[name="preservation_check"]:checked').val();
            let condition_material = $('input[name="condition_material"]:checked').val();
            let quality = $('input[name="quality"]:checked').val();
            let identification = $('input[name="identification"]:checked').val();
            let packing_handling_check = $('#packing_handling_check').val();
            let preservation_check_explain = $('#preservation_check_explain').val();
            let document_check = $('#document_check').val();
            let material_check = $('#material_check').val();
            let decision = $('#decision').val();

            preservation_check
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/rir',
                data: {
                    _token: $('input[name=_token]').val(),
                    general_document:general_document,
                    technical_document: technical_document,
                    purchase_order: purchase_order,
                    vendor: vendor,
                    document: document,
                    date:date,
                    status:status,
                    type:type,
                    condition:condition,
                    preservation_check:preservation_check,
                    condition_material:condition_material,
                    quality:quality,
                    identification:identification,
                    packing_handling_check:packing_handling_check,
                    preservation_check_explain:preservation_check_explain,
                    document_check:document_check,
                    material_check:material_check,
                    decision:decision,
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

                        toastr.success('RIR has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        // let table = $('.m_datatable').mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-item', function () {
            let serial_numbers = [];
            $("input[name^=serial_number]").each(function() {
                serial_numbers.push(this.value);
            });
            serial_numbers = serial_numbers.filter(function (el) {

                return el != null && el != "";

            });

            let item_uuid = $("#material").val();
            let exp_date = $("#exp_date_2").val();
            let qty = $("#quantity").val();
            let unit_id = $("#unit_material").val();
            let note = $("#remark").val();
            if($("#is_serial_number").is(":checked")) {
                if(serial_numbers.length < qty){
                    $('input[name^="serial_number"]').each(function(i) {
                        if(this.value == "" || this.value == null){
                            $(this).css('border', '2px solid red');
                        }else{
                            $(this).css('border', '1px solid grey');
                        }
                    });

                    return;
                }
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/rir/'+rir_uuid+'/item/'+item_uuid,
                type: "POST",
                data: {
                    exp_date: exp_date,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                    serial_numbers: serial_numbers,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#quantity-error').html(response.errors.quantity[0]);
                        }
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        if (response.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_rir_add').modal('hide');

                            toastr.success(
                                "GRN's Item has been updated.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".purchase_order_datatable").mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });
        $('.purchase_order_datatable').on('click', '.edit-item', function () {
            let description = "";
            document.getElementById('item-label').innerText = $(this).data('item');
            if($(this).data('description') != null){
                description = $(this).data('description');
            }else{
                description = "-";
            }
            document.getElementById('item-description').innerText = description;
            let unit_id = $(this).data('unit');

            $('select[name="unit_material"]').empty();

            $.ajax({
                url: '/get-units',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;

                    $('select[name="unit_id"]').empty();

                    $.each(data, function (key, value) {
                        if (key == unit_id) {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });
            document.getElementById('qty').value = $(this).data('quantity');
            document.getElementById('exp_date').value = $(this).data('expred');
            document.getElementById('note').value = $(this).data('note');

            document.getElementById('uuid').value = $(this).data('uuid');
        });
        $(".modal-footer").on("click", ".update-item", function() {

            let uuid = $("input[name=uuid]").val();
            let exp_date = $("#exp_date").val();
            let qty = $("#qty").val();
            let unit_id = $("#unit_id").val();
            let note = $("#note").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/rir/'+rir_uuid+'/item/'+uuid,
                type: "PUT",
                data: {
                    exp_date: exp_date,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#qty-error').html(response.errors.quantity[0]);
                        }
                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        //    taskcard_reset();
                        $('#modal_rir').modal('hide');

                        toastr.success(
                            "GRN has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".purchase_order_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });
        $('.purchase_order_datatable').on('click', '.delete', function () {

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
                        url: '/rir/' + rir_uuid + '/item/'+$(this).data('uuid'),
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.purchase_order_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
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
    receiving_inspection_report.init();
});
